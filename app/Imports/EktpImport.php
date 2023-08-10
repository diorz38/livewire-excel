<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Ektp;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EktpImport implements ToModel, SkipsEmptyRows, SkipsOnError, WithHeadingRow
{
    use Importable, SkipsErrors;

    /**
    * @return string|array
    */
    // public function uniqueBy()
    // {
    //     return 'model';
    // }
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row)
    //     {
    //         dd($row);

    //     }
    // }
    public function model(array $row)
    {
        // dd($row);
            return new Ektp([
            'no'     => $row[0],
            'tanggal'     => Carbon::instance(Date::excelToDateTimeObject($row[1])),
            'nik'    => $row[2],
            'kecamatan'    => $row[3],
            'kecamatan'    => $row[4],
            'no_hp'    => $row[5],
            'keterangan'    => $row[6],
            'created_at' => now(),
        ]);
    }
    public function headingRow(): int
    {
        return 6;
    }

}
