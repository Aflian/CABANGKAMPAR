<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use App\Models\PrestasiKader;
use App\Models\StrukturOrganisasi;

class HomeController extends Controller
{
    public function index(){
        $TotalKader = User::Count();
        $TotalKomisariat = Komisariat::Count();
        $TotalPost = Post::Count();
        $TotalPrestasi = PrestasiKader::Count();
        $GetPost = Post::latest()->take(5)->get();
        $periode = '2025-2026'; // bisa juga dari request
        $struktur = StrukturOrganisasi::all();
        return view('welcome',compact('TotalKader','TotalKomisariat','TotalPost','GetPost','TotalPrestasi','struktur','periode'));
    }


}
