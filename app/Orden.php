<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
   protected $table = 'orden';
    protected $fillable = ['cantidad','idPlato','idFactura'];
}
