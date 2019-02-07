<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;
use DB;
use Mail;

class IndexController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('post')){

            $messages = [
              'required' => 'Поле :attribute обязателен',
            ];

            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'text' => 'required',
            ],$messages);

            $data = $request->all();

            $result = Mail::send('site.email',['data'=>$data],function ($message) use($data){
                $mail_admin = env('MAIL_USERNAME');
                $message->to($mail_admin)->subject('Question');
                $message->from($data['email'],$data['name']);
            });
            if(Mail::failures()){
                return redirect()->route('home')->with('message','Email not send');
            }
            return redirect()->route('home')->with('message','Email  send');

        }


        $pages = Page::all();
        $peoples = People::all();
        $services = Service::all();
        $portfolios = Portfolio::all();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        //dd($tags);
        $menu = [];
        foreach ($pages as $page){
            $item = ['title' => $page->name,'alias' => $page->alias];
            array_push($menu,$item);
        }
        //dd($menu);

        $item = ['title' => 'Services','alias' => 'service'];
        array_push($menu,$item);

        $item = ['title' => 'Portfolio','alias' => 'portfolio'];
        array_push($menu,$item);

        $item = ['title' => 'Team','alias' => 'team'];
        array_push($menu,$item);

        $item = ['title' => 'Contact','alias' => 'contact'];
        array_push($menu,$item);

        return view('layouts.index',[
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags,
        ]);
    }
}
