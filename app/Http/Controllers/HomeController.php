<?php

namespace App\Http\Controllers;

use App\Cat\CatService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $reques, CatService $catService)
    {
        if ($reques->has('action')) {
            $img = $catService->getCat();
            return view('welcome', compact('img'));
        }

        return view('welcome');
    }
}
