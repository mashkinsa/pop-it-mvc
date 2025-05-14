<?php

namespace Controller;

use Model\Building;
use Model\Room;
use Model\RoomType;
use Src\View;
use Src\Request;

class ReportController
{
    public function areaReport(Request $request): string
    {
        $buildings = Building::all();
        $selectedBuilding = $request->get('building', '');

        $rooms = Room::with(['building', 'type'])
            ->when($selectedBuilding, function($query) use ($selectedBuilding) {
                return $query->whereHas('building', function($q) use ($selectedBuilding) {
                    $q->where('id_building', $selectedBuilding);
                });
            })
            ->get();

        return new View('site.area', [
            'buildings' => $buildings,
            'rooms' => $rooms,
            'selectedBuilding' => $selectedBuilding
        ]);
    }

    public function seatsReport(Request $request): string
    {
        $buildings = Building::all();
        $selectedBuilding = $request->get('building', '');

        $rooms = Room::with(['building', 'type'])
            ->when($selectedBuilding, function($query) use ($selectedBuilding) {
                return $query->whereHas('building', function($q) use ($selectedBuilding) {
                    $q->where('id_building', $selectedBuilding);
                });
            })
            ->get();

        return new View('site.seats', [
            'buildings' => $buildings,
            'rooms' => $rooms,
            'selectedBuilding' => $selectedBuilding
        ]);
    }

    public function choiceReport(Request $request): string
    {
        $roomTypes = RoomType::all();
        $selectedType = $request->get('room_type', '');

        $rooms = Room::with(['building', 'type'])
            ->when($selectedType, function($query) use ($selectedType) {
                return $query->whereHas('type', function($q) use ($selectedType) {
                    $q->where('name', $selectedType);
                });
            })
            ->orderBy('number')
            ->get();

        return new View('site.choice', [
            'roomTypes' => $roomTypes,
            'rooms' => $rooms,
            'selectedType' => $selectedType
        ]);
    }
}