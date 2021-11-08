<?php

namespace App\Services\v1;

use App\Flight;

class FlightService{
    public function getFlights(){
        return Flight::all();
        // return $this->filterFlights(Flight::all()); 
    }

    protected function filterFlights($flights){
        $data = [];
        foreach ($flights as $flight){
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                'href' => route('flights.show', ['id' => $flight->flightNumber])
            ];
            $data[] = $entry;
        }
        return $data;
    }
}

