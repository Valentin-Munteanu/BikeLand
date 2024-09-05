<?php

namespace App\Models;

use App\Models\Bikes;
use App\Models\Accesorii;
use App\Models\Trotinete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
protected $guard = "admins";
    public $timestamps = false;

    protected $fillable = [
"name",
"lastname",
"login",
"email",
"password"
    ];

    public function BikesRelation(){
        return $this->hasMany(Bikes::class);
        }

        public function TrotineteRelation(){
            return $this->hasMany(Trotinete::class);
                }
                public function AccesoriiRelation(){
                    return $this->hasMany(Accesorii::class);
                }
}
