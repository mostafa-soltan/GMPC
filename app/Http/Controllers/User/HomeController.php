<?php

namespace App\Http\Controllers\User;

use App\Mail\ContactFormMail;
use App\Models\Article;
use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $metaTitle = 'German Multidisciplinary Publishing Center-GMPC';
        $metaDescription = 'German Multidisciplinary Publishing Center (GMPC) is a dynamic
                            international organization founded in Germany. GMPC is committed to publish high-quality journals';
        $metaKeywords = '';
        return view('user.pages.home', compact('metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function about()
    {
        $metaTitle = 'GMPC About';
        $metaDescription = '';
        $metaKeywords = '';
        return view('user.pages.about', compact('metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function contact()
    {
        $metaTitle = 'GMPC Main Editorial Office';
        $metaDescription = 'GMPC customers can contact us by phone, e-mail or the onlinecontact form. If you need help, Contact the GMPC, Kötztinger Straße, 93057 Regensburg, Germany';
        $metaKeywords = '';
        return view('user.pages.contact', compact('metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function contactStore()
    {
       $data = request()->validate([
           'name' => 'required',
           'email' => 'required|email',
           'subject' => 'required',
           'message' => 'required',
       ]);


       // Send Email
        $email = Mail::to('info@gmpc-akademie.de')->send(new ContactFormMail($data));
        if($email){
            return redirect('/contact-us')->with('Thank you for contacting with us.');
        }else{
            return redirect('/contact-us')->with('Some thing wrong!, Try again');
        }

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
