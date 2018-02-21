<?php

namespace App\Http\Controllers;

use App\File;

use Auth;
use Illuminate\Http\Request;
use Storage;
use Validator;

class FileController extends Controller
{
      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function index(Request $request){

        $files   = File::all();

        return view('core.files.index', compact('files'));
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show(Request $request,$id){

        $files  = File::findOrFail($id);

        return view('core.files.show', compact('files'));
      }

      /**
       * Store a new file instance.
       *
       * @param  Request  $request
       * @return Response
       */
      public function store(Request $request){

          // Validate the request...
          $validator = Validator::make($request->all(), [
              'name'        => 'required',
              'description' => 'required',
              'icon'        => 'required|image'
          ]);

          if ($validator->fails()) {
              return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
          }

          // Rename uploaded icon
          $geticonName = time().'.'.$request->icon->getClientOriginalExtension();

          // Storing to storage
          $uploadedIcon = $request->file('icon');
          $icon = $uploadedIcon->storeAs('public/icon', $geticonName);

          $uploadedFile = $request->file('file');
          $path = $uploadedFile->storeAs('public/files/'.$request->category, $uploadedFile->getClientOriginalName());
          $file = File::create([
              'name'        => $request->name ?? $uploadedFile->getClientOriginalName(),
              'description' => $request->description,
              'icon'        => $icon,
              'path'        => $path,
              'category_id' => $request->category,
              'user_id'     => Auth::user()->id

          ]);
          return redirect()
              ->back()
              ->withSuccess(sprintf('File %s has been uploaded.', $file->name));
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy($id){
        $files = File::findOrFail($id);
        // Delete file from file storage
        Storage::delete($files->path);
        // Remove icon from assets
        Storage::delete($files->icon);
        // Delete from database
        $files->delete();

        return redirect()->back();
      }

      /**
      * Download selected item.
      *
      * @return \Illuminate\Http\Response
      */
      public function download($id){

        $files   = File::findOrFail($id);
        $files->increment('count');

        return Storage::download($files->path);
      }
}
