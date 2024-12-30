<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLog extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'data_logs';

    // Kolom yang dapat diisi
    protected $fillable = [
        'device_id',
        'value',
        'time_log',
    ];

    // Relasi ke tabel devices
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
