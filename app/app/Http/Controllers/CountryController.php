<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showCollectionAsResponse(Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Country::class);
        if($request->has('name'))
        {
            $country = Country::create($request->only(['name']));
            return $this->showModelAsResponse($country);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $this->showModelAsResponse($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->authorize('update', Country::class);
        if($request->has('name'))
        {
            $country->update($request->only(['name']));
            return $this->showModelAsResponse($country);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->authorize('destroy', Country::class);
        $country->delete();
        return $this->showModelAsResponse($country);
    }
}
