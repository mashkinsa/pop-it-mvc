<?php

namespace Controller;

use Model\Building;
use Src\View;
use Src\Request;
use Validators\Validator;

class BuildingController
{
    public function addBuilding(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'address' => ['required']
            ], [
                'required' => 'Поле :field обязательно для заполнения'
            ]);

            if ($validator->fails()) {
                return new View('site.add_building', [
                    'message' => $validator->errors(),
                ]);
            }

            try {
                Building::create([
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