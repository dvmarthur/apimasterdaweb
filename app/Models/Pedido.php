<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['produto_id', 'quantidade', 'codigo_pedido','user_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
