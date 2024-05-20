<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'path',
        'created_by'
    ];

}
