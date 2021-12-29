<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Upload;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::where('id', '>', 0);
        $products=$products->get();
        return view('product.index',compact('categories','products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $next_id = DB::select("SHOW TABLE STATUS LIKE 'categories'");
        $next_id = $next_id[0]->Auto_increment;
        $imageName = Upload::uploadImage($request->file('image'), 'products/' . $next_id);
       
        $id = DB::table('products')->insertGetId([
            'category_id'       => $request->get('category'),
            'name'              => $request->get('name'),
            'slug'              => $request->get('slug'),
            'description'       => $request->get('description'),
            'image'             => $imageName,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        $imagesName = Upload::uploadImages(request('images'),
        'products/' .$id);

        foreach ($imagesName as $image) {
            DB::table('product_images')->insert([
                'product_id'    => $id ,
                'image'         => $image,
            ]);
        }
        return redirect()->back()->with('success', 'product Added Successfully');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit($id){
        $categories=Category::all();
        $product=Product::findOrFail($id);
        return view('product.edit',compact('categories','product'));
    }

    public function update(ProductRequest $request,$id)
    {
        $product                = Product::findOrFail($id);
        $product->category_id   = $request->get('category');
        $product->name       = $request->get('name');
        $product->slug       = $request->get('slug');
        $product->description       = $request->get('description');
        if ($request->file('image')) {
            $product->icon = Upload::uploadImage($request->file('image'),
                'products/' . $product->id, $product['icon']);
        }
        if (request('images')) {
            $imagesName = Upload::uploadImages(request('images'),
                'products/' . $product->id);
        }
        $product->save();

        if(isset($imagesName) && is_array($imagesName))
        {
            foreach($imagesName as $image)
            {
                DB::table('product_images')->insert([
                    'product_id'    => $product->id,
                    'image'         => $image,

                ]);
            }
        }
        return redirect()->back()->with('success','product Updated Successfully');
    }

    public function delete($id)
    {
        $product=Product::findOrFail($id);
        foreach($product->images as $image)
        {
            $image->delete();

        }
        Upload::deleteDirectory('products/' . $product->id);
        $product->delete();
        return redirect()->back()->with('success', 'product Deleted Successfully');

    }

}
