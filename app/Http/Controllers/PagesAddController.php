<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Validator;

class PagesAddController extends Controller{
    public function execute(Request $request){
        if($request->isMethod('post')){
            $input = $request->except('_token');
            //dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'alias' => 'required|unique:pages',
                'text' => 'required',
                'images' => 'required|file',
            ]);

            if($validator->fails()){
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path('assets\img'),$input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if($page->save()){
                return redirect('admin')->with('message','The new page is crated');
            }
        }



        $data = [
            'title'=>'Edit New Page'
        ];

        return view('admin.pages_add',$data);
    }
}

