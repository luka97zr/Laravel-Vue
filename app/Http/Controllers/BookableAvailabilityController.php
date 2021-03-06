<?php

namespace App\Http\Controllers;

use App\Models\Bookable;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $data = $request->validate([
            'from'  => ['required','date_format:Y-m-d','after_or_equal:now'],
            'to'    => ['required','date_format:Y-m-d','after_or_equal:from']
        ]);
        
        $bookable = Bookable::findOrFail($id);
        return $bookable->availableFor($data['from'],$data['to'])? response()->json(200) : response()->json(404);
    }
}
