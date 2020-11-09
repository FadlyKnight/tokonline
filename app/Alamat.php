<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    //
    protected $fillable = [
        'id_user', 'detail', 'daerah'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
        // $this->hasOne(Keranjang::class, 'Keranjangs', 'id');
    }
}
