<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return view("cars.index", compact(['cars']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cars.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCarRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        // Validation code in Requests/StoreCarRequest.php
        $newData = [
            'code' => $request->code,
            'manufacturer' => $request->manufacturer,
            'model' => $request->model,
            'price' => $request->price
        ];
        Car::create($newData);

        return redirect()->route('cars.index')
            ->with('success', 'Car successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view("cars.show", compact(['car']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view("cars.edit", compact(['car']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCarRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update([
            'code' => $request->code ?? $car->code,
            'manufacturer' => $request->manufacturer ?? $car->manufacturer,
            'model' => $request->model ?? $car->model,
            'price' => $request->price ?? $car->price
        ]);

        return redirect()->route('cars.index')
            ->with('success', $car->manufacturer . " - " . $car->model . ' edited successfully');
    }

    /**
     * Show delete confirmation page.
     *
     * @param \App\Models\Car $cars
     * @return \Illuminate\Http\Response
     */
    public function delete(Car $car)
    {
        return view("cars.delete", compact(['car']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')
            ->with('success', 'Car successfully deleted');
    }
}
