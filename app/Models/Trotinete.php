<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Admin;
use App\Models\Favorites;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trotinete extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        "speed_trt",
        "image",
        "name_trt",
        "color_trt",
        "price_trt",
     "description",
     "admin_id"
    ];
protected $dates = ["deleted_at"];

public function adminRelations(){
    return $this->belongsTo(Admin::class);

}

public function CartRelation(){
    return $this->hasMany(Cart::class);
}

public function FavoritesRelation(){
    return $this->hasMany(Favorites::class);
}
}
