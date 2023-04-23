<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperdirection
 */
class direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'img',
    ];
}
