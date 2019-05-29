<?php

namespace App\Http\Controllers;

use App\Exports\MyProductExport;
use App\Imports\ProductsImport;
use App\Product;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ProductExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exportToExcel()
    {
//        $data = auth()->user()->products->toArray();

        return Excel::download(new MyProductExport, 'my_products.xlsx');
    }

    public function importToExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required'
        ]);

        $path = $request->file('excel_file')->getRealPath();
        $data = Excel::load($path)->get();

            foreach ($data as $key => $value) {
                /*$arr[] = [
                    'id' => $value->id,
                    'user_id' => $value->user_id ,
                    'name' => $value->name,
                    'description' => $value->description,
                    'price_per_stem_bunch' => $value->price_per_stem_bunch,
                    'number_of_stem' => $value->number_of_stem,
                    'price' => $value->price,
                    'pack' => $value->pack,
                    'height' => $value->height,
                    'origin' => $value->origin,
                    'colour' => $value->colour,
                    'category' => $value->category,
                    'available_date_start' => $value->available_date_start,
                    'available_date_end' => $value->available_date_end,
                    'status' => $value->status,
                    'photo_url' => $value->photo_url,
                    'stock' => $value->stock,

                ];*/

                $product = Product::updateOrCreate([
                    'id' => $value->id,

                ], [
                    'user_id' => $value->user_id ,
                    'name' => $value->name,
                    'photo_url' => $value->photo_url,
                    'description' => $value->description,
                    'price_per_stem_bunch' => $value->price_per_stem_bunch,
                    'number_of_stem' => $value->number_of_stem,
                    'price' => $value->price,
                    'pack' => $value->pack,
                    'height' => $value->height,
                    'origin' => $value->origin,
                    'colour' => $value->colour,
                    'category' => $value->category,
                    'available_date_start' => $value->available_date_start,
                    'available_date_end' => $value->available_date_end,
                    'status' => $value->status,
                    'stock' => $value->stock,
                    's_increment' => $value->s_increment,
                    'feature' => $value->feature,
                    'grower' => $value->grower,
                ]);
            }

            /*if (!empty($arr)) {
                Product::insert($arr);
            }*/
        $products = auth()->user()->products;
        return redirect()->back()->with('message', 'Record Inserted successfully.', compact('products'));
    }

    public function importFromExcel(Request $request)
    {
        Excel::import(new ProductsImport, request()->file('excel_file'));
        $products = auth()->user()->products;
        return redirect()->back()->with([ 'products' => $products]);
    }
}
