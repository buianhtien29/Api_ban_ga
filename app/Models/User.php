<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // THÊM DÒNG NÀY VÀO ĐỂ TẮT TÍNH NĂNG TỰ ĐỘNG LƯU NGÀY THÁNG
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name', // (hoặc các cột của bạn)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}