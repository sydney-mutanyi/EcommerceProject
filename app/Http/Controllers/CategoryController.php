<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CheckoutLocation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.create-category',[
            'category'=> $categories
        ]);

    }


    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/', $filename);
            $category->image = $filename;
        } else {
            return $request;
            $category->image = '';

        }

        $category->save();
        return redirect()->route('create-cat');
    }

    public function delete_category($id){

        $category = Category::findorFail($id);

        $category->delete();

        return redirect()->back();
    }

    public function create_location()
    {
        $locations = CheckoutLocation::all();
        return view('admin.create-location',[
            'locations'=> $locations
        ]);

    }


    public function store_location(Request $request)
    {
        $location = new CheckoutLocation();

        $location->name = $request->input('name');
        $location->amount = $request->input('amount');


        $location->save();
        return redirect()->route('create-location')->with('success','Location saved Succesfully');

       
    }

    public function delete_location($id){

        $location = CheckoutLocation::findorFail($id);

        $location->delete();

        return redirect()->back();
    }
}
