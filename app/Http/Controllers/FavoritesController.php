<?php

namespace App\Http\Controllers;

use App\Models\Accesorii;
use App\Models\Favorites;
use App\Models\Trotinete;
use Auth;
use App\Models\Bikes;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addToFavorites(Request $request)
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register")->with("error", "Trebuie să fii autentificat ca utilizator pentru a adăuga produse la favorite.");
        }

        $user = Auth::guard("web")->user();
        $typesMap = [
            "bike" => ["model" => Bikes::class, "field" => "bikes_id"],
            "accesoriu" => ["model" => Accesorii::class, "field" => "accesorii_id"],
            "trotineta" => ["model" => Trotinete::class, "field" => "trotinete_id"]
        ];


        foreach ($typesMap as $type => $details) {
            if ($request->has($details["field"])) {

                $product = $details["model"]::findOrFail($request->{$details["field"]});


                $existingFavorite = Favorites::where("user_id", $user->id)
                    ->where($details["field"], $product->id)
                    ->first();

                if ($existingFavorite) {
                    return redirect()->back()->with("error", "Produsul este deja în favorite.");
                }

                Favorites::create([
                    "user_id" => $user->id,
                    "bikes_id" => $type === "bike" ? $product->id : null,
                    "accesorii_id" => $type === "accesoriu" ? $product->id : null,
                    "trotinete_id" => $type === "trotineta" ? $product->id : null,
                ]);

                return redirect()->back()->with('success', 'Produsul a fost adăugat la favorite.');
            }
        }

        return redirect()->back()->with('error', 'Produsul nu a fost găsit.');
    }
    public function viewFavorites()
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register")->with("error", "Trebuie să fii autentificat ca utilizator pentru a vizualiza favoritele.");
        }

        $favoritesItems = Favorites::with(['bikeRelation', 'accesoriiRelation', 'trotineteRelation'])
            ->where("user_id", Auth::guard("web")->id())
            ->get();

        return view("favorites", compact("favoritesItems"));
    }

    public function removeFromFavorites($favoritesItemId)
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register")->with("error", "Trebuie să fii autentificat pentru a șterge produse din favorite.");
        }

        $favoritesItem = Favorites::findOrFail($favoritesItemId);

        if ($favoritesItem->user_id == Auth::guard("web")->id()) {
            $favoritesItem->delete();
            return redirect()->back()->with("success", "Produsul a fost șters din favorite.");
        }

        return redirect()->back()->with("error", "Nu ai permisiunea să ștergi acest produs din favorite.");
    }
}

