<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\Menu\MenuResources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name . ":" . $this->description,
           // 'chars' => $this->chars,
            'place_count' => $this->chars['placed'],
            'deposit' => $this->chars['deposit'],
            'schedule' => $this->schedule(),
            'menu' => new MenuResources($this->menu)
        ];
    }

    protected function schedule()
    {
        //1 - определяем текущее время сервера
        //2 - сровнить время с росписанием
        //3 - после сровнение выдать нужный результад
        $test = Carbon::now();
        $currentTime = Carbon::now()->timestamp;
        $result = '';
        foreach ($this->chars['schedule'] as $char) {
            $charTime = explode(':', $char);
            $temp = Carbon::create(
                $test->year, $test->month, $test->day, (int) $charTime
            )->timestamp;
            if ($currentTime > $temp) {
                $result = 'закрыто';
            } else {
                $result = 'открыто';
            }
        }
        return $result;

        //return $this->chars['schedule'];
    }

}

