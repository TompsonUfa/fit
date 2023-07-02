<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPageCourse
 */
class PageCourse extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'text',
        'img',
        'city_id',
        'time',
        'date',
        'desc',
        'old_price',
        'price',
    ];
    public function city()
    {
        return $this->hasMany(Cities::class, 'id', 'city_id');
    }
}
