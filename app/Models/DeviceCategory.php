<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceCategory extends Model
{
    protected $table = 'device_categories';
    protected $fillable = ['category'];
}
