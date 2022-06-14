<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $collection = 'cars';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'manufacturer',
        'model',
        'price'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];



    /**
     * Returns all collectors that own the given car model
     *
     * @param \App\Models\Car $car
     * @return array
     */

    public function find_collectors()
    {
        # Get all the collectors and create an array
        $collectors = Collector::all();
        $collectors_with_car = [];

        # Go through each collector
        foreach ($collectors as $collector)
        {
            # Go through all of their cards
            foreach ($collector->cars as $collector_car)
            {
                # If one of their cars is equal to the car we're checking for
                if($collector_car == $this->code){
                    # Add the collect to the list
                    array_push($collectors_with_car, $collector->given_name . " " . $collector->family_name);
                }
            }
        }

        # Return all collectors with the car
        return $collectors_with_car;
    }
}
