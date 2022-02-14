<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = ['nameAdmin', 'username', 'password', 'email', 'phone', 'dateBirth', 'gender', 'role'];
    public $timestamps = false;

    public $primaryKey = 'idAdmin';
}