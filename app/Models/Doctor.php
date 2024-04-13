<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    use Translatable;
    public $translatedAttributes = ['name', 'appointments'];

    protected $fillable = [
    'name',
    'email',
    'email_verified_at',
    'password',
    'phone',
    'price',
    'appointments',
];
}
