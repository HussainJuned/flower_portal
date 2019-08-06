<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductCategory;
use App\TempImgUpload;
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
        $categories = ProductCategory::all();
        $tags = Product::existingTags()->pluck('name');
        return view('pages.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$unused_tmp = TempImgUpload::where('user_id', auth()->id())->get();
        foreach ($unused_tmp as $ut) {
//            unlink($ut->path);
//            $ut->delete();
            echo ('<p>' . $ut->path . '</p>');
        }

        return;*/
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
            'weight' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'available_date_start' => 'required|date|after_or_equal:today',
            'available_date_end' => 'required|date|after_or_equal:available_date_start',
            'stock' => 'required|integer',
            'product_photo' => 'required|string',
//            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);



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
        $product->weight = $request['weight'];
        $product->colour = $request['colour'];
        $product->category = $request['category'];
        $product->available_date_start = $request['available_date_start'];
        $product->available_date_end = $request['available_date_end'];
        $product->stock = $request['stock'];
        $product->feature = $request['feature'];
//        $product->payment_type = $request['payment_type'];
        $product->grower = $request['grower'];

        if ($request['status']) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        $product->photo_url = 'upload/default.png';
        $product->save();

        auth()->user()->userinfo->isSeller = true;
        auth()->user()->userinfo->update();

        if($request->has('image_id')) {
            $image_id = $request->image_id;
            if ($image_id > 0) {
                $tmp_img = TempImgUpload::find($image_id);
                if ($tmp_img) {
//                    $ti_array = explode('/', $tmp_img->path);
//                    $img_name = end($ti_array);
//                    $img_url = 'uploads/' . $img_name;
//                    rename($tmp_img->path, $img_url);
//                    $product->photo_url = $img_url;
//                    $product->update();
                    $product->photo_url = $this->cropAndUpload($request, $product->id);
                    $product->update();

                    $tmp_img->delete();

                    $unused_tmp = TempImgUpload::where('user_id', auth()->id())->get();
                    foreach ($unused_tmp as $ut) {
                        unlink(public_path() . '/' .$ut->path);
                        $ut->delete();
                    }
                }
            } else {
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

                $product->photo_url = $this->cropAndUpload($request, $product->id);
                $product->update();
            }
        }

        $product->price = $product->number_of_stem * $product->price_per_stem_bunch;
//        $product->photo_url = $this->cropAndUpload($request, $product->id);
        $product->update();

        $product->tag(explode(',', $request->tags));

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
        $categories = ProductCategory::all();
        $tags = Product::existingTags()->pluck('name');
//        return $product;
        return view('pages.products.edit', compact('product', 'categories', 'tags'));
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
            'weight' => 'required|string|max:255',
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
        $product->weight = $request['weight'];
        $product->height = $request['height'];
        $product->colour = $request['colour'];
        $c = Category::find($request['category']);
        $product->category = $c->id;
        $product->available_date_start = $request['available_date_start'];
        $product->available_date_end = $request['available_date_end'];
        $product->stock = $request['stock'];
        $product->feature = $request['feature'];
        $product->grower = $request['grower'];

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

    public function getImage(Request $request)
    {
        $message = '';
        $unique_id = '';
        $image_id = 0;
        $img_url = $request->img;
        $image_data = '';
        $new_img_path = '';
        if ($request->has('img')) {
            if (filter_var($img_url, FILTER_VALIDATE_URL)) {
                $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
                $url_array = explode('/', $img_url);
                $img_name = end($url_array);
                $img_array = explode('.', $img_name);
                $img_extention = end($img_array);
                if (in_array($img_extention, $allowed_extension)) {
                    $image_data = file_get_contents($img_url);
                    $unique_id = uniqid('', false);
                    $new_img_path = 'tmp/'. auth()->user()->id . '_' . $unique_id . '.' . $img_extention;
                    file_put_contents($new_img_path, $image_data);
                    $message = 'Image uploaded successfully';

                    $tiu = new TempImgUpload();
                    $tiu->user_id = auth()->user()->id;
                    $tiu->unique_id = $unique_id;
                    $tiu->path = $new_img_path;
                    $tiu->save();

                    $image_id = $tiu->id;
                } else {
                    $message = 'Image upload failed';
                }
            } else {
                $message = 'Invalid url';
            }
        } else {
            $message = 'url not found';
        }

        $data = array(
            'message' => $message,
            'unique_id' => $unique_id,
            'image_id' => $image_id,
//            'image_data' => base64_encode($image_data),
            'image_path' => /*public_path(). '/' .*/  $new_img_path,
        );

        return $data;
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
