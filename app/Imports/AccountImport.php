<?php

namespace App\Imports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class AccountImport implements ToModel, WithHeadingRow, WithValidation //, WithBatchInserts, WithChunkReading, ShouldQueue, SkipsOnFailure
{
    use SkipsFailures;
    
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // \Log::info($row);
        return new Account([
            'account_number' => $row['account_number'],
            'tag1' => $row['tag1'],
            'tag2' => $row['tag2'],
            'tag3' => $row['tag3'],
            'tag4' => $row['tag4'],
            'account_name' => $row['account_name'],
            'product_category' => $row['product_category'],
            'product_type' => $row['product_type'],
            'activation_date' => $row['activation_date'],
            // 'activation_date' => $row['activation_date'] ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['activation_date']) : null,
            'status' => $row['status'],
            'party_id' => $row['party_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'account_number' => 'required|int|unique:accounts',
            'account_name' => 'required|string|max:255',
            'product_category' => 'string',
            'product_type' => 'string',
            'activation_date' => 'nullable|date', // Making this nullable as per discussion
            'status' => 'required|string|max:50',
            'party_id' => 'int',
        ];
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }

    // public function batchSize(): int
    // {
    //     return 1000;
    // }

    // public function chunkSize(): int
    // {
    //     return 1000;
    // }
}
