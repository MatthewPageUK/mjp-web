<?php

namespace App\Http\Controllers;

use App\Services\{
    PageService,
    SettingService,
};
use App\Contracts\{
    BulletPoints,
};
use Illuminate\{
    Http\Request,
    View\View,
};

class HomepageController extends Controller
{
    /**
     * Show the homepage.
     *
     * @param BulletPoints $bulletPoints
     * @param PageService $page
     * @param Request $request
     * @param SettingService $settings
     * @return View
     */
    public function show(
        BulletPoints        $bulletPoints,
        PageService         $page,
        Request             $request,
        SettingService      $settings,
    ): View
    {
        $page->setTitle($settings->getValue('site_name'));
        $page->appendTitle($settings->getValue('site_tagline'));
        // @todo: Add description to settings
        $page->setDescription('description...');

        $bulletPoints   = $bulletPoints->getAllWithRainbow();
        $name           = $settings->getValue('homepage_name');
        $tagline        = $settings->getValue('homepage_tagline');
        $intro          = $settings->getValue('homepage_intro');

        return view('homepage', compact('bulletPoints', 'name', 'tagline', 'intro'));
    }
}
