<?php

namespace App\Http\Controllers;

use App\ReportType;

use Illuminate\Http\Request;
use Validator;

class ReportTypeController extends Controller
{
  /**
   * Create a new report type.
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

      $reporttype = new ReportType;
      $reporttype->name = $request->name;
      $reporttype->description = $request->description;
      if ($reporttype->save()) {
        return redirect()->back();
      }
  }
  /**
  * Remove from database.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id){
    $reporttype = ReportType::findOrFail($id);
    $reporttype->delete();

    return redirect()->back();
  }
}
