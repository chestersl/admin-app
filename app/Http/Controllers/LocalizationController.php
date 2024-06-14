<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * @param Request $request
     * @param $locale
     * @return RedirectResponse
     */
    public function set(Request $request, $locale): \Illuminate\Http\RedirectResponse
    {
        if (!in_array($locale, ['en', 'ua'])) {
            abort(400);
        }
        app()->setLocale($locale);

        session()->put('locale', $locale);
        session()->save();

        return redirect()->back();
    }
}
