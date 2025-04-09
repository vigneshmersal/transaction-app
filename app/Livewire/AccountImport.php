<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AccountImport as ImportAccountImport; // To avoid naming conflicts
use Illuminate\Support\Facades\Session;

class AccountImport extends Component
{
    use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ImportAccountImport, $this->file);
            Session::flash('success', 'Excel file imported successfully!');
            $this->reset('file'); // Clear the file input
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorString = "";
            foreach ($failures as $failure) {
                $errorString .= "Row: " . $failure->row() . " - Column: " . $failure->attribute() . " - Errors: " . implode(",", $failure->errors()) . "<br>";
            }
            Session::flash('error', 'Validation errors during import:<br>' . $errorString);
        } catch (\Exception $e) {
            Session::flash('error', 'Error importing Excel file: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.account-import');
    }
}
