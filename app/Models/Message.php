<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
//    use HasFactory;
    public function show_message(){
        return Message::orderBy('id', 'DESC')
            ->limit(3)
            ->paginate(3);
    }
}
