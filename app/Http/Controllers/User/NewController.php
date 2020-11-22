<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Journal;
use App\Lnew;
use App\Researchtopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function allNews()
    {
        return view('user.news.all');
    }

    public function singleNew(Lnew $new)
    {
        return view('user.news.single_new', compact('new'));
    }
}
