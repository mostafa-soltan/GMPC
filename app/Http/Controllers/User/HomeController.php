<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Journal;
use App\Lnew;
use App\Researchtopic;

class HomeController extends Controller
{
/*** may be use it if i create login and register form for users
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    public function index()
    {
        return view('user.pages.home');
    }

    public function about()
    {

        return view('user.pages.about');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }
}
