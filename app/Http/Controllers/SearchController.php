<?php

namespace App\Http\Controllers;

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
//                $a_date = Carbon::createFromFormat('Y-m-d', $a_date);
//                $a_date = $a_date->Carbon::toDateString();

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



        return view('pages.search.new_search', compact('products', 'keyword', 'a_date'));
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



}
