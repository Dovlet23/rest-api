<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestRestaurant;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Resources\Restaurant\RestauratResources;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $model = Restaurant::get();//получаем общий список ресторанов
        return response()->json(//возврощяем по шаблону HTTP ответам и в формате  json
            new RestauratResources($model) //здесь мы вызываем new RR-глобальная настройка выдачи результатов
        );
    }

    public function store(StoreRequestRestaurant $request)
    {
        Restaurant::create($request->all());
        return response()->json('Ресторан создан');
    }

    public function show(int$id)
    {
        try {
            $model = Restaurant::find($id);
            return response()->json(
                new RestaurantResource($model)
            );
        } catch (\Exception $exception) {
            return response()->json([
               'message' => $exception->getMessage()
            ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            Restaurant::destroy($id);
            return response()->json([
                'message' => 'Ресторан удален'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }
}
