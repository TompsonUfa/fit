<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperposter
 */
class poster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'img',
        'name',
    ];
}
