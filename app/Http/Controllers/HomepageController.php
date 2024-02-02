<?php

namespace App\Http\Controllers;

use App\Services\{
    PageService,
};
use App\Contracts\{
    BulletPoints,
    Homepage,
    Settings,
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
     * @param Homepage $homepage
     * @param PageService $page
     * @param Request $request
     * @param Settings $settings
     * @return View
     */
    public function show(
        BulletPoints        $bulletPoints,
        Homepage            $homepage,
        PageService         $page,
        Request             $request,
        Settings            $settings,
    ): View
    {
        $page->setTitle($settings->getValue('site_name'));
        $page->appendTitle($settings->getValue('site_tagline'));
        // @todo: Add description to settings
        $page->setDescription('description...');

        $bulletPoints   = $bulletPoints->getAllWithRainbow();

        $name           = $homepage->getName();
        $tagline        = $homepage->getTagline();
        $intro          = $homepage->getIntroduction();

        return view('homepage', compact('bulletPoints', 'name', 'tagline', 'intro'));
    }
}
