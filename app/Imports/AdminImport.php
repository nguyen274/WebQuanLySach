<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class AdminImport implements ToModel,WithHeadingRow,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Admin([
            'nameAdmin' => $row['ho_ten'],
            'username' => $row['username'],
            'password' => $row['password'],
            'email' => $row['email'],
            'phone' => $row['sdt'],
            'dateBirth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject( $row['ngay_sinh'])->format('Y-m-d'),
            'gender' => $row['gioi_tinh'] == "Nam" ? 1: 0,
            'role' => $row['chuc_vu'] == "Super Admin" ? 1: 0,
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
