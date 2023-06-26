<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'img',
        'city_id',
    ];
    public function city()
    {
        return $this->hasMany(Cities::class, 'id', 'city_id');
    }
}
