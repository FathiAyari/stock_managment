<?php

namespace App\Models;

use App\Models\Vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}
