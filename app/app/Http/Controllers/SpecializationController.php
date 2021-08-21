<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SpecializationController extends Controller
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
        return $this->showCollectionAsResponse(Specialization::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Specialization::class);
        if($request->has('name'))
        {
            $specialization = Specialization::create(
                $request->only(['name'])
            );
            return $this->showModelAsResponse($specialization);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Specialization $specialization)
    {
        return $this->showModelAsResponse($specialization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        $this->authorize('update', Specialization::class);
        if($request->has('name'))
        {
            $specialization->update($request->only(['name']));
            return $this->showModelAsResponse($specialization);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        $this->authorize('destroy', Specialization::class);
        $specialization->delete();
        return $this->showModelAsResponse($specialization);
    }
}
