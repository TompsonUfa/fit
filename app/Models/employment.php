<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employment';
    protected $fillable = [
        'name',
        'img',
        'video',
    ];
}
