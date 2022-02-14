<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Book;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        // select * .... where name like '%abc%'
        $listGrade = Grade::join("course", "grade.idCourse", "=", "course.idCourse")->where('nameGrade', 'like', "%$search%")->paginate(3); # ORM để lấy tất cả bản ghi từ database
        return view('grade.index', [
            'listGrade' => $listGrade,
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
        $listCourse = course::all();
        return view('grade.create', [
            'listCourse' => $listCourse,
        ]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $nameCourse = $request->get('nameCourse');

        $grade = new Grade();
        $grade->nameGrade = $name;
        $grade->idCourse = $nameCourse;

        $grade->save();
        session()->flash('success', 'Thêm lớp thành công!!');

        return redirect(route('grade.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Hiển thị danh sách sinh viên theo lớp
        // $grade = Grade::where('idGrade', $id)->first(); 
        // $grade = Grade::find($id);
        // return $grade;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        $listCourse = Course::all();

        return view('grade.edit', [
            "grade" => $grade,
            'listCourse' => $listCourse
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
        $nameCourse = $request->get('nameCourse');

        $grade = Grade::find($id);
        $grade->nameGrade = $name;
        $grade->idCourse = $nameCourse;

        $grade->save();
        session()->flash('success', 'Cập nhật lớp học thành công!!');

        return redirect(route('grade.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Grade::where('idGrade', $id)->delete();
        // return redirect(route('grade.index'));
    }
}