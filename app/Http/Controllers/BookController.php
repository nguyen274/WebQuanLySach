<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Bill;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BookImport;
use App\Exports\BookExport;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listBook = Book::join("subject", "book.idSubject", "=", "subject.idSubject")->where('nameBook', 'like', "%$search%")->paginate(3); 
        return view('book.index', [
            'listBook' => $listBook,
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
        $listSubject = subject::all();
        return view('book.create', [
            'listSubject' => $listSubject,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $nameSubject = $request->get('nameSubject');
        $amount = $request->get('amount');

        $book = new book();
        $book->nameBook = $name;
        $book->idSubject = $nameSubject;
        $book->amount = $amount;

        $book->save();
         session()->flash('success', 'Thêm sách thành công!!');

        return redirect(route('book.index'));
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
        $book = book::find($id);
        $listSubject = Subject::all();

        return view('book.edit', [
            'book' => $book,
            'listSubject' => $listSubject
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
        $nameSubject = $request->get('nameSubject');
        $amount = $request->get('amount');

        $book = Book::find($id);
        $book->nameBook = $name;
        $book->idSubject = $nameSubject;
        $book->amount = $amount;

        $book->save();

         session()->flash('success', 'Cập nhật sách thành công!!');

        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('idBook', $id)->delete();
        return redirect(route('book.index'));
    }

    public function importExcel()
    {
        return view('book.import-excel');
    }

    public function importExcelProcess(Request $request)
    {
        Excel::import(new BookImport,$request->file("excel"));
        session()->flash('success', 'Thêm file Excel thành công!!');
        return redirect(route('book.index'));
    }

    public function exportExcel()
    {
        return Excel::download(new BookExport, 'book.xlsx');
    }

}
