<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    // trỏ đến tên bẳng 
    protected $table = 'students';
    // thêm các trường của bảng add
    protected $fillable = [
        'image',
        'name',
        'email',
        'address',
        'status',

    ];
}
