<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;
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
