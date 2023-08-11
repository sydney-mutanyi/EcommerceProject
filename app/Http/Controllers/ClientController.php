<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{

    public function send_mail(Request $request){

        $data =[
            'name' => 'sdfsd',
            'amount' => 24,
            'phone' => 'dsfdsdf'

        ];

      Mail::to('morgansbrian012@gmail.com')->send(new OrderMail($data));


      return 'Okay';
    }


    public function index()
    {
        $latest_products = Product::orderBy('id', 'DESC')->take(12)->get();
        $categories = Category::orderBy('id','asc')->take(6)->get();
        return view('client.home',
        ['latest_products'=>$latest_products,'categories'=> $categories]
    );
    }


    public function shop_page()
    {
        $categories = Category::orderBy('id','asc')->take(6)->get();
        $featured_products = DB::table('products')->where('featured', 1)->orderBy('id', 'DESC')->take(8)->get();
        $latest_products = Product::orderBy('id', 'DESC')->take(12)->get();

        return view('client.shop',
        [
        "categories"=>$categories,'featured_products'=> $featured_products,'latest_products'=>$latest_products,
        ]
    );
    }



    public function show($id)
    {
        $product = Product::findorFail($id);

  
        $latest_products = Product::orderBy('id', 'DESC')->get();
        $related_posts1 = DB::table('products')->where('category', $product->category)->orderBy('id', 'DESC')->take(9)->get();
       
     
        $categories = Category::orderBy('id','asc')->take(6)->get();

        $reviews = DB::table('reviews')->where('product_id', $product->id)->orderBy('id', 'DESC')->take(6)->get();
        return view('client.detail',
        [
            'product'=> $product,'reviews'=>$reviews,'related_posts1'=>$related_posts1,'latest_products'=>$latest_products,'categories'=>$categories
        ]
    );
    }

    public function show_category($id)
    {
        $category = Category::findorFail($id);
        $title = $category->name;
        $latest_products = DB::table('products')->where('category', $category->name)->orderBy('id', 'DESC')->paginate(8);
        $categories = Category::orderBy('id','asc')->take(6)->get();

        return view('client.category',
        ['title'=>$title,'latest_products'=>$latest_products,
        'categories' => $categories
        ]
    );
    }

        public function search(Request $request){
        $search = $request->input('search');
        $title = 'Search Results for ' .$search;
        $categories = Category::orderBy('id','asc')->take(6)->get();

        $latest_products = Product::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%")
                    ->paginate(6);

            return view('client.category',
                    [
'title' =>$title,
                        'latest_products'=>$latest_products,
        'categories' => $categories

                    ]
        );

    }
}
