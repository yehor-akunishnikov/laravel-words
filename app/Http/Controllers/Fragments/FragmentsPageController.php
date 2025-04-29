<?php

namespace App\Http\Controllers\Fragments;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class FragmentsPageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("Fragments/Index");
    }
}
