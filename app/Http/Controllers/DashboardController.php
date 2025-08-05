<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    //

    public function index(): Response
    {
        return Inertia::render("Index");
    }
}
