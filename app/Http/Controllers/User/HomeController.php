<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;
use App\Models\Volume;

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

    public function privacy()
    {
        return view('user.pages.privacy');
    }

    public function openAccess()
    {
        return view('user.pages.openaccess');
    }
}
