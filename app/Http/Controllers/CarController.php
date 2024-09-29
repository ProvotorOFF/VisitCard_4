<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\StoreRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('brand')->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('cars.create', compact('transmissions', 'brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $car = Car::create($request->validated());
        $car->tags()->sync($request->tags ?? []);
        return redirect()->route('cars.show', compact('car'))->with('message', trans('cars.actions.saved'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $transmissions = config('app-cars.transmissions');
        return view('cars.show', compact('car', 'transmissions'));
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('cars.trashed', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('cars.create', compact('car', 'brands', 'transmissions', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Car $car)
    {
        $car->update($request->validated());
        $car->tags()->sync($request->tags ?? []);
        return redirect()->route('cars.show', compact('car'))->with('message', trans('cars.actions.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function restore(int $car)
    {
        $car = Car::onlyTrashed()->findOrFail($car);
        $existingCar = Car::where('vin', $car->vin)
            ->whereNull('deleted_at')
            ->exists();

        if ($existingCar) {
            return redirect()->back()->with('message', trans('cars.errors.vin', ['vin' => $car->vin]));
        }
        $car->restore();
        return redirect()->route('cars.index')->with('message', trans('cars.actions.restored'));
    }
}
