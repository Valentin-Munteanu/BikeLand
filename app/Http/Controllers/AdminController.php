<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginRequest;

class AdminController extends Controller
{
 public function adminRegister(){
    return view("Admin.register");
 }

 public function WorkAdminRegister(AdminRequest $adminRequest){
$data = $adminRequest->validated();
$cryptPasswordAdmin = Hash::make($data["password"]);
$adminCount = Admin::count();
if($adminCount >= 5){
    return redirect()->route("admin-register")->with("error", "Pe acest website se pot inregistra maximul 5 Admini");

}

Admin::create([
"name" => $data["name"],
"lastname" => $data["lastname"],
"email" => $data["email"],
"login" => $data["login"],
"password" => $cryptPasswordAdmin
]);

return redirect()->route("admin-login")->with("success", "Ati fost inregistrat cu succes ca Admin");

 }

 public function LoginAdmin(){
    return view("Admin.login");
 }

 public function WorkLoginAdmin(AdminLoginRequest $adminLoginRequest){
    $data = $adminLoginRequest->validated();
if(Auth::guard("admins")->attempt(["login" => $data["login"],"password" => $data["password"]])){
    return redirect()->route("admin-dashboard");
}else {
    return back()->with(["login" => "Datele de autentificare a Adminului sunt incorecte"]);

}

 }

 public function indexAdmin(){
    $admin = Auth::guard('admins')->user();
    if(is_null($admin)){
        return redirect()->route("admin-register");
    }
    return view("Admin.dashboard", compact("admin"));

}
public function EditAdmin(AdminLoginRequest $adminLoginRequest){
$data = $adminLoginRequest->validated();
$admin = Auth::guard("admins")->user();
$admin->login = $data["login"];
if(!empty($data["password"])){
    $admin->password = Hash::make($data["password"]);
}
$admin->save();
return redirect()->route("admin-dashboard")->with("success", "Contul admin a fost actualizat cu succes");

}

public function deleteAdmin(){
$admin = Auth::guard("admins")->user();
Auth::guard("admins")->logout();
$admin->delete();
return redirect()->route("admin-register")->with("succes", "Contul Admin a fost sters cu succes");

}

public function logoutAdmin(){
    Auth::guard("admins")->logout();
    return redirect()->route("admin-login");

}
}
