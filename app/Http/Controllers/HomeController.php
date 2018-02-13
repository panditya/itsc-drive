<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\File;
use App\Report;
use App\User;

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

        $this->data['categories'] = Category::all();
        $this->data['files'] = File::all();
        $this->data['files_dl_count'] = File::sum('count');
        $this->data['reports'] = Report::all();
        $this->data['users'] = User::all();
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['category'] = Category::select('id', 'name')->get();
        if (Auth::user()->role == 1) {
          return view('core.dashboard', $this->data);
        }
        else {
          return redirect('/');;
        }
    }
}
