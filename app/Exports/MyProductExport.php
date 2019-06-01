<?php


namespace App\Exports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MyProductExport implements FromCollection, WithHeadings
{


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'user_id' ,
            'name' ,
            'description' ,
            'price_per_stem_bunch' ,
            'number_of_stem' ,
            'price' ,
            'pack' ,
            'height' ,
            'origin' ,
            'colour' ,
            'category' ,
            'available_date_start' ,
            'available_date_end' ,
            'status' ,
            'photo_url' ,
            'stock' ,
            's_increment' ,
            'feature' ,
            'grower' ,
            'created_at' ,
            'updated_at' ,
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return auth()->user()->products;
    }


}
