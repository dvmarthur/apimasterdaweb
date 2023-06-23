<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
