<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class RoomService
{
    private function createResponse($user, $room)
    {
        $otherUser = $room->members->first();
        $lastMessage = $room->lastMessage;

        $returnLastMessage = [];
        if ($lastMessage) {
            $returnLastMessage = [
                'id' => $lastMessage->id,
                'type' => $lastMessage->type,
                'message' => $lastMessage->message,
                'created_at' => $lastMessage->created_at->toDateTimeString,
            ];
        }

        if ($room->type == "private") {

            return [
                'id' => $room->id,
                'type' => $room->type,
                'name' => $otherUser->name,
                'avatar' => $otherUser->avatar,
                'lastMessage' => $returnLastMessage,
            ];
        } else if ($room->type == 'group') {
            return [
                'id' => $room->id,
                'type' => $room->type,
                'name' => $room->name,
                'avatar' => null,
                'lastMessage' => $returnLastMessage
            ];
        }
    }
    public function getRooms(string $search = null)
    {
        $user = Auth::user();

        $query = $user->rooms()
            ->with(['members' => function ($query) use ($user) {
                $query->where('user_id', '!=', $user->id);
            }]);

        if ($search) {
            $query->where(function ($q) use ($user, $search) {
                $q->where(function ($sub) use ($user, $search) {
                    $sub->where('type', 'private')
                        ->whereHas('members', function ($memberQuery) use ($user, $search) {
                            $memberQuery->where('user_id', '!=', $user->id)
                                ->where('name', 'like', '%' . $search . '%');
                        });
                })->orWhere(function ($sub) use ($user, $search) {
                    $sub->where('type', 'group')
                        ->where('name', 'like', '%' . $search . '%');
                });
            });
        }
        return $query->get()->map(function ($room) use ($user) {
            return $this->createResponse($user, $room);
        });
    }
}
