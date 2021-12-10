<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class last_seen extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "updated_at"
    ];
}
