<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // function to display the first page of the product.

    public function index(){
      $products = Product::all();
      //pass the data to the page
      return view('admin.product.index', compact('products'));
    }

  //function to display the add-product page.

  public function add(){

    $category = Category::all();

    return view('admin.product.add',compact('category'));
  }


  //function to insert from the form to the database.

  public function insert(Request $request){

          $products = new Product();
          if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext =$file->getClientoriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/Product/',$filename);
            $products->image = $filename;
          }

            $products->cate_id = $request->input('cate_id');
            $products->name = $request->input('name');
            $products->slug = $request->input('slug');
            $products->small_description = $request->input('small_description');
            $products->description = $request->input('description');
            $products->original_price = $request->input('original_price');
            $products->selling_price = $request->input('selling_price');
            $products->tax = $request->input('tax');
            $products->qty= $request->input('qty');
            $products->status = $request->input('status') == TRUE ? '1':'0';
            $products->trending = $request->input('trending') == TRUE ? '1':'0';
            $products->meta_title = $request->input('meta_title');
            $products->Meta_keywords = $request->input('meta_keywords');
            $products->meta_description = $request->input('meta_description');

            $products->save();
            return redirect('products')->with('status',"product Added successfully");
  }


  //function to return the edit page.

  public function edit($id){

    //collect all the data from the product table.

    $products = Product::find($id);

    return view('admin.product.edit',compact('products'));

  }


  //function to update the product.
  public function update(Request $request,$id){

    $products = Product::find($id);

    if ($request->hasFile('image')) {

      $path ='assets/uploads/product/'.$products->image;
      if (File::exists($path)) {
        File::delete($path);
      }


      $file = $request->file('image');
      $ext =$file->getClientoriginalExtension();
      $filename = time().'.'.$ext;
      $file->move('assets/uploads/Product/',$filename);
      $products->image = $filename;
    }

      $products->name = $request->input('name');
      $products->slug = $request->input('slug');
      $products->small_description = $request->input('small_description');
      $products->description = $request->input('description');
      $products->original_price = $request->input('original_price');
      $products->selling_price = $request->input('selling_price');
      $products->tax = $request->input('tax');
      $products->qty= $request->input('qty');
      $products->status = $request->input('status') == TRUE ? '1':'0';
      $products->trending = $request->input('trending') == TRUE ? '1':'0';
      $products->meta_title = $request->input('meta_title');
      $products->Meta_keywords = $request->input('meta_keywords');
      $products->meta_description = $request->input('meta_description');
      $products->update();
       return redirect('products')->with('status',"product updated successfully");


  }



  //function to delete the product.

  public function destroy($id){

    $products = Product::find($id);

    //check if it has an image.
    if ($products->image) {

      $path ='assets/uploads/product/'.$products->image;
      if (File::exists($path)) {
        //delete it from the path.
        File::delete($path);
      }

    }

    $products->delete();
    return redirect('products')->with('status',"Product Deleted successfully");


  }


}
