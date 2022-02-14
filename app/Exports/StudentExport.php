<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentExport implements FromCollection, ShouldAutoSize,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function headings() :array {
    	return ["ID", "Họ", "Tên Đệm", "Tên", "Email", "SĐT", "Giới Tính", "Ngày Sinh", "Trạng thái đăng ký", "Mã lớp"];
    }
}
