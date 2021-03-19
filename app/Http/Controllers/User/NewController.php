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
        $metaTitle = 'GMPC Latest News';
        $metaDescription = 'See the GMPC latest news of science, research & GMPC journals, anopen access dynamic international publisher founded in Germany';
        $metaKeywords = '';
        return view('user.news.all', compact('metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function singleNew(Lnew $new)
    {
        return view('user.news.single_new', compact('new'));
    }
}
