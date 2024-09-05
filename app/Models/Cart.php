<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bikes;
use App\Models\Accesorii;
use App\Models\Trotinete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
"bikes_id",
"user_id",
"accesorii_id",
"trotinete_id",
"quantity",
"total_price"

    ];
    public function bike()
    {
        return $this->belongsTo(Bikes::class, 'bikes_id');
    }

    public function accesoriu()
    {
        return $this->belongsTo(Accesorii::class, 'accesorii_id');
    }

    public function trotineta()
    {
        return $this->belongsTo(Trotinete::class, 'trotinete_id');
    }

    public function UserRelation(){
        return $this->belongsTo(User::class);
    }

}

