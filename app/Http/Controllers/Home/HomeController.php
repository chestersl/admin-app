<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Welcome', [
            'locale' => app()->getLocale(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
