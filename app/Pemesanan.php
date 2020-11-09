<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    
    protected $table = "pemesanan";

    protected $fillable = [
        'user_id', 
        'alamat_id',
        'diskon_id',
        'total_harga',
        'kode_verifikasi',
        'status', 
        'status_pesan', 
        'status_publish',
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::Class);
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::Class);
    }
}
