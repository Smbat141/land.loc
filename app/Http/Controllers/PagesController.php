<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Collective\Html;
use Collective\Form;

class PagesController extends Controller{
    public function execute(){
        $page = Page::all();

        $data = [
            'title' => 'Pages',
            'pages' => $page,
        ];


        return view('admin.pages',$data);
    }
}
