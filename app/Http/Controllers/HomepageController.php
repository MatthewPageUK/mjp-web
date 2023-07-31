<?php

namespace App\Http\Controllers;

use App\Facades\BulletPoints;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    /**
     * Show the homepage
     *
     * @return View
     */
    public function show(Request $request): View
    {
        return view('welcome', [
            'bulletPoints' => BulletPoints::getAllWithColour(),
        ]);
    }
}
