<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
      /**
       * Create a new category instance.
       *
       * @param  Request  $request
       * @return Response
       */
      public function store(Request $request){

          // Validate the request...
          $validator = Validator::make($request->all(), [
              'name'        => 'required',
              'description' => 'required',
          ]);

          if ($validator->fails()) {
              return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
          }

          $category = new Category;
          $category->name = $request->name;
          $category->description = $request->description;
          if ($category->save()) {
            return redirect()->back();
          }
      }
      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy($id){
        $category = Category::findOrFail($id);
        // Delete from database
        $category->delete();

        return redirect()->back();
      }
}
