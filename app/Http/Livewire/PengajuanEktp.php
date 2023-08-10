<?php

namespace App\Http\Livewire;

use App\Models\Ektp;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\ProductsExport;
use App\Imports\EktpImport;
use Maatwebsite\Excel\Facades\Excel;

class PengajuanEktp extends Component
{
    use WithPagination,  WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $excelFile;

    protected $rules = [
        'excelFile' => 'required|file|mimes:xlsx, xls',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function import()
    {
        $this->validate();
        // dd($this);
        Excel::import(new EktpImport, $this->excelFile);
        // Excel::import(new ProductsImport, $this->excelFile);
    }

    public function export($ext)
    {
        return Excel::download(new EktpImport, "data-ektp.$ext");
    }

    public function render()
    {
        $ektps = Ektp::paginate(10);

        return view('livewire.pengajuan-ektp',[
            'ektps' => $ektps
        ]);
    }
}
