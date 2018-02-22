<?php

namespace App\Http\Controllers;

use App\Report;

use Illuminate\Http\Request;
use Validator;

class ReportController extends Controller
{
    /**
     * Create a new report instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){

        // Validate the request...
        $validator = Validator::make($request->all(), [
            'files_id'        => 'required',
            'user_id'         => 'required',
            'type_id'         => 'required',
            'content'         => 'required',
            'status'          => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $report = new Report;
        $report->files_id = $request->files_id;
        $report->user_id = $request->user_id;
        $report->type_id = $request->type_id;
        $report->content = $request->content;
        $report->status = $request->status;
        if ($report->save()) {
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
      $report = Report::findOrFail($id);
      // Delete from database
      $report->delete();

      return redirect()->back();
    }
}
