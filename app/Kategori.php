<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{ 
    protected $table = "kategori";

    protected $fillable = [
        'kategori',
        'slug',
     ];
     
     public function produkData()
    {
        return $this->hasMany(Produk::class, 'kategori', 'id');
    }
    
}
