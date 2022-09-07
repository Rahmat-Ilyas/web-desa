<?php

namespace App\Imports;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use PhpOffice\PhpSpreadsheet\Shared\Date as DateXls;

use App\Models\Penduduk;

class PendudukImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors;

    private $rows = 0;
    private $rows_scs = 0;
    public function model(array $row)
    {
        $cek = Penduduk::where('nik', $row['nik'])->first();
        if (!$cek) {
            return new Penduduk([
                "nik" => $row['nik'],
                "nama" => $row['nama'],
                "jenis_kelamin" => $row['jenis_kelamin'],
                "tempat_lahir" => $row['tempat_lahir'],
                "tanggal_lahir" => DateXls::excelToDateTimeObject($row['tanggal_lahir']),
                "alamat" => $row['alamat'],
                "agama" => $row['agama'],
                "pemilih_tetap" => $row['pemilih_tetap'] == 'Ya' ? 1 : 0,
                "pendidikan" => $row['pendidikan'],
                "status" => $row['status_perkawinan']
            ]);
            $this->rows_scs += 1;
        }
        $this->rows += 1;
    }

    public function rules(): array
    {
        return [
            "nik" => 'required|min:16|max:16',
            "nama" => 'required',
            "jenis_kelamin" => 'required',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required',
            "alamat" => 'required',
            "agama" => 'required',
            "pemilih_tetap" => 'required',
            "pendidikan" => 'required',
            "status_perkawinan" => 'required',
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function getRowCountSuccess(): int
    {
        return $this->rows_scs;
    }
}
