<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','is_done','body'
    ];

    protected $casts = [
        'is_done' => 'bool'
    ];
}
