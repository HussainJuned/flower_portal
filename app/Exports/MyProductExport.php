<?php


namespace App\Exports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class MyProductExport implements FromCollection
{

    /**
     * @return Collection
     */
    public function collection()
    {
        return auth()->user()->products;
    }
}
