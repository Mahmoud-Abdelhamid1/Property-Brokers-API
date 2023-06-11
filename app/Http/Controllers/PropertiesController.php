<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storePropertyRequest $request)
    {
        $property = Property::create([
            'broker_id' => $request->broker_id,
            'address' => $request->address,
            'listing_type' => $request->listing_type,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'build_year' => $request->build_year,
        ]);
        $property->charactristic->create([
            'property_id' => $request->property_id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status,
        ]);

        return new PropertiesResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertiesResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->only([
            'address' , 'listing_type', 'city' , 'zip_code', 'description', 'build_year'
        ]));

        $property->charactristic->where('property_id' , $property->id)->update($request->only([
            'price' , 'bedrooms', 'bathrooms', 'sqft' , 'price_sqft' , 'property_type' , 'status',
        ]));
        return new PropertiesResource($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
       $property->delete();

       return response()->json([
        'success' => true ,
        'message' => 'The Property Deleted successfully from Database'
       ]);
    }
}