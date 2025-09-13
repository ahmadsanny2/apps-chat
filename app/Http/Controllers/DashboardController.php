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
        $search = $request->query("search");
        $data = [
            'rooms' => [],
            'contacts' => [],
        ];

        if ($search) {
            $contacts = $roomService->getContact($search);
            $rooms = $roomService->getRooms();

            $data['rooms'] = $contacts;
            $data['contacts'] = $contacts;
        } else {
            $rooms = $roomService->getRooms();
            $data['rooms'] = $rooms;
        }

        dd($rooms);
        return Inertia::render('Index');
    }
}
