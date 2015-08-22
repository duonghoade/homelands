<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Contact;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HomeController extends Controller
{
  public function index()
  {
    $special = Product::where('hight_id', 1)->get();
    $favorites = Product::where('hight_id', 2)->Get();
    $smarts = Product::where('hight_id', 3)->Get();
  	$categories = Category::all();
    $subs = Category::where('type', 1)->get();
    $products = Product::all();
    return view('home', compact('subs', 'products', 'categories', 'special', 'favorites', 'smarts'));
  }

  public function show($id, $title)
  {
    $categories = Category::all();
    $product = Product::find($id);
    return view('show', compact('categories', 'product'));
  }

  public function show_category($id,$title)
  {
  	$categories = Category::all();
    $sub = SubCategory::find($id);
    return view('show_category', compact('sub', 'categories'));
  }
   public function contact() {
     $categories = Category::all();
     return view('contact', compact('categories'));
   }

   public function createContact() {
     Contact::create([
       'name' => \Input::get('name'),
       'email' => \Input::get('email'),
       'phone' => \Input::get('phone'),
       'content' => \Input::get('content')
       ]);
    $title = "Bạn đã gửi liên hệ thành công, chúng tôi sẽ liên lạc trong thời gian sớm nhất";
    return \Redirect::route('contact', compact('title'));
   }
}
