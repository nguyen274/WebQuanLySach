<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdminImport;
use App\Exports\AdminExport;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listAdmin = Admin::where('nameAdmin', 'like', "%$search%")->paginate(3); 
        return view('admin.index', [
            'listAdmin' => $listAdmin,
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
        return view('admin.create');
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
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $dateBirth = $request->get('dateBirth');
        $gender = $request->get('gender');      
        $role = $request->get('role');

        $admin = new admin();
        $admin->nameAdmin = $name;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email = $email;
        $admin->phone = $phone;
        $admin->dateBirth = $dateBirth;
        $admin->gender = $gender;       
        $admin->role = $role;

        $admin->save();

        session()->flash('success', 'Thêm admin thành công!!');

        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit',[
            "admin" => $admin
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
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $dateBirth = $request->get('dateBirth');
        $gender = $request->get('gender');      
        $role = $request->get('role');

        $admin = Admin::find($id);
        $admin->nameAdmin = $name;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email = $email;
        $admin->phone = $phone;
        $admin->dateBirth = $dateBirth;
        $admin->gender = $gender;       
        $admin->role = $role;
        $admin->save();

        session()->flash('success', 'Cập nhật Admin thành công!!');

        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('idAdmin', $id)->delete();
        return redirect(route('admin.index'));
    }

    public function importExcel()
    {
        return view('admin.import-excel');
    }

    public function importExcelProcess(Request $request)
    {
        Excel::import(new AdminImport,$request->file("excel"));
        session()->flash('success', 'Thêm file Excel thành công!!');
        return redirect(route('admin.index'));
    }

    public function exportExcel()
    {
        return Excel::download(new AdminExport, 'admin.xlsx');
    }
}


