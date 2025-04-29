<?php

namespace App\Http\Controllers\Words;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class WordsPageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("Words/Index");
    }
}
