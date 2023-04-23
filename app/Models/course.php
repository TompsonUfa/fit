<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelpercourse
 */
class course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'text',
        'img',
    ];
}
