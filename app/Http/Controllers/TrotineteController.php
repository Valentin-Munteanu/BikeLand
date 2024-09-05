<?php

namespace App\Http\Controllers;

use App\Models\Trotinete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TrotineteRequest;

class TrotineteController extends Controller
{
  public function CreateTrotinete(){
   if(!Auth::guard("admins")->check()){
    return redirect()->route("admin-register");
   }
    return view("Admin.createTrotinete");
  }

  public function storeTrotinete(TrotineteRequest $trotineteRequest){
    $data = $trotineteRequest->validated();

    $trotinete = new Trotinete;
    $trotinete-> speed_trt = $data["speed_trt"];
    $trotinete->name_trt = $data["name_trt"];
    $trotinete->color_trt = $data["color_trt"];
    $trotinete->price_trt = $data["price_trt"];
    $trotinete-> description = $data["description"];
$trotinete->admin_id = Auth::guard("admins")->id();


if ($trotineteRequest->hasFile("image")) {
    $image_TRT = $trotineteRequest->file("image");
    if ($image_TRT->isValid()) {
        $fileName = uniqid() . '.' . $image_TRT->getClientOriginalExtension();
        $locationPath = public_path("/Imagini");
        if (!file_exists($locationPath)) {
            mkdir($locationPath, 0755, true);
        }
        $image_TRT->move($locationPath, $fileName);
        $trotinete->image = "/Imagini/" . $fileName;
    }
}


$trotinete->save();
return redirect()->route("create-trotinete")->with("success", "Trotineta a fost creata cu succes");

}

public function UpdateViewTrotinete(){
    if(!Auth::guard('admins')->check()){
        return redirect()->route("admin-register")->with("Erorr", "Trebuie sa aveti cont admin daca doriti sa accesati aceasta pagina");
    }
    $trotinete = Trotinete::all();
return view("Admin.editTrotinete", compact("trotinete"));
}

public function UpdateTrotinete(TrotineteRequest $trotineteRequest){
    $trotinete = Trotinete::findOrFail($trotineteRequest->trt_id);
    $data = $trotineteRequest->validated();


    if ($trotineteRequest->hasFile("image")) {
        $image_TRT= $trotineteRequest->file("image");
        if ($image_TRT->isValid()) {
            $fileName = uniqid() . '.' . $image_TRT->getClientOriginalExtension();
            $locationPath = public_path("/Imagini");
            if (!file_exists($locationPath)) {
                mkdir($locationPath, 0755, true);
            }
            $image_TRT->move($locationPath, $fileName);
            $trotinete->image = "/Imagini/" . $fileName;
        }


        if(!is_null($trotinete->$image_TRT) && file_exists(public_path($trotinete->$image_TRT))){
unlink(public_path($trotinete->$image_TRT));
        }
    }
    $trotinete->update([
        "speed_trt"=> $data["speed_trt"],
        "image" =>$data["image"],
        "name_trt" => $data["name_trt"],
        "color_trt" =>$data["color_trt"],
        "price_trt" =>$data["price_trt"],
     "description" => $data["description"],
    ]);

    if($trotineteRequest->has("hidden")){
        $trotinete->delete();
    } else {
$trotinete->restore();
    }
    return redirect()->route("edit-trotinete")->with("success", "Trotineta a fost actualizata cu succes");
}

public function indexTrotinete(Request $request){
    $query = Trotinete::query();

    if($request->has("name_trt") && $request->name_trt != ""){
        $query->where("name_trt", "like", "%" . $request->name_trt . "%");
    }
if($request->has("speed_trt" && $request->speed_trt != "")){
    $query->where("speed_trt", $request->speed_trt);
}

if($request->has("color_trt" && $request->color_trt != "")){
    $query->where("color_trt", $request->color_trt);
}
if($request->has("sort_price")){
    $sortOrderTrt = $request->sort_price;
if(in_array($sortOrderTrt,["asc", "desc"]))
{
    $query->orderBy("price_trt", $sortOrderTrt);
}else{
$query->orderBy("price_trt", "asc");
}
}
$trotinete = $query->get();
return view("MicroVehicule",compact("trotinete"));


}

public function TrotinetePage($id){
    $trotinete = Trotinete::findOrFail($id);
return view("TrotinetePage", compact("trotinete"));
}
}
