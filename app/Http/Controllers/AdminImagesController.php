<?php

namespace App\Http\Controllers;

use App\Models\ImageFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminImagesController extends Controller
{
    public function add()
    {
        return view('Admin.add_image');
    }

    public function save(Request $request)
    {
        if (Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'name' => 'required | string | max:30 | min:3',
                    'image' => 'required | image',
                    'url' => 'required | url'
                ]);

                $post = new ImageFree();
                $post->name = $request->input('name');
                $post->url = $request->input('url');

                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('image_free', $imageName);
                    $post->image = 'http://localhost:8888/image_free/' . $imageName;
                }
                $post->save();
                return redirect()->route('admin_image_get');
            }
        } else {
            return redirect()->route('index');
        }

    }

    public function edit($id)
    {
        if (Auth::check()) {
            $post = ImageFree::where('id', '=', $id)->first();

            return view('Admin.edit_image', ['post' => $post]);

        } else {
            return redirect('404');
        }
    }

    public function edit_save(Request $request)
    {
        if (Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'name' => 'required | string | max:30 | min:3',
                    'image' => 'required | image',
                    'url' => 'required | url'
                ]);

                $post = ImageFree::where('id', '=', $request->input('id'))->first();
                $post->name = $request->input('name');
                $post->url = $request->input('url');

                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('image_free', $imageName);
                    $post->image = 'http://localhost:8888/image_free/' . $imageName;
                }
                $post->save();
                return redirect()->route('admin_image_get');
            }
        } else {
            return redirect()->route('index');
        }

    }

    public function delete(Request $request){
        if(Auth::check()){
            if ($request->method() == 'DELETE'){
                $post = ImageFree::find($request->input('id'));
                $post->delete();
                return back();
            }else{
                return view('Admin.admin_image', ['posts'=> ImageFree::orderBy('updated_at', 'DESC')
                    ->limit(6)
                    ->paginate(6)]);
            }
        }else {
            return redirect('404');
        }
    }
}
