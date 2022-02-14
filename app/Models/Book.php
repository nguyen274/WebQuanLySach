<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $fillable = ['nameBook', 'amount', 'idSubject'];

    public $timestamps = false;

    public $primaryKey = 'idBook';
}
