<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Review;
use PDF;
use DB;
use App\Models\Category;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function about_us()
    {

        $categories = Category::orderBy('id','asc')->take(6)->get();


        return view ('client.about',[
            'categories' => $categories
        ]);

    }

    public function create_contact()
    {

        $categories = Category::orderBy('id','asc')->take(6)->get();


        return view ('client.contact',[
            'categories' => $categories

        ]);

    }

    public function store_contact(Request $request){
        $contact = new Contact();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->contact = $request->input('contact');



        $contact->save();


        return back()->with('success','Details submitted successfully. We shall get back to You.');

    }

    public function create_review()
    {

        return view ('client.contact');

    }

    public function show_reviews(){

    }

    public function store_review(Request $request){
        $review = new Review();

        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');
        $review->user_id = $request->input('user_id');
        $review->product_id = $request->input('product_id');



        $review->save();


        return back()->with('success','Thanks For your Review');

    }




    public function pdfview1()

    {

        // $items = DB::table("items")->get();

        // view()->share('items',$items);



            $pdf = PDF::loadView('pdfview');

            return $pdf->download('pdf_view.pdf');


        return view('pdfview');

    }
}
