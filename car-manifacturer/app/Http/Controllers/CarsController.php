<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\CarModel;
use App\Models\Manufacturer;
use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::all();

        foreach ($cars as $car) {
            $model = CarModel::find($car->car_model_id);

            $car->model = $model->name;
            $car->manufacturer = Manufacturer::find($model->manufacturer_id)->name;
        }

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $models = CarModel::all();
        return  view('cars.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCarRequest $request
     * @return Response
     */
    public function store(StoreCarRequest $request)
    {
        Car::create($request->validated());
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Car $car)
    {
        $model = CarModel::find($car->car_model_id);
        $manufacturer = Manufacturer::find($model->manufacturer_id);

        $car->model = $model->name;
        $car->manufacturer = $manufacturer->name;

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return Response
     */
    public function edit(Car $car)
    {
        $models = CarModel::all();
        return view('cars.edit', compact('car'), compact('models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCarRequest $request
     * @param Car $car
     * @return Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return Response
     * @throws \Exception
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
