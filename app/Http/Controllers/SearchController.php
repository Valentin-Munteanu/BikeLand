<?php

namespace App\Http\Controllers;

use App\Models\Accesorii;
use App\Models\Bikes;
use App\Models\Trotinete;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input("query");
        return redirect()->route("search.results", ['query' => $query]);
    }

    public function searchResults(Request $request)
    {
        $query = $request->input('query');
        $bikes = Bikes::where('name_bike', 'like', "%{$query}%")->get();
        $accesorii = Accesorii::where('name_acces', 'like', "%{$query}%")->get();
        $trotinete = Trotinete::where('name_trt', 'like', "%{$query}%")->get();

        return view("searchView",compact('bikes', 'accesorii', 'trotinete'));
    }
}
