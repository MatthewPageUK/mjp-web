<?php

namespace App\Http\Controllers;

use App\Facades\Settings;
use App\Facades\Ui\BulletPoints;
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
            'bulletPoints' => BulletPoints::getAll(),
            'name' => Settings::getValue('homepage_name'),
            'tagline' => Settings::getValue('homepage_tagline'),
            'intro' => Settings::getValue('homepage_intro'),
        ]);
    }
}
