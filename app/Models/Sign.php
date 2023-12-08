<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;

    protected $table = 'signin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
