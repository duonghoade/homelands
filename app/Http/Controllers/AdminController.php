<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Article;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdminController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
  }

  public function newSubCategory()
  {
    $categories = Category::all();
    return view('admin.categories.new', compact('categories'));
  }

  public function getSubCategory()
  {
    $subs = SubCategory::where('category_id', \Input::get('cat_id'));
    return \Response::json($subs->get(['id','name']));
  }
  
  public function createSubCategory()
  {
    Category::create([
      'name' => \Input::get('name')
      ]);
    return \Redirect::route('admin');
  }

  public function updateSubCategory($id)
  {
    $sub = Category::find($id);
    $sub->update([
      'name' => \Input::get('name')
      ]);
    return \Redirect::route('categories');
  }

  public function editSubCategory($id)
  {
    $sub = Category::find($id);
    return view('admin.categories.edit', compact('sub'));
  }

  public function deleteSubCategory($id)
  {
    $sub = Category::find($id);
    $sub->delete();
    return \Redirect::back();
  }

  public function newArticleToSubCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    return view('admin.categories.add_Article', compact('sub'));
  }

  public function createArticleToSubCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    $Article = $sub->Articles()->create([
      'name' => \Input::get('name'),
      'thick' => \Input::get('thick'),
      'price' => \Input::get('price'),
      'guarantee' => \Input::get('guarantee'),
      'summary' => \Input::get('summary')
    ]);

    $file = \Input::file('img');
    if ($file) {
      $filename = $Article->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/Articles/', $filename);
      $Article->photos()->create([
        'img' => '/Articles/'.$filename
      ]);
    }
    return \Redirect::route('Articles');
  }

  public function listArticleOfCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    $Articles = $sub->Articles;
    return view('admin.categories.Article', compact('Articles'));
  }

  public function listArticle()
  {
    $articles = Article::all();
    return view('admin.articles.index', compact('articles'));
  }

  public function newArticle()
  {
    $categories = Category::all();
    return view('admin.articles.new', compact('categories'));
  }

  public function createArticle()
  {
    $sub = Category::find(\Input::get('category'));
    $article = $sub->articles()->create([
      'title' => \Input::get('title'),
      'content' => \Input::get('content'),
      'summary' => \Input::get('summary'),
      'meta_keyworks' => \Input::get('meta_keyworks'),
      'meta_description' => \Input::get('meta_description')
    ]);


    $file = \Input::file('img');
    if ($file) {
      $filename = $article->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/articles/', $filename);
      $article->photos()->create([
        'img' => '/articles/'.$filename
      ]);
    }
    return \Redirect::route('articles');
  }

  public function editArticle($id)
  {
    $categories = Category::all();
    $article = Article::find($id);
    $sub = $article->category;
    return view('admin.Articles.edit', compact('article', 'categories', 'sub'));
  }

  public function updateArticle($id)
  {
    $Article = Article::find($id);
    $Article->update([
      'name' => \Input::get('name'),
      'thick' => \Input::get('thick'),
      'price' => \Input::get('price'),
      'guarantee' => \Input::get('guarantee'),
      'summary' => \Input::get('summary'),
      'sub_category_id' => \Input::get('subcategory_id')
    ]);

    $file = \Input::file('img');
    if ($file) {
      $filename = $Article->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/Articles/', $filename);
      $Article->update([
        'img' => '/Articles/'.$filename
      ]);
    }
    return \Redirect::route('Articles');
  }

  public function deleteArticle($id)
  {
    $Article = Article::find($id);
    $Article->delete();
    return \Redirect::back();
  }

  public function newHigh()
  {
    $Articles = Article::all();
    return view('admin.high.new', compact('Articles'));
  }

  public function createHigh()
  {
    $type = \Input::get('type');
    $Article = Article::find(\Input::get('Article_id'));
    $Article->update(['high_id' => $type]);
    return \Redirect::route('index_high');
  }

  public function indexHigh()
  {
    $type = 1;
    $Articles = Article::where('high_id', $type)->get();
    return view('admin.high.index', compact('Articles', 'type'));
  }

  public function indexFavorite()
  { 
    $type = 2;
    $Articles = Article::where('high_id', $type)->get();
    return view('admin.high.index', compact('Articles', 'type'));
  }

  public function indexSmart()
  {
    $type = 3;
    $Articles = Article::where('high_id', $type)->get();
    return view('admin.high.index', compact('Articles', 'type'));
  }

  public function deleteHigh($id)
  {
    $Article = Article::find($id);
    $Article->update(['high_id' => 0]);
    return \Redirect::route('index_high');
  }
}