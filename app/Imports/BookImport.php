<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class BookImport implements ToModel,WithHeadingRow,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'nameBook' => $row['ten_sach'],
            'amount' => $row['so_luong'],
            'idSubject' => $row['ma_mon'],
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
