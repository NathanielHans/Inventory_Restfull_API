<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'id_maintenance');
    }
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_pengajuan');
    }
}
