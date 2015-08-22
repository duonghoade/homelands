<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Product;
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
    $category = Category::find(\Input::get('category_id'));
    $category->subs()->create([
      'name' => \Input::get('name'),
      'summary' => \Input::get('summary')
      ]);
    return \Redirect::route('admin');
  }

  public function updateSubCategory($id)
  {
    $sub = SubCategory::find($id);
    $sub->update([
      'category_id' => \Input::get('category_id'),
      'name' => \Input::get('name'),
      'summary' => \Input::get('summary')
      ]);
    return \Redirect::route('categories');
  }

  public function editSubCategory($id)
  {
    $categories = Category::all();
    $sub = SubCategory::find($id);
    return view('admin.categories.edit', compact('sub', 'categories'));
  }

  public function deleteSubCategory($id)
  {
    $sub = SubCategory::find($id);
    $sub->delete();
    return \Redirect::back();
  }

  public function newProductToSubCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    return view('admin.categories.add_product', compact('sub'));
  }

  public function createProductToSubCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    $product = $sub->products()->create([
      'name' => \Input::get('name'),
      'thick' => \Input::get('thick'),
      'price' => \Input::get('price'),
      'guarantee' => \Input::get('guarantee'),
      'summary' => \Input::get('summary')
    ]);

    $file = \Input::file('img');
    if ($file) {
      $filename = $product->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/products/', $filename);
      $product->photos()->create([
        'img' => '/products/'.$filename
      ]);
    }
    return \Redirect::route('products');
  }

  public function listProductOfCategory($sub_id)
  {
    $sub = SubCategory::find($sub_id);
    $products = $sub->products;
    return view('admin.categories.product', compact('products'));
  }

  public function listProduct()
  {
    $products = Product::all();
    return view('admin.products.index', compact('products'));
  }

  public function newProduct()
  {
    $categories = Category::all();
    return view('admin.products.new', compact('categories'));
  }

  public function createProduct()
  {
    $sub = SubCategory::find(\Input::get('subcategory_id'));
    $product = $sub->products()->create([
      'name' => \Input::get('name'),
      'thick' => \Input::get('thick'),
      'price' => \Input::get('price'),
      'guarantee' => \Input::get('guarantee'),
      'summary' => \Input::get('summary')
    ]);

    $file = \Input::file('img');
    if ($file) {
      $filename = $product->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/products/', $filename);
      $product->photos()->create([
        'img' => '/products/'.$filename
      ]);
    }
    return \Redirect::route('products');
  }

  public function editProduct($id)
  {
    $categories = Category::all();
    $product = Product::find($id);
    $sub = $product->sub_category;
    return view('admin.products.edit', compact('product', 'categories', 'sub'));
  }

  public function updateProduct($id)
  {
    $product = Product::find($id);
    $product->update([
      'name' => \Input::get('name'),
      'thick' => \Input::get('thick'),
      'price' => \Input::get('price'),
      'guarantee' => \Input::get('guarantee'),
      'summary' => \Input::get('summary'),
      'sub_category_id' => \Input::get('subcategory_id')
    ]);

    $file = \Input::file('img');
    if ($file) {
      $filename = $product->id.".".$file->getClientOriginalExtension();
      $file->move(public_path().'/products/', $filename);
      $product->update([
        'img' => '/products/'.$filename
      ]);
    }
    return \Redirect::route('products');
  }

  public function deleteProduct($id)
  {
    $product = Product::find($id);
    $product->delete();
    return \Redirect::back();
  }

  public function newHigh()
  {
    $products = Product::all();
    return view('admin.high.new', compact('products'));
  }

  public function createHigh()
  {
    $type = \Input::get('type');
    $product = Product::find(\Input::get('product_id'));
    $product->update(['hight_id' => $type]);
    return \Redirect::route('index_high');
  }

  public function indexHigh()
  {
    $type = 1;
    $products = Product::where('hight_id', $type)->get();
    return view('admin.high.index', compact('products', 'type'));
  }

  public function indexFavorite()
  { 
    $type = 2;
    $products = Product::where('hight_id', $type)->get();
    return view('admin.high.index', compact('products', 'type'));
  }

  public function indexSmart()
  {
    $type = 3;
    $products = Product::where('hight_id', $type)->get();
    return view('admin.high.index', compact('products', 'type'));
  }

  public function deleteHigh($id)
  {
    $product = Product::find($id);
    $product->update(['hight_id' => 0]);
    return \Redirect::route('index_high');
  }
}