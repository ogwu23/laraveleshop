<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
  // function to show the category page.
    public function index(){


      // added to retrieve or fetch the data from the Database.
      $category = Category::all();

      return view('admin.category.index',compact('category'));


    }

    //function to show add.blade.php page  in the category.

    public function add(){

      return view('admin.category.add');

    }

    //function to insert from the form to the database.

    public function insert(Request $request){

            $category = new Category();
            if ($request->hasFile('image')) {

              $file = $request->file('image');
              $ext =$file->getClientoriginalExtension();
              $filename = time().'.'.$ext;
              $file->move('assets/uploads/category/',$filename);
              $category->image = $filename;
            }

              $category->name = $request->input('name');
              $category->slug = $request->input('slug');
              $category->description = $request->input('description');
              $category->status = $request->input('status') == TRUE ? '1':'0';
              $category->popular = $request->input('popular') == TRUE ? '1':'0';
              $category->meta_title = $request->input('meta_title');
              $category->Meta_descrip = $request->input('Meta_descrip');
              $category->Meta_keywords = $request->input('Meta_keywords');
              $category->save();
              return redirect('/dashboard')->with('status',"category Added successfully");
    }


     //function to show the edit page and pass it values.

     public function edit($id){

       $category = Category::find($id);


       return view('admin.category.edit',compact('category'));


     }

     //function to do the main edit/update in the form.

     public function update(Request $request, $id){

         $category = Category::find($id);
         if ($request->hasFile('image')) {

           $path ='assets/uploads/category/'.$category->image;
           if (File::exists($path)) {
             File::delete($path);
           }

           $file = $request->file('image');
           $ext =$file->getClientoriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('assets/uploads/category/',$filename);
           $category->image = $filename;

         }

         $category->name = $request->input('name');
         $category->slug = $request->input('slug');
         $category->description = $request->input('description');
         $category->status = $request->input('status') == TRUE ? '1':'0';
         $category->popular = $request->input('popular') == TRUE ? '1':'0';
         $category->meta_title = $request->input('meta_title');
         $category->Meta_descrip = $request->input('Meta_descrip');
         $category->Meta_keywords = $request->input('Meta_keywords');
         $category->update();
         return redirect('dashboard')->with('status',"category updated successfully");

     }


     //function to delete the category.

     public function destroy($id){

       $category = Category::find($id);

       //check if it has an image.
       if ($category->image) {

         $path ='assets/uploads/category/'.$category->image;
         if (File::exists($path)) {
           //delete it from the path.
           File::delete($path);
         }

       }

       $category->delete();
       return redirect('categories')->with('status',"category Deleted successfully");


     }


}
