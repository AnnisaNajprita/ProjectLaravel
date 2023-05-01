<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   function index ()
   {
        return view("Page/index");
   }
   function about()
   {
        return view("Page/about");
   }
   function contact()
   {
        $title = 'This is Contact Page';
        $data =[
            'title' => 'This is Contact Page',
            'contact' => [
                'email' => 'annisanajpritaa@gmail.com',
                'instagram' => '@annisachii_'
            ]
        ];
        return view("Page/contact")->with($data); 
   }
}
