<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Article;
use App\Contact;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HomeController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    $articles = Article::orderBy('created_at', 'DESC')->get();
    return view('home', compact('articles', 'categories'));
  }

  public function show($id, $title)
  {
    $article = Article::find($id);
    $current = $article->category;
    $categories = Category::where("id", "!=", $current->id)->get();
    return view('show', compact('categories', 'article', 'current'));
  }

  public function show_category($id,$title)
  {
  	$categories = Category::all();
    $sub = Category::find($id);
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
