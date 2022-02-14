<?php

namespace App\Models;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';

    public $timestamps = false;

    public $primaryKey = 'idRegister';

   public function getbookAttribute(){
       $id=$this->idBook;
       $book=Book::where('idBook','=',$id)->first();
       return $book->nameBook;
   }
  

   public function getstudentAttribute(){
    $id=$this->idStudent;
    $student=Student::where('idStudent','=',$id)->first();
    return $student->FullName;
}
}
