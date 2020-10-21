<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function saveEventDetails(Request $request)
    {
        $data = (json_decode($request->getContent(), true));
        $rules = [
            'name' => 'required|max: 50',
            'from' => 'required',
            'to'   => 'required',
            'day.*' => 'required'
        ];
        $validatedData = Validator::make($data, $rules);

        if($validatedData->passes()) {
            $uid = rand(10,1000);

            Events::create([
                'event_name' => $data['name'],
                'event_from' => $data['from'],
                'event_to' => $data['to'],
                'selected_days' => $data['day'],
                'uid' => $uid,
            ]);

            foreach($data['day'] as $value) {
                Days::create([
                    'uid' => $uid,
                    'days' => $value,
                ]);
            }
        }

        $result = array(
            'passes' => $validatedData->passes(),
            'errors' => $validatedData->errors(),
        );

        return json_encode($result);
    }
}
