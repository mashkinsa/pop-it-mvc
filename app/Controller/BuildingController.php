<?php

namespace Controller;

use Model\Building;
use Src\View;
use Src\Request;

class BuildingController
{
    public function addBuilding(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                $building = Building::create([
                    'name' => $request->name,
                    'address' => $request->address
                ]);

                $message = 'Здание успешно добавлено!';
            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении здания: ' . $e->getMessage();
            }
        }

        return new View('site.add_building', ['message' => $message ?? '']);
    }
}