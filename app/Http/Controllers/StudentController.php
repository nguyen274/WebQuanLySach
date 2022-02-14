<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Bill;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;
use App\Exports\StudentExport;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $search = $request->get('search');
        $listStudent = Student::join("grade","student.idGrade","=","grade.idGrade")->where('lastName','like',"%$search%")->paginate(3); # ORM để lấy tất cả bản ghi từ database
        return view('student.index', [
            'listStudent' => $listStudent,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listGrade = grade::all();
        return view('student.create',compact('listGrade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $firstName = $request->get('firstName');
         $middleName = $request->get('middleName');
         $name = $request->get('name'); 

         $email = $request->get('email');
         $phone = $request->get('phone');
         $gender = $request->get('gender');      
         $birthDate = $request->get('birthDate');
         $status = $request->get('status');
         $nameGrade = $request->get('nameGrade');

        $student = new Student();
        $student->firstName = $firstName;
        $student->middleName = $middleName;
        $student->lastName = $name;

        $student->email = $email;
        $student->phone = $phone;
        $student->gender = $gender; 
        $student->birthDate = $birthDate; 
        $student->status = $status;
        $student->idGrade = $nameGrade;

        $student->save();
        session()->flash('success', 'Thêm sinh viên thành công!!');

        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //     $student = Student::find($id);
    //     return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $student = Student::find($id);
         $listGrade = Grade::all();
         
        return view('student.edit', [
            "student" => $student,
            "listGrade" => $listGrade
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $nameGrade = $request->get('nameGrade');
        $firstName = $request->get('firstName');
        $middleName = $request->get('middleName');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $birthDate = $request->get('birthDate');
        $gender = $request->get('gender');      
        $status = $request->get('status');

       $student = Student::find($id);
       $student->firstName = $firstName;
       $student->middleName = $middleName;
       $student->lastName = $name;

       $student->email = $email;
       $student->phone = $phone;
       $student->birthDate = $birthDate;
       $student->gender = $gender;  
       $student->idGrade = $nameGrade;
       $student->status = $status;

        $student->save();
        session()->flash('success', 'Cập nhật sinh viên thành công!!');

        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('idStudent', $id)->delete();
        return redirect(route('student.index'));
    }

    public function unregister(Request $request)
    {
        
        $search = $request->get('search');
        $listStudent = Student::join("grade","student.idGrade","=","grade.idGrade")->where('lastName','like',"%$search%")->paginate(3); 
        return view('student.unregister', [
            'listStudent' => $listStudent,
            'search' => $search,
        ]);
    }

    public function register(Request $request)
    {
        $listBook = book::all();
        $search = $request->get('search');
        $listStudent = Student::join("grade","student.idGrade","=","grade.idGrade")->where('lastName','like',"%$search%")->paginate(3); 

        return view('student.register', [
            'listStudent' => $listStudent,
            'listBook' => $listBook,
            'search' => $search,
        ]);
    }

    public function importExcel()
    {
        return view('student.import-excel');
    }

    public function importExcelProcess(Request $request)
    {
        Excel::import(new StudentImport,$request->file("excel"));
        session()->flash('success', 'Thêm file Excel thành công!!');
        return redirect(route('student.index'));
    }

    public function exportExcel()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }
}
