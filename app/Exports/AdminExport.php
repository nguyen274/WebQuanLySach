<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdminExport implements FromCollection, ShouldAutoSize,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::all();
    }

    public function headings() :array {
    	return ["ID", "Họ tên", "Username", "Password", "Email", "SĐT", "Ngày Sinh", "Giới tính", "Chức Vụ"];
    }
}
