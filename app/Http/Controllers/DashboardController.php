<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\RoomService;

class DashboardController extends Controller
{
    //

    public function index(RoomService $roomService): Response
    {
        $rooms = $roomService->getRooms();

        dd($rooms);
        return Inertia::render('Index');
    }
}
