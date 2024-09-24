<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\StoreRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $car = Car::create($request->validated());
        return redirect()->route('cars.show', compact('car'))->with('message', 'Сохранено успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
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
        return view('cars.create', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Car $car)
    {
        $car->update($request->validated());
        return redirect()->route('cars.show', compact('car'))->with('message', 'Сохранено успешно');
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
        $existingCar = Car::where('model', $car->model)
            ->whereNull('deleted_at')
            ->exists();

        if ($existingCar) {
            return redirect()->back()->with('message', 'Ошибка: машина с такой моделью уже существует');
        }
        $car->restore();
        return redirect()->route('cars.index')->with('message', 'Машина успешно восстановлена');
    }
}
