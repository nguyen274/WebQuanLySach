<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class StudentImport implements ToModel,WithHeadingRow,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'firstName' => $row['ho'],
            'middleName' => $row['ten_dem'],
            'lastName' => $row['ten'],
            'email' => $row['email'],
            'phone' => $row['sdt'],
            'gender' => $row['gioi_tinh'] == "Nam" ? 1: 0,
            'birthDate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject( $row['ngay_sinh'])->format('Y-m-d'),
            'status' => $row['trang_thai']== "Đã Đăng Ký" ? 1: 0,
            'idGrade' => $row['ma_lop'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;//chỉ ra đâu là heading row, không lấy dữ liệu
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
