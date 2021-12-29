<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Upload;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $request){
        
        
        // $category=Category::all();
        // $lastId=$category->last()->id;
        // $id=$lastId+1;
        // // dd($id);
        $next_id = DB::select("SHOW TABLE STATUS LIKE 'categories'");
        $next_id = $next_id[0]->Auto_increment;
        $imageName = Upload::uploadImage($request->file('icon'), 'categories/' . $next_id);
        DB::table('categories')->insert([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'icon' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back()->with('success', 'category Added Successfully');

    }

    public function show($id){
        $category=Category::findOrFail($id);
        return view('category.show',compact('category'));
    }

    public function edit($id){

        $category=Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request ,$id){
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->slug = $request->get('slug');
        
        if ($request->file('icon')) {
            $category->icon = Upload::uploadImage($request->file('icon'),
                'categories/' . $category->id, $category['icon']);
        }
        $category->save();
        return redirect()->back()->with('success','.category Updated Successfully');

    }
    public function delete($id){
        $category=Category::findOrFail($id);
        // dd($category->products);
        if($category->products->count() == 0){
            Upload::deleteDirectory('categories/'.$category->id);
            $category->delete();
            return redirect()->back()->with('success', 'category Deleted Successfully');
        }
        else{

            return redirect()->back()->with('danger', 'category Has Products');
        }

    }
}
