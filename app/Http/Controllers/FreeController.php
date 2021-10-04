<?php

namespace App\Http\Controllers;

use App\Models\ImageFree;
use Illuminate\Http\Request;

class FreeController extends Controller
{
    public function __invoke(){
        $posts = ImageFree::orderBy('id', 'DESC')
            ->limit(6)
            ->paginate(6);

        return view('free', ['posts' => $posts]);
    }
}
