<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function intro()
    {
        return view('pages.search.intro');
    }

    public function searchFlower(Request $request)
    {
        if($request->has('search_flower')) {
            $keyword = $request['search_flower'];
            $keyword = trim($keyword);
        } else {
            $keyword = '';
        }
        $a_date = '';
        if($request->has('available_date')) {
            $a_date = $request['available_date'];
            $a_date = trim($a_date);

            if($a_date != '') {
            //  $a_date = Carbon::createFromFormat('Y-m-d', $a_date);
            //  $a_date = $a_date->Carbon::toDateString();

                $products = Product::where('name', 'LIKE', '%'.$keyword.'%')
                    ->where('status',  '=', true)
                    ->where('available_date_start', '<=', $a_date)
                    ->where('available_date_end', '>=', $a_date)
                    ->paginate(10);
                } else {
                    $products = Product::where('name', 'LIKE', '%'.$keyword.'%')
                        ->where('status',  '=', true)
                        ->where('available_date_end', '>=', Carbon::now()->toDateString())
                        ->paginate(10);
                }


        } else {
            $products = Product::where('name', 'LIKE', '%'.$keyword.'%')
                ->where('status',  '=', true)
                ->where('available_date_end', '>=', Carbon::now()->toDateString())
                ->paginate(10);

        }

//        $products->paginate(10);

        $categories = Category::all();

        $origns = $products = Product::select('origin')
        ->whereNotNull('origin')
        ->groupBy('origin')->get();

        $weights = $products = Product::select('weight')
        ->whereNotNull('weight')
        ->groupBy('weight')->get();

        return view('pages.search.new_search', compact('products', 'keyword', 'a_date', 'categories','origns','weights'));
    }

    public function searchSeller(Request $request)
    {
        $sellers = [];
        if($request->has('search_seller')) {
            $keyword = $request['search_seller'];
            $keyword = trim($keyword);
            if($keyword == '') {
                $sellers= User::whereHas('userinfo',function($query)use($keyword){
                        $query->where('isSeller','=', true)->where('status','=', 1);
                    })
                    ->paginate(12);
            } else {
                $sellers= User::where('name','like','%'.$keyword.'%')
                    ->whereHas('userinfo',function($query)use($keyword){
                        $query->where('isSeller','=', true)->where('status','=', 1);
                    })
                    ->orWhere('email','like','%'.$keyword.'%')
                    ->whereHas('userinfo',function($query)use($keyword){
                        $query->where('isSeller','=', true)->where('status','=', 1);
                    })
                    ->orWhereHas('userinfo',function($query)use($keyword){
                        $query->where('first_name','like','%'.$keyword.'%');
                        $query->orWhere('last_name','like','%'.$keyword.'%');
                        $query->where('isSeller','=', true)->where('status','=', 1);
                    })
                    ->paginate(12);
            }
        } else {
            $keyword = '';
        }


        return view('pages.search.results_seller', compact('sellers', 'keyword'));
    }


    public function apiFlowerAll(Request $request)
    {
//        return $request;
        $product = Product::query();

//        $product = $product->where('name', 'like' , '%' .$request->keywords . '%')
            /*->orWhere('description', 'like' , '%' .$request->keywords . '%');*/
        $product = $product->name($request->keywords ? $request->keywords : '');

        if ($request->has('delivery_date')) {
            /*$product = $product->whereDate('available_date_start', '<=', $request['delivery_date'])
                ->whereDate('available_date_end', '>=', $request['delivery_date$request['delivery_date']']);*/
            $product = $product->isAvailableOn($request['delivery_date']);
        }

        if($request->has('filter_catg')) {
            $product = $product->whereIn('category', $request['filter_catg']);
        }

        if($request->has('filter_origin')) {
            $product = $product->whereIn('origin', $request['filter_origin']);
        }

        if($request->has('filter_colour')) {
            $product = $product->whereIn('colour', $request['filter_colour']);
        }

        if($request->has('feature_filter')) {
            $product = $product->whereIn('feature', $request['feature_filter']);
        }

        if($request->has('weight_check')) {
            $product = $product->whereIn('weight', $request['weight_check']);
        }        


        if($request->has('filter_length')) {

            $lengths = $request['filter_length'];
            $l = array();
            foreach ($lengths as $length) {
                for ($i=0; $i <= 9; $i++) {
                    array_push($l, $length+$i);
                }
            }
         
            $product = $product->whereIn('height', $l);
            //$product = $product->whereBetween('height', [ $length[0], $length[0]+9 ]);
//            $product = $product->whereBetween('height', [ $length, $length+9 ]);
        }


        if ($request->has('sort_by')) {
            if($request->sort_by === 'price_high') {
                $product = $product->orderBy('price', 'desc');
            } else {
                $product = $product->orderBy($request->sort_by, 'asc');
            }
        }

//        $product->paginate(16);

//        return response()->json($product);
        return $product->paginate(16)->appends($_GET);
    }


    /*public function apiCartTest(Request $request)
    {
        return $request;
    }*/
}
