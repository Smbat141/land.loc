<?php

namespace App\Http\Controllers;

use App\Page;
use Validator;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Request $request,$id){
        $page = Page::find($id);

        if($request->isMethod('delete')){
            $page->delete();
            return redirect('admin')->with('message','Page deleted');
        }

        if($request->isMethod('post')){

            $input = $request->except('_token');
            $valitador = Validator::make($input,[
                'name' => 'required',
                'alias' => 'required|unique:pages,alias,'.$input['id'],
                'text' => 'required',
            ]);

            if($valitador->fails()){
                return redirect()
                    ->route('pagesEdit',$input['id'])
                    ->withErrors($valitador);
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file->move(public_path('assets\img'),$file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            }

            $page->fill($input);

            if($page->update()){
                return redirect('admin')->with('message','Page updatet');
            }

        }

        $old = $page->toArray();

        $data = [
            'title' => 'Edit Page - '.$old['name'],
            'data' => $old,
        ];
        return view('admin.pages_edit',$data);
    }
}
