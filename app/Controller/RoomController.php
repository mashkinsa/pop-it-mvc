<?php

namespace Controller;

use Model\Building;
use Model\Room;
use Model\RoomType;
use Src\View;
use Src\Request;

class RoomController
{
    public function addRoom(Request $request): string
    {
        $buildings = Building::all();
        $roomTypes = RoomType::all();

        if ($request->method === 'POST') {
            try {
                $room = Room::create([
                    'number' => $request->number,
                    'square' => $request->square,
                    'quantity' => $request->quantity ?? null,
                    'id_building' => $request->id_building,
                    'id_type' => $request->id_type
                ]);

                $message = 'Помещение успешно добавлено!';
            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении помещения: ' . $e->getMessage();
            }
        }

        return new View('site.add_room', [
            'message' => $message ?? '',
            'buildings' => $buildings,
            'roomTypes' => $roomTypes
        ]);
    }
}