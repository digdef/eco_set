<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ourWorks;
use App\Models\CeoText;

class OurWorksController extends Controller
{
    const WORKS_DESCRIPTION_TEMPLATE = 'Наши работы - {DB_DESCRIPTION}. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации';
    public function index()
    {
        $ourWorks = ourWorks::all();

        $seo = CeoText::where('type', '=', 'ourWorks')->first();

        return view('page.ourWorks.ourWorks', compact('ourWorks', 'seo'));
    }

    public function ourWork($id)
    {
        $ourWork = ourWorks::find($id);

        if (!$ourWork) {
            return view('404');
        }
        $seo = new CeoText();
        $seo->meta_title = $ourWork->title;
        $seo->meta_description = $this->getTemplatedString(
            $ourWork->title,
            self::WORKS_DESCRIPTION_TEMPLATE,
            '{DB_DESCRIPTION}'
        );
        return view('page.ourWorks.ourWork', compact('ourWork', 'seo'));
    }
}
