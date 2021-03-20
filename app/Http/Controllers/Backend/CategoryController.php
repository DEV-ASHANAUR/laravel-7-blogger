<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:80|min:3|unique:categories',
            'description' => 'sometimes|max:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = strtolower(str_replace(' ','-',$request->name));

        $image = $request->image;

        $imageName = $category->slug . uniqid() . '.' . $image->getClientOriginalExtension();
        // dd($imageName);

        if(!Storage::disk('public')->exists('category')){
            Storage::disk('public')->makeDirectory('category');
        }

        $categoryImage = Image::make($image)->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();
        Storage::disk('public')->put('category/'.$imageName,$categoryImage);
        $category->image = $imageName;
        $category->created_at = Carbon::now();

        if($category->save()){
            $notification=array(
                'message'=>'Successfully Save Category',
                'alert-type'=>'success'
            );

        }
        return redirect()->back()->with($notification);
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
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $id,
            'description' => 'sometimes|max:1000',
        ]);
        $category =Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = strtolower(str_replace(' ','-',$request->name));
        
        if($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            $image = $request->image;
        
            $imageName = $category->slug . uniqid() . '.' . $image->getClientOriginalExtension();
            // dd($imageName);

            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }
            //delete old image
            if(Storage::disk('public')->exists('category')){
                Storage::disk('public')->delete('category/' . $category->image);
            }


            $categoryImage = Image::make($image)->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            Storage::disk('public')->put('category/'.$imageName,$categoryImage);
            
        }else{
            $imageName = $category->image;
        }
        $category->image = $imageName;
        $category->created_at = Carbon::now();

        if($category->save()){
            $notification=array(
                'message'=>'Successfully Update Category',
                'alert-type'=>'success'
            );

        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::disk('public')->delete('category/' . $category->image);
        $category->delete();
        $notification=array(
            'message'=>'Successfully Delete Category',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
