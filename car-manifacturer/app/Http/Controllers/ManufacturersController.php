<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Manufacturer;
use App\Models\Task;
use Exception;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreManufacturerRequest $request
     * @return Response
     */
    public function store(StoreManufacturerRequest $request)
    {
        Manufacturer::create($request->validated());
        return redirect()->route('manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Manufacturer $manufacturer
     * @return Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturers.show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Manufacturer $manufacturer
     * @return Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateManufacturerRequest $request
     * @param Manufacturer $manufacturer
     * @return Response
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->validated());
        return redirect()->route('manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Manufacturer $manufacturer
     * @return Response
     * @throws Exception
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect()->route('manufacturers.index');
    }
}
