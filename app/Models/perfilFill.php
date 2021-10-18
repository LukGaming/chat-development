<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfilFill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name_that_others_can_see',
        'profile_phrase',
        'image_perfil_path',
        'user_id'
    ];
 
}
