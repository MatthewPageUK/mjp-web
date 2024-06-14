<?php

namespace App\Http\Controllers;

use App\Contracts\Settings;
use App\Models\Cv;
// use Spatie\LaravelPdf\Facades\Pdf;

class CvController extends Controller
{
    /**
     * Get the data needed for the CV view
     *
     * @param Cv $cv
     * @param Settings $settings
     * @return array
     */
    public function getData($cv, $settings): array
    {
        return [
            'name' => $settings->tryGetValue('homepage_name', 'Matthew Page'),
            'tagline' => $settings->tryGetValue('homepage_tagline', 'Matthew Page'),
            'phone' => $settings->tryGetValue('contact_telephone', '000000'),
            'linkedin' => 'www.linkedin.com/in/matthew-page-uk/',
            'github' => 'www.github.com/MatthewPageUK',
            'web' => 'www.mjp.co',
            'skills' => $cv->recentSkills,
            'topskills' => $cv->topSkills,
            'work' => $cv->experiences,
            'address' => 'Brundall, Norwich, UK',
            'sections' => $cv->cvSections,
            'demos' => $cv->demos->concat($cv->projects),
        ];
    }

    /**
     * Make the PDF and download it
     *
     * @param Cv $cv
     * @param Settings $settings
     * @return Pdf
     */
    public function make(Cv $cv, Settings $settings)
    {
        abort(404, 'Not implemented');

        // return Pdf::view('cv-pdf', ['data' => $this->getData($cv, $settings)])
        //     ->format('a4')
        //     ->name($cv->filename);
    }

    /**
     * View the PDF as HTML
     *
     * @param Cv $cv
     * @param Settings $settings
     * @return \Illuminate\View\View
     */
    public function view(Cv $cv, Settings $settings)
    {
        return view('cv-pdf', ['data' => $this->getData($cv, $settings)]);
    }
}
