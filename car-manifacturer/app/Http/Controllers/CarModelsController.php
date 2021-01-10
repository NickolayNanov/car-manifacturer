<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModelRequest;
use App\Http\Requests\UpdateModelRequest;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Manufacturer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = CarModel::all();

        foreach ($models as $model)
        {
            $manufacturer = Manufacturer::find($model->manufacturer_id);

            if ($manufacturer != null){
                $model->manufacturer = $manufacturer->name;
            }

        }

        return view('models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('models.create', compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModelRequest $request
     * @return Response
     */
    public function store(StoreModelRequest $request)
    {
        CarModel::create($request->validated());
        return redirect()->route('models.index');
    }

    /**
     * Display the specified resource.
     *
     * @param CarModel $carModel
     * @return Response
     */
    public function show(CarModel $model)
    {
        $manufacturer = Manufacturer::find($model->manufacturer_id);

        if ($manufacturer != null){
            $model->manufacturer = $manufacturer->name;
        }
        return view('models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CarModel $carModel
     * @return Response
     */
    public function edit(CarModel $model)
    {
        $manufacturers = Manufacturer::all();
        return view('models.edit', compact('model',), compact('manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModelRequest $request
     * @param CarModel $carModel
     * @return Response
     */
    public function update(UpdateModelRequest $request, CarModel $model)
    {
        $model->update($request->validated());
        return redirect()->route('models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CarModel $carModel
     * @return Response
     * @throws Exception
     */
    public function destroy(CarModel $model)
    {
        $model->delete();
        return redirect()->route('models.index');
    }
}
