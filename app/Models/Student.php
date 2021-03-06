<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = ['firstName', 'middleName', 'lastName', 'email', 'phone', 'gender', 'birthDate', 'status', 'idGrade'];

    protected $dateFormat = '';
    public $timestamps = false;
    public $primaryKey = 'idStudent';


    public function getFullNameAttribute()
    {
        return $this->lastName . " " . $this->middleName . " " . $this->firstName;
    }

    public function getGenderNameAttribute()
    {
        if ($this->gender == 1) {
            return "Nam";
        } else {
            return "Nữ";
        }
    }
}
