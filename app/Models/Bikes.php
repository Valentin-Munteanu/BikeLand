<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Admin;
use App\Models\Favorites;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bikes extends Model
{
    use HasFactory;
use SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        "image_bike",
        "type_bike",
        "name_bike",
         "color_bike",
        "price",
        "description",
        "admin_id"
    ];

    protected $dates = ["deleted_at"];

    public function adminRelation(){
        return $this->belongsTo(Admin::class);
        }

        public function CartRelation(){
            return $this->hasMany(Cart::class);
        }

        public function SavesRelation(){
            return $this->hasMany(Favorites::class);
        }
}
