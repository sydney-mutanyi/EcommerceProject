<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use PDF;

class ReportController extends Controller
{
    public function client_account(){
        $categories = Category::orderBy('id','asc')->take(6)->get();

        return view('account.home',[
            'categories' => $categories
        ]);
    }


    public function client_orders(){
        $client_orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->Paginate(5);

        $categories = Category::orderBy('id','asc')->take(6)->get();


        return view('account.orders',[
            'client_orders' => $client_orders,
            'categories' => $categories
        ]);
    }

    public function show_client_order ($id){
        $categories = Category::orderBy('id','asc')->take(6)->get();

        $client_order = Order::findorFail($id);

        // dd($client_order->OrderItem);

        return view('account.order_item',[
            'client_order' => $client_order,
            'categories' => $categories

        ]);

    }

    public function pdfreport($id){

        $client_order = Order::findorFail($id)->toArray();

        // view()->share('order',$client_order);
        // $pdf = PDF::loadView('account.pdforder',$client_order);

        // return $pdf->download('order_report.pdf');

         return view('account.pdforder',['order'=> $client_order]);
        
    }
}
