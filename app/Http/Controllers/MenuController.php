<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestMenu;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $model = Menu::where('restaurant_id', $request->input('restaurant_id'))->get();
        return response()->json($model);
    }
    public function store(StoreRequestMenu $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'restaurant_id' => 'required',
            ]);
            Menu::create($request->all());
            return response()->json([
                'message' => 'Блюдо - "' . $request->input('name') . '" Добавлено',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }

    }

    public function destroy(int $id)
    {
        try {
            Menu::destroy($id);
            return response()->json([
                'message' => 'Меню удалено'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }
}
