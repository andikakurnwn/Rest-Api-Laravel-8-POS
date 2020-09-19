<?php

namespace App\Http\Controllers\Api\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\SizeVariation;
use Carbon\Carbon;

class ProductController extends Controller
{

    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ps = Auth::guard('api')->user()->products;
        $products = array();
        foreach($ps as $key=>$p){
            if($p->available_size == true){
                $products[$key] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('size_variations')
                ->with('categories')
                ->first();
            }else {
                $products[$key] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('product_price')
                ->with('categories')
                ->first();
            }

            $key++;
        }

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Cashier Products :)',
                'data' => $products

            ], $this->successStatus
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Categories :)',
                'data' => $categories

            ], $this->successStatus
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'price' => 'required',

        ]);

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        $images = $request->allFiles('image');
        $slug = str_slug($request->name);
        if(isset($images)){

            foreach($images as $image){


                // make uniqe name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // check Product dir is exists
                if (!Storage::disk('public')->exists('product'))
                {
                    Storage::disk('public')->makeDirectory('product');
                }

                // resize image for Product and upload
                $saveProductImage = Image::make($image)->resize(200, 200)->save();
                Storage::disk('public')->put('product/'.$imageName, $saveProductImage);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->name = $imageName;
                $productImage->save();


            }
        }

        $productPrice = new ProductPrice();
        $productPrice->product_id = $product->id;
        $productPrice->stock = $request->stock;
        $productPrice->price = $request->price;
        $productPrice->save();
        $product->categories()->attach($request->categories);
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Added Product :)',

            ], $this->successStatus
        );


    }

    public function storeWithVariations(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'image' => 'required',
            'variations' => 'required'

        ]);

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->available_size = 1;
        $product->save();


        $images = $request->allFiles('image');
        $slug = str_slug($request->name);
        if(isset($images)){

            foreach($images as $image){


                // make uniqe name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // check Product dir is exists
                if (!Storage::disk('public')->exists('product'))
                {
                    Storage::disk('public')->makeDirectory('product');
                }

                // resize image for Product and upload
                $saveProductImage = Image::make($image)->resize(200, 200)->save();
                Storage::disk('public')->put('product/'.$imageName, $saveProductImage);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->name = $imageName;
                $productImage->save();


            }
        }

        $variations = $request->variations['ov'];
        for($i = 0; $i < count($variations); $i++){

            $sizeVariation = new SizeVariation();
            $sizeVariation->product_id = $product->id;
            $sizeVariation->size = $variations[$i]['size'];
            $sizeVariation->stock = $variations[$i]['stock'];
            $sizeVariation->price = $variations[$i]['price'];
            $sizeVariation->save();

        }
        $product->categories()->attach($request->categories);

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Added Product :)'


            ], $this->successStatus
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if($product->available_size == true){
            $products = Product::where('id', $product->id)
            ->with('categories')
            ->with('product_images')
            ->with('size_variations')
            ->first();
        }else {
            $products = Product::where('id', $product->id)
            ->with('categories')
            ->with('product_images')
            ->with('product_price')
            ->first();
        }

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Deleted Product :)',
                'data' => $products,

            ], $this->successStatus
        );


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'stock' => 'required',
            'price' => 'required',

        ]);

        $product = Product::find($id);
        $product->user_id = Auth::guard('api')->user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        // $images = $request->allFiles('image');
        // $slug = str_slug($request->name);
        // if(isset($images)){

        //     $productImage = ProductImage::where('product_id', $product->id)->first();

        //     foreach($images as $image){

        //         // make uniqe name for image
        //         $currentDate = Carbon::now()->toDateString();
        //         $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //         // check Product dir is exists
        //         if (!Storage::disk('public')->exists('product'))
        //         {
        //             Storage::disk('public')->makeDirectory('product');
        //         }

        //         // resize image for Product and upload
        //         $saveProductImage = Image::make($image)->resize(200, 200)->save();
        //         Storage::disk('public')->put('product/'.$imageName, $saveProductImage);

        //         $productImage->product_id = $product->id;
        //         $productImage->name = $imageName;
        //         $productImage->save();


        //     }
        // }

        $productPrice = ProductPrice::where('product_id', $product->id)->first();
        $productPrice->product_id = $product->id;
        $productPrice->stock = $request->stock;
        $productPrice->price = $request->price;
        $productPrice->save();
        $product->categories()->detach($request->categories);
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Updated Product :)',

            ], $this->successStatus
        );

    }


    public function storeImage(Request $request, $id)
    {

        $this->validate($request, [
            'image' => 'required'
        ]);


        $product = Product::find($id);

        $image = $request->file('image');
        $slug = str_slug($product->name);
        if(isset($image)){

               // make uniqe name for image
               $currentDate = Carbon::now()->toDateString();
               $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

               // check Product dir is exists
               if (!Storage::disk('public')->exists('product'))
               {
                   Storage::disk('public')->makeDirectory('product');
               }

                // resize image for Product and upload
                $saveProductImage = Image::make($image)->resize(200, 200)->save();
                Storage::disk('public')->put('product/'.$imageName, $saveProductImage);

        }

        $productImage = new ProductImage();
        $productImage->product_id = $product->id;
        $productImage->name = $imageName;
        $productImage->save();

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Updated Product :)',

            ], $this->successStatus
        );

    }

    public function updateWithVariations(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'image' => 'image',
            'stock' => 'required',
            'price' => 'required',

        ]);

        $product = Product::find($id);
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        $images = $request->allFiles('image');
        $slug = str_slug($request->name);
        if(isset($images)){

            $productImage = ProductImage::where('product_id', $product->id)->first();

            foreach($images as $image){

                // make uniqe name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // check Product dir is exists
                if (!Storage::disk('public')->exists('product'))
                {
                    Storage::disk('public')->makeDirectory('product');
                }

                // resize image for Product and upload
                $saveProductImage = Image::make($image)->resize(200, 200)->save();
                Storage::disk('public')->put('product/'.$imageName, $saveProductImage);

                $productImage->product_id = $product->id;
                $productImage->name = $imageName;
                $productImage->save();


            }
        }


        $variations = $request->variations['ov'];
        for($i = 0; $i < count($variations); $i++){

            $sizeVariation = new SizeVariation();
            $sizeVariation->product_id = $product->id;
            $sizeVariation->size = $variations[$i]['size'];
            $sizeVariation->stock = $variations[$i]['stock'];
            $sizeVariation->price = $variations[$i]['price'];
            $sizeVariation->save();

        }
        $product->categories()->detach($request->categories);
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Updated Product :)',

            ], $this->successStatus
        );    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function desroyImage($id)
    {

        $productImage = ProductImage::where('product_id', $id)->first();

        // delete old post image
        if(Storage::disk('public')->exists('post/'.$productImage->name))
        {
            Storage::disk('public')->delete('post/'.$productImage->name);
        }
        $productImage->delete();

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Deleted Image Product :)',

            ], $this->successStatus
        );
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $productImages = ProductImage::where('product_id', $product->id)->get();
        foreach($productImages as $productImage){
            if (Storage::disk('public')->exists('product/'.$productImage->name))
            {
                Storage::disk('public')->delete('product/'.$productImage->name);
            }
        }
        if($product->availabel_size == true){
            SizeVariation::where('product_id', $product->id)->delete();
        }else {
            ProductPrice::where('product_id', $product->id)->delete();
        }
        $product->categories()->detach();
        $productImages->delete();
        $product->delete();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Deleted Product :)',

            ], $this->successStatus
        );
    }
}
