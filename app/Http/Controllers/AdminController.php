<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Transaction;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Image;
use PDF;


class AdminController extends Controller
{
    public function homepage(){

        $orders_count = Order::all()->count();
        $products_count = Product::all()->count();
        $contacts_count = Contact::all()->count();
        $reviews_count = Review::all()->count();

        $client_orders = Order::orderBy('created_at','DESC')->Paginate(5);
        $contact_us = Contact::orderBy('created_at','DESC')->Paginate(5);


        return view('admin.home',
    [
        'orders_count' => $orders_count,
        'products_count' => $products_count,
        'contacts_count' => $contacts_count,
        'reviews_count' => $reviews_count,
        'client_orders' => $client_orders,
        'contact_us' => $contact_us

    ]);
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.create-product', [
            'category'=> $category
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->reg_price = $request->input('reg_price');

        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->featured = $request->input('featured');

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/', $filename);
            $product->image = $filename;
        } else {
            return $request;
            $product->image = '';

        }

        $product->save();
        return redirect('/products-listing');
    }

  
        public function create_update_product($id)
    {

        $product = Product::findorFail($id);
        $category = Category::all();
        return view('admin.update-product', [
            'category'=> $category,
            'product' => $product,
        ]);
    }

    public function update_product(Request $request){




        DB::table('products')
        ->where('id', $request->input('product_id'))
        ->update([
            'stock_status' => $request->input('stock_status'),

            'name' => $request->input('name'),
           'price' =>  $request->input('price'),

    
            "description" =>  $request->input('description'),
            "quantity" =>  $request->input('quantity'),
            // "stock_status" => $request->input('stock_status'),
    

            ]);

            return redirect()->back();


    }

    public function productlisting(){
        $product = Product::orderBy('id','desc')->paginate(10);
        $product1 = Product::get()->first();
        return view('admin.products_listing',
        [
            'product' => $product
        ]
            );
    }

    public function adminProduct($id){

        $product = Product::findorFail($id);

        // dd($product->images);

        return view('admin.product_item',
        [
            'product' => $product
        ]
            );
    }


    public function store_product_color(Request $request)
    {
        $product_color = new Color();
        $product_color->color_name = $request->input('color_name');
        $product_color->product_id = $request->input('product_id');


        $product_color->save();
        return redirect()->back();
    }

    public function store_product_image(Request $request)
    {
        $product_image = new Image();

        $product_image->product_id = $request->input('product_id');

        
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/products/', $filename);
            $product_image->image = $filename;
        } else {
            return $request;
            $product_image->image = '';

        }


        $product_image->save();
        return redirect()->back()->with('success','Image Saved Succesfully');
        
    }

    public function store_product_size(Request $request)
    {
        $product_size = new Size();
        $product_size->product_size = $request->input('product_size');
        $product_size->product_id = $request->input('product_id');


        $product_size->save();
        return redirect()->back();
    }


    public function delete_product($id){

        $product = Product::findorFail($id);

        $product->delete();

        return redirect()->back();
    }


    public function active_admin_orders(){
        // $client_orders = Order::orderBy('created_at','DESC')->Paginate(12);

        $client_orders = DB::table('orders')->where('status', 'ordered')->orWhere('status','approved')
     
        ->orderBy('id', 'DESC')->Paginate(12);


        return view('admin.report.orders',[
            'client_orders' => $client_orders,
            'title' => 'Active Client Orders'
        ]);
    }


    public function admin_orders(){
        // $client_orders = Order::orderBy('created_at','DESC')->Paginate(12);

        $client_orders = DB::table('orders')->where('status', 'cancelled')->orWhere('status','delivered')
     
        ->orderBy('id', 'DESC')->Paginate(12);

        return view('admin.report.orders',[
            'client_orders' => $client_orders,
            'title' => 'Closed Client Orders'

        ]);
    }

    public function pdfreport(){

        $data = DB::table('orders')->where('status', 'cancelled')->orWhere('status','delivered')
     
        ->orderBy('id', 'DESC')->Paginate(12);

        view()->share('order',$data);
        $pdf = PDF::loadView('account.pdforder',[$data]);

        return $pdf->download('order_report.pdf');

        //  return view('account.pdforder',['order'=> $client_orders]);
        
    }

    public function show_order ($id){
        $client_order = Order::findorFail($id);

        // dd($client_order->OrderItem);

        return view('admin.report.order_item',[
            'client_order' => $client_order
        ]);

    }

    public function update_status(Request $request){

        DB::table('orders')
        ->where('id', $request->input('id'))

        ->update([
            'status' => $request->input('status'),

            ]);

            return redirect()->back();


    }

    public function update_payment(Request $request){



        DB::table('transactions')
        ->where('order_id', $request->input('id'))



        ->update([
            'status' => $request->input('status'),

            ]);

            return redirect()->back();


    }



    public function show_contacts(){

        $contacts = Contact::orderBy('created_at','DESC')->Paginate(12);
        return view('admin.report.contact',[
            'contacts' => $contacts
        ]);

    }

    public function show_reviews(){

        $reviews = Review::orderBy('created_at','DESC')->Paginate(12);
        return view('admin.report.reviews',[
            'reviews' => $reviews
        ]);

    }

    public function show_users(){
        $users = User::orderBy('created_at','DESC')->Paginate(12);

        return view('admin.report.users',[
            'users' => $users
        ]);
    }

    public function delete_review($id){

        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back();
    }


}
