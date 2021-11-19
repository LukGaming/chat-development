<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensagen extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "body",
        "sendFromUser",
        "sendToUser"
    ];
}
