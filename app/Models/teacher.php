<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperteacher
 */
class teacher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'fullName',
        'text',
        'img',
    ];
    public function city()
    {
        return $this->hasMany(Cities::class, 'id', 'city_id');
    }
}
