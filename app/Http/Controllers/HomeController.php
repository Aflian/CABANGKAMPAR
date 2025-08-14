<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Komisariat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $TotalKader = User::Count();
        $TotalKomisariat = Komisariat::Count();
        $TotalPost = Post::Count();
        return view('welcome',compact('TotalKader','TotalKomisariat','TotalPost'));
    }
}
