<?php

namespace App\Http\Controllers;

use App\Models\Bikes;
use Illuminate\Http\Request;
use App\Http\Requests\BikesRequest;
use Illuminate\Support\Facades\Auth;

class BikesController extends Controller
{
public function CreateBike(){
    if(!Auth::guard("admins")->check()){
        return redirect()->route("admin-register");
        };
    return view("Admin.createBike");

}
public function StoreBike(BikesRequest $bikesRequest){
    $data = $bikesRequest->validated();
    $bike = new Bikes;
    $bike->type_bike = $data["type_bike"];
    $bike->name_bike = $data["name_bike"];
    $bike->color_bike = $data["color_bike"];
    $bike->price = $data["price"];
    $bike->description = $data["description"];
    $bike->admin_id = Auth::guard("admins")->id();

    if ($bikesRequest->hasFile("image_bike")) {
        $imageBike = $bikesRequest->file("image_bike");
        if ($imageBike->isValid()) {
            $fileName = uniqid() . '.' . $imageBike->getClientOriginalExtension();
            $locationPath = public_path("/BikeImage");

            if (!file_exists($locationPath)) {
                mkdir($locationPath, 0755, true);
            }

            $imageBike->move($locationPath, $fileName);
            $bike->image_bike = "/BikeImage/" . $fileName;
        }
    }

    $bike->save();

    return redirect()->route("create-bike")->with("success", "Bicicleta a fost creată cu succes");
}

public function UpdateViewBike(){
    if(!Auth::guard("admins")->check()){
        return redirect()->route("admin-register");
            }
    $bikes = Bikes::all();
return view("Admin.editBike",compact("bikes"));
}
public function UpdateBike(BikesRequest $bikesRequest){
    $bike = Bikes::findOrFail($bikesRequest->bike_id);
    $data = $bikesRequest->validated();
    if($bikesRequest->hasFile("image_bike")){
        $imageBikeUpdate = $bikesRequest->file("image_bike");
        $fileName = uniqid(). "" . $imageBikeUpdate->getClientOriginalExtension();
        $locationPath = public_path("/BikeImage");
        $imageBikeUpdate->move($locationPath, $fileName);
        $data["image_bike"] = "/BikeImage/" . $fileName;

        if(!is_null($bike->$imageBikeUpdate) && file_exists(public_path($bike->$imageBikeUpdate))){
unlink(public_path($bike->imageBikeUpdate));
        }
    }

    $bike->update([
"name_bike" => $data["name_bike"],
"type_bike" => $data["type_bike"],
"color_bike" => $data["color_bike"],
"price" => $data["price"],
"description" => $data["description"],
"image_bike" => $data["image_bike"]
    ]);

    if($bikesRequest->has("hidden")){
        $bike->delete();

    } else {
        $bike->restore();
    }
    return redirect()->route("edit-bike")->with("success", "Bicicleta a fost actualizata cu succes");

}


public function indexBike(Request $request){
    $query = Bikes::query();

    if ($request->has('name_bike') && $request->name_bike != '') {
        $query->where('name_bike', 'like', '%' . $request->name_bike . '%');
    }
    if($request->has("type_bike") && $request->type_bike != ""){
        $query->where("type_bike", $request->type_bike);
    }

    if($request->has("color_bike") && $request->color_bike != ""){
        $query->where("color_bike", $request->color_bike);
    }

    if($request->has("sort_price")){
        $sortOrder = $request->sort_price;
        if (in_array($sortOrder, ['asc', 'desc'])) {
            $query->orderBy("price", $sortOrder);
        } else {
            $query->orderBy("price", 'asc');
        }
    }
    $bikes = $query->get();

    return view("biciclete", compact("bikes"));
}
public function BikePage($id){
    $bikes = Bikes::findOrFail($id);
return view("bikePage", compact("bikes"));
}
}
