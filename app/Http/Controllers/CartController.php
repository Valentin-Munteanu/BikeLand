<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Bikes;
use App\Models\Accesorii;
use App\Models\Trotinete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
// Adaugam bicicleta in cos
{

    public function addToCart(Request $request)
    {

        if(!Auth::guard("web")->check()){
            return redirect()->route("register")->with("Trebuie sa fii logat pentru a putea adauga produsele in cos");
        }
        $user = Auth::guard("web")->user();

        // Adăugăm bicicleta în coș
        if ($request->has("bike_id")) {
            $bike = Bikes::findOrFail($request->bike_id);
            $cartItemBike = Cart::where("user_id", $user->id)
                ->where("bikes_id", $bike->id)
                ->first();

            if ($cartItemBike) {
                $cartItemBike->quantity += 1;
                $cartItemBike->total_price = $this->calculateTotalPrice($cartItemBike);
                $cartItemBike->save();
            } else {
                Cart::create([
                    "user_id" => $user->id,
                    "bikes_id" => $bike->id,
                    "accesorii_id" => null,
                    "trotinete_id" => null,
                    "quantity" => 1,
                    "total_price" => $this->calculateTotalPrice((object)[
                        'bikes_id' => $bike->id,
                        'quantity' => 1,
                        'bike' => $bike,
                    ]),
                ]);
            }
        }

        // Adăugăm accesoriul în coș
        if ($request->has("accesorii_id")) {
            $accesorii = Accesorii::findOrFail($request->accesorii_id);
            $cartItemAccesoriu = Cart::where("user_id", $user->id)
                ->where("accesorii_id", $accesorii->id)
                ->first();

            if ($cartItemAccesoriu) {
                $cartItemAccesoriu->quantity += 1;
                $cartItemAccesoriu->total_price = $this->calculateTotalPrice($cartItemAccesoriu);
                $cartItemAccesoriu->save();
            } else {
                Cart::create([
                    "user_id" => $user->id,
                    "bikes_id" => null,
                    "accesorii_id" => $accesorii->id,
                    "trotinete_id" => null,
                    "quantity" => 1,
                    "total_price" => $this->calculateTotalPrice((object)[
                        'accesorii_id' => $accesorii->id,
                        'quantity' => 1,
                        'accesoriu' => $accesorii,
                    ]),
                ]);
            }
        }

        // Adăugăm trotineta în coș
        if ($request->has("trotinete_id")) {
            $trotinete = Trotinete::findOrFail($request->trotinete_id);
            $cartItemTrotineta = Cart::where("user_id", $user->id)
                ->where("trotinete_id", $trotinete->id)
                ->first();

            if ($cartItemTrotineta) {
                $cartItemTrotineta->quantity += 1;
                $cartItemTrotineta->total_price = $this->calculateTotalPrice($cartItemTrotineta);
                $cartItemTrotineta->save();
            } else {
                Cart::create([
                    "user_id" => $user->id,
                    "bikes_id" => null,
                    "accesorii_id" => null,
                    "trotinete_id" => $trotinete->id,
                    "quantity" => 1,
                    "total_price" => $this->calculateTotalPrice((object)[
                        'trotinete_id' => $trotinete->id,
                        'quantity' => 1,
                        'trotineta' => $trotinete,
                    ]),
                ]);
            }
        }
        return redirect()->back()->with("success", "Produsele au fost adăugate în coș.");
    }
    public function viewCart()
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register");
        }

        $cartItems = Cart::with(["bike", "trotineta", "accesoriu"])
            ->where("user_id", Auth::guard("web")->id())
            ->get();
        return view("Cart", compact("cartItems"));
    }

    public function incrementQuantity($cartItemId)
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register");
        }

        $cartItem = Cart::findOrFail($cartItemId);

        if ($cartItem->user_id == Auth::guard("web")->id()) {
            $cartItem->quantity += 1;
            $cartItem->total_price = $this->calculateTotalPrice($cartItem);
            $cartItem->save();

            return redirect()->back()->with("success", "Numărul de produse a fost mărit");
        }
        return redirect()->back()->with("error", "Nu ai permisiunea să modifici acest produs");
    }

    public function decrementQuantity($cartItemId)
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register");
        }

        $cartItem = Cart::findOrFail($cartItemId);

        if ($cartItem->user_id == Auth::guard("web")->id()) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->total_price = $this->calculateTotalPrice($cartItem);
                $cartItem->save();
                return redirect()->back()->with("success", "Cantitatea de produse a fost redusă");
            }
            return redirect()->back()->with("error", "Cantitatea nu poate fi mai mică de 1");
        }
        return redirect()->back()->with("error", "Nu ai permisiunea să modifici produsul");
    }


    public function calculateTotalPrice($cartItem)
    {
        if (is_object($cartItem)) {
            if (isset($cartItem->bikes_id) && $cartItem->bikes_id) {
                $price = isset($cartItem->bike) ? $cartItem->bike->price : 0;
            } elseif (isset($cartItem->accesorii_id) && $cartItem->accesorii_id) {
                $price = isset($cartItem->accesoriu) ? $cartItem->accesoriu->price : 0;
            } elseif (isset($cartItem->trotinete_id) && $cartItem->trotinete_id) {
                $price = isset($cartItem->trotineta) ? $cartItem->trotineta->price_trt : 0;
            } else {
                $price = 0;
            }

            $totalPrice = $cartItem->quantity * $price;
            return round($totalPrice, 2);
        }

        return 0;
    }
    public function removeFromCart($cartItemId)
    {
        if (!Auth::guard("web")->check()) {
            return redirect()->route("register");
        }

        $cartItem = Cart::findOrFail($cartItemId);
        if ($cartItem->user_id == Auth::guard("web")->id()) {
            $cartItem->delete();
            return redirect()->back()->with("success", "Produsul a fost șters cu succes din coș");
        }
        return redirect()->back()->with("error", "Nu ai permisiunea să modifici produsul");
    }
}


