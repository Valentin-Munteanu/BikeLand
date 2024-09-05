<?php

namespace App\Http\Controllers;

use App\Models\Accesorii;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccesoriiRequest;

class AccesoriiController extends Controller
{
    public function CreateAccesorii(){
        if(!Auth::guard("admins")->check()){
            return redirect()->route("admin-register")->with("error", "Trebuie sa fii administrator pentru a putea crea accesorii");

        }
        return view("Admin.createAccesorii");
    }

    public function StoreAccesorii(AccesoriiRequest $accesoriiRequest){
        $accesorii = new Accesorii;
        $data = $accesoriiRequest->validated();
        $accesorii->type_acces = $data["type_acces"];
        $accesorii->name_acces = $data["name_acces"];
        $accesorii->color_acces = $data["color_acces"];
        $accesorii->price = $data["price"];
        $accesorii->description = $data["description"];
        $accesorii->admin_id = Auth::guard("admins")->id();
        if($accesoriiRequest->hasFile("image")){
            $imageAcces = $accesoriiRequest->file("image");
            if($imageAcces->isValid()){
                $filename = uniqid() . '.' . $imageAcces->getClientOriginalExtension();
                $locationPath = public_path("/AccesoriiImg");
                if(!file_exists($locationPath)){
                    mkdir($locationPath, 0755, true);
                }
                $imageAcces->move($locationPath, $filename);
                $accesorii->image = "/AccesoriiImg/" . $filename;
}
}

$accesorii->save();
return redirect()->route("create-accesorii")->with("success", "Accesoriul a fost creat cu succes");

    }

    public function UpdateViewAccesorii(){
        if(!Auth::guard("admins")->check()){
            return redirect()->route("admin-register")->with("erorr", "Trebuie sa fiti administrator pentru a putea actualiza accesoriile");
        }
        $accesorii = Accesorii::all();
        return view("Admin.editAccesorii", compact("accesorii"));
    }

    public function UpdateAccesorii(AccesoriiRequest $accesoriiRequest){
        $data = $accesoriiRequest->validated();
        $accesorii = Accesorii::findOrFail($accesoriiRequest->acces_id);
if($accesoriiRequest->hasFile("image")){
    $imageAccesUpdate = $accesoriiRequest->file("image");
    if($imageAccesUpdate->isValid()){
        $fileName = uniqid(). '.' . $imageAccesUpdate->getClientOriginalExtension();
        $locationPath = public_path("/AccesoriiImg");
        if(!file_exists($locationPath)){
            mkdir($locationPath, 0755, true);
        }
        $imageAccesUpdate->move($locationPath, $fileName);
        $accesorii->image = "/AccesoriiImg/" . $fileName;

    }

    if(!is_null($accesorii->$imageAccesUpdate) && file_exists(public_path($accesorii->$imageAccesUpdate))){
        unlink(public_path($accesorii->$imageAccesUpdate));
    }
}

$accesorii->update([
"type_acces" => $data["type_acces"],
"name_acces" => $data["name_acces"],
"color_acces" => $data["color_acces"],
"description" => $data["description"],
"price" => $data["price"],
"image" => $data["image"]
 ]);

if($accesoriiRequest->has("hidden")){
    $accesorii->delete();

} else {
    $accesorii->restore();
}
return redirect()->route("edit-accesorii")->with("success", "Accesoriul a fost actualizat cu succes");
    }

public function indexAccesorii(Request $request){
    $query = Accesorii::query();

    if($request->has("name_acces") && $request->name_acces != ""){
        $query->where("name_acces", "like", "%" . $request->name_acces . "%" );
    }

    if($request->has("type_acces" && $request->type_acces != "")){
        $query->where("type_acces", $request->type_acces);
    }

    if($request->has("color_acces") && $request->color_acces != ""){
        $query->where("color_acces", $request->color_acces);
    }

    if($request->has("sort_price")){
        $sortOrder = $request->sort_price;
        if(in_array($sortOrder, ["asc", "desc"])){
            $query->orderBy("price", $sortOrder);
        } else {
            $query->orderBy("price", "asc");
        }
    }
    $accesorii = $query->get();
    return view("Accesorii", compact("accesorii"));
}

public function AccesoriiPage($id){
    $accesorii = Accesorii::findOrFail($id);
    return view("AccesoriiPage", compact("accesorii"));
}


}


