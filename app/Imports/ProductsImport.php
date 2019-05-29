<?php

namespace App\Imports;

use App\Product;
use foo\bar;
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
            's_increment' => $row[17],
            'feature' => $row[18],
            'grower' => $row[19],
            'created_at' => $row[20],
            'updated_at' => $row[21],
        ]);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
//            return back()->with('message', auth()->user()->id);
            if ($row[1] != auth()->user()->id) {
                return back()->withErrors(['errors' => 'Auth id did not match']);
            }

            if ($row[0] != 'new') {
                $product = Product::find($row[0]);

                if($product) {
                    if($product->user_id != $row[1]) {
                        return back()->withErrors(['errors' => 'Product ID Doest not belongs to you']);
                    }
                }
            }



            if(!isset($row[14])) {
                $status = 0;
            } else {
                $status = 1;
            }

            if(!isset($row[18])) {
                $feature = 0;
            } else {
                $feature = 1;
            }

            if($row[0] === 'new') {
                Product::create([
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
                    's_increment' => $row[17],
                    'feature' => $row[18],
                    'grower' => $row[19],
                    'created_at' => $row[20],
                    'updated_at' => $row[21],
                ]);
            } else {
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
                    's_increment' => $row[17],
                    'feature' => $feature,
                    'grower' => $row[19],
                    'created_at' => $row[20],
                    'updated_at' => $row[21],
                ]);
            }
        }
        return back()->with('message', 'Product Updated Successfully');
    }
}
