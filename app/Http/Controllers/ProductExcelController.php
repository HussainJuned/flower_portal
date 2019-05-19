<?php

namespace App\Http\Controllers;

use App\Exports\MyProductExport;
use App\Product;
use Excel;
use Illuminate\Http\Request;

class ProductExcelController extends Controller
{
    public function exportToExcel()
    {
//        $data = auth()->user()->products->toArray();

        return Excel::download(new MyProductExport, 'my_products.xlsx');
    }
}
