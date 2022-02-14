<?php

namespace App\Http\Controllers;
use App\Models\Register;
use App\Models\Bill;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BillImport;
use App\Exports\BillExport;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listBill = Bill::join("book", "bill.idBook", "=", "book.idBook")->join("student", "bill.idStudent", "=", "student.idStudent")->where('lastName', 'like', "%$search%")->paginate(3);
        return view('bill.index', [
            'listBill' => $listBill,
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
        // $listRegister = register::all();
        // $listBook = book::all();
        // $listStudent = student::all();   

        // return view('bill.create', [
        //     'listBook' => $listBook,
        //     'listStudent' => $listStudent,
        //     'listRegister' => $listRegister,
            
        // ]);
        // return view('bill.create',['id'=>$id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $billDate = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $nameBook = $request->get('nameBook');
        $firstName = $request->get('firstName');
        $middleName = $request->get('middleName');
        $lastName = $request->get('name');
        $amountBook = $request->get('amountBook');

        $bill = new Bill();
        $bill->billDate = $billDate;
        $bill->idBook = $nameBook;
        $bill->idStudent = $firstName;
        $bill->idStudent = $middleName;
        $bill->idStudent = $lastName;

        $bill->amountBook = $amountBook;

        $bill->save();
         session()->flash('success', 'Phát sách thành công!!');
        
        return redirect(route('bill.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // $listRegister = register::all();
        // $listBook = book::all();
        // $listStudent = student::all();   

        // return view('bill.create', [
        //     'listBook' => $listBook,
        //     'listStudent' => $listStudent,
        //     'listRegister' => $listRegister,
            
        // ]);
        $register=Register::where('idRegister','=',$id)->first();
        return view('bill.create',['id'=>$register]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = bill::find($id);
        $listBook = Book::all();
        $listStudent = Student::all();


        return view('bill.edit', [
            'bill' => $bill,
            'listBook' => $listBook,
            'listStudent' => $listStudent
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
        $billDate = $request->get('billDate');
        $nameBook = $request->get('nameBook');
        $firstName = $request->get('firstName');
        $middleName = $request->get('middleName');
        $name = $request->get('name');
        $amountBook = $request->get('amountBook');

        $bill = new Bill();
        $bill->billDate = $billDate;
        $bill->idBook = $nameBook;
        $bill->idStudent = $firstName;
        $bill->idStudent = $middleName;
        $bill->idStudent = $name;

        $bill->amountBook = $amountBook;

        $bill->save();
         session()->flash('success', 'Cập nhật phiếu thu thành công!!');

        return redirect(route('bill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::where('idBill', $id)->delete();
        return redirect(route('bill.index'));
    }

    public function exportExcel()
    {
        return Excel::download(new BillExport, 'bill.xlsx');
    }
}