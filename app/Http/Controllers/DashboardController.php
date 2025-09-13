<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\RoomService;

class DashboardController extends Controller
{
    //

    public function index(RoomService $roomService, Request $request): Response
    {
        $search= $request->query("search");
        $rooms = $roomService->getRooms();
        $contacts = $roomService->getContact($search);

        dd($rooms);
        return Inertia::render('Index');
    }
}
