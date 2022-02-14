<?php

namespace App\Http\Controllers;
use App\Models\Register;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RegisterImport;
use App\Exports\RegisterExport;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listStudent = student::all();
        $listBook = book::all();
        $search = $request->get('search');
        $listRegister = Register::join("student", "register.idStudent", "=", "student.idStudent")->join("book", "register.idBook", "=", "book.idBook")->where('lastName', 'like', "%$search%")->paginate(3); 
        return view('register.index', [
            'listStudent' => $listStudent,
            'listBook' => $listBook,
            'listRegister' => $listRegister,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        {
          
            $listBook = book::all();
            $listStudent = student::all();  
            return view('register.create', [
                'listStudent' => $listStudent,
                'listBook' => $listBook,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameStudent = $request->get('nameStudent');
        $nameBook = $request->get('nameBook');

        $register = new Register();
        $register->idStudent = $nameStudent;
        $register->idBook = $nameBook; 
        $register->save();
        session()->flash('success', 'Thêm sinh viên thành công!!');

        return redirect(route('register.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportExcel()
    {
        return Excel::download(new RegisterExport, 'register.xlsx');
    }
}
