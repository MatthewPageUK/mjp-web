<?php

namespace App\Http\Controllers;

use App\Services\{
    PageService,
    SettingService,
    Ui\BulletPointService,
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
     * @param BulletPointService $bulletPointService
     * @param PageService $page
     * @param Request $request
     * @param SettingService $settings
     * @return View
     */
    public function show(
        BulletPointService  $bulletPointService,
        PageService         $page,
        Request             $request,
        SettingService      $settings,
    ): View
    {
        $page->setTitle($settings->getValue('site_name'));
        $page->appendTitle($settings->getValue('site_tagline'));
        // @todo: Add description to settings
        $page->setDescription('description...');

        $bulletPoints   = $bulletPointService->getAll();
        $name           = $settings->getValue('homepage_name');
        $tagline        = $settings->getValue('homepage_tagline');
        $intro          = $settings->getValue('homepage_intro');

        return view('homepage', compact('bulletPoints', 'name', 'tagline', 'intro'));
    }
}
