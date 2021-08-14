<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\throwException;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showCollectionAsResponse(Education::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('education'))
        {
            $education = Education::create($request->only(['education']));
            return $this->showModelAsResponse($education);
        }
        throw ValidationException::withMessages(['education'=>['required']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        return $this->showModelAsResponse($education);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        if($request->has('education'))
        {
            $education->update($request->only(['education']));
            return $this->showModelAsResponse($education);
        }
        throw ValidationException::withMessages(['education'=>['required']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return $this->showModelAsResponse($education);
    }
}
