<?php

namespace App\Exports;

use App\Models\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegisterExport implements FromCollection, ShouldAutoSize,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Register::all();
    }

    public function headings() :array {
    	return ["ID", "Mã sinh viên", "Mã sách"];
    }
}
