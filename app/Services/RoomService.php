<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class RoomService
{
    public function getRooms()
    {
        $user = Auth::user();

        return $user->rooms()
            ->with(['members' => function ($query) use ($user) {
                $query->where('user_id', '!=', $user->id);
            }])
            ->get();
    }
}
