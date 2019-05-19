<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        if(!isset($row[14])) {
            $status = 0;
        } else {
            $status = $row[14];
        }

        return new Product([
            'user_id' => $row[1],
            'name' => $row[2],
            'description' => $row[3],
            'price_per_stem_bunch' => $row[4],
            'number_of_stem' => $row[5],
            'price' => $row[6],
            'pack' => $row[7],
            'height' => $row[8],
            'origin' => $row[9],
            'colour' => $row[10],
            'category' => $row[11],
            'available_date_start' => $row[12],
            'available_date_end' => $row[13],
            'status' => $status,
            'photo_url' => $row[15],
            'stock' => $row[16],
            'created_at' => $row[17],
            'updated_at' => $row[18],
            's_increment' => $row[19],
            'feature' => $row[20],
            'grower' => $row[21],
        ]);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if(!isset($row[14])) {
                $status = 0;
            } else {
                $status = 1;
            }

            Product::updateOrCreate([
                'id' => $row[0],
                'user_id' => $row[1]
            ], [
                'name' => $row[2],
                'description' => $row[3],
                'price_per_stem_bunch' => $row[4],
                'number_of_stem' => $row[5],
                'price' => $row[6],
                'pack' => $row[7],
                'height' => $row[8],
                'origin' => $row[9],
                'colour' => $row[10],
                'category' => $row[11],
                'available_date_start' => $row[12],
                'available_date_end' => $row[13],
                'status' => $status,
                'photo_url' => $row[15],
                'stock' => $row[16],
                'created_at' => $row[17],
                'updated_at' => $row[18],
                's_increment' => $row[19],
                'feature' => $row[20],
                'grower' => $row[21],
            ]);
        }
    }
}
