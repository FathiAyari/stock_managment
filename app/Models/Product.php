<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'quantity', 'price', 'availableQty'];

    public function ventes()
    {
        return $this->belongsToMany(Vente::class, 'vente_products');
    }
}
