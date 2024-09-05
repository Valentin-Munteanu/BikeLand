<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ActivationEmail;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function RegisterUser(){
        return view("register");
    }

    public function WorkRegisterUser(UserRequest $userRequest){
$data = $userRequest->validated();
$cryptPassword = Hash::make($data["password"]);
$activationCode = Str::random(15);

User::create([
"name" => $data["name"],
"lastname" => $data["lastname"],
"login" => $data["login"],
"email" => $data["email"],
"password" => $cryptPassword,
"activation_code" => $activationCode
]);
Mail::to($data['email'])->send(new ActivationEmail($data, $activationCode));
session(["registration_success" => true]);
return redirect()->route("sendDate")->with("success", "Ati fost autentificat cu succes");
}

public function sendLoadingPage(){
    if(session()->has("registration_success")){
session()->forget("registration_success");
return view("Send.sendDate");

    }

return redirect()->route("register")->with("eroare", "Acces neautorizat, trebuie sa va inregistrati");

}

public function LoginUser(){
$lastLogin = session("last_login", "");
    return view("login", compact("lastLogin"));
}

public function WorkLoginUser(LoginRequest $loginRequest){
    $data = $loginRequest->validated();
    $remember = $loginRequest->has("remember");
    $user = User::where("login", $data["login"])->first();
    if($user && !$user->activated){
        return back()->with(["login" => "Contul nu a fost activat, Verifica e-mailul"])->withInput($loginRequest->only("login"));

    }
    if(Auth::guard('web')->attempt(["login" => $data["login"], "password" => $data["password"]], $remember)){
        return redirect()->route("user-dashboard");
    } else {
        return back()->withErrors(["login" => "Datele de autentificare sunt incorecte."])->withInput($loginRequest->only("login"));
    }
}

public function indexUser(){
    if(!auth()->guard("web")->check()){
        return redirect()->route("register");

    }
    $user = Auth::guard("web")->user();
    return view("dashboard", compact("user"));
}

public function logoutUser(){
    $login = Auth::guard("web")->user()->login;
    Auth::guard('web')->logout();
    session(["last_login" => $login]);
    return redirect()->route("register");
}

public function editUser(LoginRequest $loginRequest){
    $data = $loginRequest->validated();
    $user = Auth::guard("web")->user();
    $user->login = $data["login"];
    if(!empty($data["password"])){
        $user->password = Hash::make($data["password"]);

    }
    $user->save();
return redirect()->route("user-dashboard")->with("success", "Datele contului au fost actualizate cu succes");

}

public function changePassView(){
$lastLogin = session("last_login", "");
    return view("changePass", compact("lastLogin"));

}

public function changePassword(LoginRequest $loginRequest)
{
$data = $loginRequest->validated();

    $userModify = User::where('login', $data['login'])->first();

    $userModify->password = Hash::make($data['password']);
    $userModify->save();

    return redirect()->route("Login")->with("success", "Parola a fost modificată cu succes. Vă rugăm să vă autentificați.");
}

public function deleteUser(){
    $user = Auth::guard("web")->user();
    session()->forget("last_login");
    Auth::guard('web')->logout();
    $user->delete();
return redirect()->route("register")->with("success", "Contul a fost sters cu succes");

}


public function activateAccount($code)
{
    $user = User::where('activation_code', $code)->first();

    if (!$user) {
        return redirect()->route("Login")->withErrors(['eroare' => 'Cod de activare invalid']);
    }

    $user->activated = true;
    $user->activation_code = null;
    $user->save();

    return redirect()->route("Login")->with('success', 'Codul este valid, contul a fost activat cu succes');
}
}
