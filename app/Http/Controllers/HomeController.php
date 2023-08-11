<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // return redirect()->route('homepage');
    //     return view('home');
    // }

    public function getLogout()
    {
        // Session::flush();
       Auth::logout();

       // $this->auth->logout();
       return redirect()->route('login');

    }

    public function index()
    {
        $latest_products = Product::orderBy('id', 'DESC')->take(12)->get();
        $categories = Category::orderBy('id','asc')->take(6)->get();
        return view('client.home',
        ['latest_products'=>$latest_products,'categories'=> $categories]
    );
}
}
