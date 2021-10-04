<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ImageFree;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimplePageController extends Controller
{
    public function index(){
        $posts = ImageFree::orderBy('id', 'DESC')
            ->limit(6)
            ->get();

        return view('index', ['posts' => $posts]);
    }
    public function about(){
        return view('about');
    }
    public function individuelle(){
        return view('individuelle');
    }
    public function save_message(Request $request){
            if ($request->method() == 'POST'){
                $this->validate($request, [
                    'name' => 'required | string | max:30 | min:3',
                    'email' => 'required | email',
                    'message' => 'required | string'
                ]);
                $message =  new Message();
                $message->name = $request->input('name');
                $message->email = $request->input('email');
                $message->message = $request->input('message');

                $message->save();
                return redirect()->route('form');
            }
    }


}
