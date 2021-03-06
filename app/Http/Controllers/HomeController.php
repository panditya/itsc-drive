<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\File;
use App\Report;
use App\ReportType;
use App\User;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->data['categories'] = Category::with('file')->get();
        $this->data['files'] = File::all();
        $this->data['report_types'] = ReportType::all();
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['new_ul_files'] = File::orderBy('created_at', 'desc')->limit(3)->get();
        $this->data['most_dl_files'] = File::orderBy('count', 'desc')->limit(3)->get();

        return view('home', $this->data);
    }

    /**
     * Show the detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function file($id)
    {
        $this->data['file'] = File::findOrFail($id);
        return view('file', $this->data);
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $myprofile = Auth::user();
        return view('core.users.profile', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['users'] = User::all();
        $this->data['reports'] = Report::orderBy('created_at', 'desc')->get();
        $this->data['category'] = Category::select('id', 'name')->get();
        $this->data['files_dl_count'] = DB::table('files')->where('deleted_at', null)->sum('count');
        if (Auth::user()->role == 1) {
          return view('core.dashboard', $this->data);
        }
        else {
          return redirect('/');;
        }
    }
}
