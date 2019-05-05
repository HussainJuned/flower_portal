<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if(auth()->user()->userinfo->id !== $product->id) {
            return redirect()->route('home')->withErrors('Invalid Action');
        }*/

        /*$imgSize = getimagesize($request['product_photo']);
        return $imgSize;*/

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price_per_stem_bunch' => 'required|numeric|min:0|max:999999',
            'number_of_stem' => 'required|integer|min:0|max:999999',
//            'price' => 'required|numeric|min:0|max:99999999',
            'pack' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'available_date_start' => 'required|date|after_or_equal:today',
            'available_date_end' => 'required|date|after_or_equal:available_date_start',
            'stock' => 'required|integer',
            'product_photo' => 'required|string',
//            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // validate image size
        if ($request['product_photo']) {
            list($width, $height, $type, $attr) = getimagesize($request['product_photo']);

            if ($width < 400 || $width > 1024) {
                return redirect()->back()->withErrors([
                    'product_photo' => 'Image width not supported: please crop before uploading'
                ]);

            } elseif ($height < 300 || $height > 1024) {
                return redirect()->back()->withErrors([
                    'product_photo' => 'Image Height not supported: please crop before uploading'
                ]);
            }
            /*echo "Width: " .$width. "<br />";
            echo "Height: " .$height. "<br />";
            echo "Type: " .$type. "<br />";
            echo "Attribute: " .$attr. "<br />";*/
        } else {
            return redirect()->back()->withErrors([
                'product_photo' => 'Please Select and Crop before uploading'
            ]);
        }

        $product = new Product();
        $product->name = $request['name'];
        $product->user_id = auth()->id();
        $product->description = $request['description'];
        $product->price_per_stem_bunch = $request['price_per_stem_bunch'];
        $product->pack = $request['pack'];

        if($request['pack'] == 'Stem') {
            $product->number_of_stem = 1;
            $product->s_increment = $request['s_increment'];
        } else {
            $product->number_of_stem = $request['number_of_stem'];
        }

        $product->price = $request['price_per_stem_bunch'];

        $product->origin = $request['origin'];
        $product->height = $request['height'];
        $product->colour = $request['colour'];
        $product->category = $request['category'];
        $product->available_date_start = $request['available_date_start'];
        $product->available_date_end = $request['available_date_end'];
        $product->stock = $request['stock'];

        if ($request['status']) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        $product->photo_url = 'upload/default.png';
        $product->save();

        auth()->user()->userinfo->isSeller = true;
        auth()->user()->userinfo->update();


        $product->photo_url = $this->cropAndUpload($request, $product->id);
        $product->price = $product->number_of_stem * $product->price_per_stem_bunch;
        $product->update();

        return redirect()->route('seller_dashboard.myProducts')
            ->with('message', 'Product Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price_per_stem_bunch' => 'required|numeric|min:0|max:999999',
            'number_of_stem' => 'required|integer|min:0|max:999999',
//            'price' => 'required|numeric|min:0|max:99999999',
            'pack' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'available_date_start' => 'required|date',
            'available_date_end' => 'required|date',
            'stock' => 'required|integer',
//            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // validate image size
        if ($request['product_photo']) {
            list($width, $height, $type, $attr) = getimagesize($request['product_photo']);

            if ($width < 400 || $width > 1024) {
                return redirect()->back()->withErrors([
                    'product_photo' => 'Image width not supported: please crop before uploading'
                ]);

            } elseif ($height < 300 || $height > 1024) {
                return redirect()->back()->withErrors([
                    'product_photo' => 'Image Height not supported: please crop before uploading'
                ]);
            }
            /*echo "Width: " .$width. "<br />";
            echo "Height: " .$height. "<br />";
            echo "Type: " .$type. "<br />";
            echo "Attribute: " .$attr. "<br />";*/
        } else {
            /*return redirect()->back()->withErrors([
                'product_photo' => 'Please Select and Crop before uploading'
            ]);*/
        }

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price_per_stem_bunch = $request['price_per_stem_bunch'];
        $product->number_of_stem = $request['number_of_stem'];
        $product->pack = $request['pack'];
        $product->origin = $request['origin'];
        $product->height = $request['height'];
        $product->colour = $request['colour'];
        $product->category = $request['category'];
        $product->available_date_start = $request['available_date_start'];
        $product->available_date_end = $request['available_date_end'];
        $product->stock = $request['stock'];

        if($request['pack'] == 'Stem') {
            $product->number_of_stem = 1;
        } else {
            $product->number_of_stem = $request['number_of_stem'];
        }
        
        $product->price = $product->number_of_stem * $product->price_per_stem_bunch;


        if ($request['status']) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        /*$product->photo_url = 'upload/default.png';
        $product->save();*/

        if($request->has('product_photo')) {
            if($request->input('product_photo')) {
                $product->photo_url = $this->cropAndUpload($request, $product->id);
            }

        }


        $product->update();

        return redirect()->back()
                         ->with('message', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function cropAndUpload(Request $request, $id)
    {
        $image_file = $request['product_photo'];
        list($type, $image_file) = explode(';', $image_file);
        list(, $image_file) = explode(',', $image_file);
        $image_file = base64_decode($image_file);
        $image_name = auth()->user()->name . '_' . 'product_' . $id . '.png';
        $image_name = preg_replace('/\s+/', '', $image_name);
        $img_url = 'uploads/' . $image_name;
        $path = public_path($img_url);
        file_put_contents($path, $image_file);

//        return $image_name;
        return $img_url;
    }
}
