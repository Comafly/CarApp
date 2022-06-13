<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Models\Car;
use App\Models\Collector;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectors = Collector::paginate(10);
        return view("collectors.index", compact(['collectors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view("collectors.create", compact(['cars']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCollectorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectorRequest $request)
    {
        // Validation code in Requests/StoreCollectorRequest.php
        $newData = [
            "given_name" => $request->given_name,
            "family_name" => $request->family_name,
            "cars" => $request->cars ?? [],
        ];
        Collector::create($newData);

        return redirect()->route('collectors.index')
            ->with('success', 'Collector successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Collector $collectors
     * @return \Illuminate\Http\Response
     */
    public function show(Collector $collector)
    {
        return view("collectors.show", compact(['collector']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Collector $collectors
     * @return \Illuminate\Http\Response
     */
    public function edit(Collector $collector)
    {
        return view("collectors.edit", compact(['collector']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCollectorRequest $request
     * @param \App\Models\Collector $collectors
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectorRequest $request, Collector $collector)
    {
        // Validation code in Requests/StoreCollectorRequest.php

        $collector->update([
            "given_name" => $request->given_name ?? $collector->given_name,
            "family_name" => $request->family_name ?? $collector->family_name,
            "cars" => $request->cars ?? [],
        ]);

        /*  Use the above or the statements below to do the updates:
            $collector->given_name = $request->given_name ?? $collector->given_name;
            $collector->family_name = $request->family_name ?? $collector->family_name;
            $collector->cars = $request->cars ?? [];
            $collector->save();
         */

        return redirect()->route('collectors.index')
            ->with('success', 'Collector successfully updated');
    }

    /**
     * Show delete confirmation page.
     *
     * @param \App\Models\Collector $collectors
     * @return \Illuminate\Http\Response
     */
    public function delete(Collector $collector)
    {
        return view("collectors.delete", compact(['collector']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Collector $collectors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collector $collector)
    {
        $collector->delete();
        return redirect()->route('collectors.index')
            ->with('success', 'Collector successfully deleted');
    }
}
