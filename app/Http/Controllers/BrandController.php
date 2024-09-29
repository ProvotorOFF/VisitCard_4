<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brands\StoreRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        return redirect()->route('brands.show', compact('brand'))->with('message', trans('brands.actions.saved'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.create', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return redirect()->route('brands.show', compact('brand'))->with('message', trans('brands.actions.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
