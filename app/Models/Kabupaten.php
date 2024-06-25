<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';

    protected $fillable = ['nama_kabupaten', 'provinsi_id', 'jumlah_penduduk'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
