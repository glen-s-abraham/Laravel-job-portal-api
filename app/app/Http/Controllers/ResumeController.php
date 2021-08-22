<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(
            ['store','show','update','destroy','myResume']
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('resume'))
        {
            $path = $request->file('resume')->store('resumes');
            $resume = auth()->user()->resume()->create();
            $resume->storedResume()->create(['file'=>$path]);
            return $this->showModelAsResponse($resume->load('storedResume'));
        }
        throw ValidationException::withMessages(['resume'=>['required']]);
    }
    public function show()
    {
        if(auth()->user()->resume)
        {
            $resume = auth()->user()->resume;
            return $this->showModelAsResponse($resume->load('storedResume'));
        }
        return $this->errorResponse('Resume not Founds',404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('resume'))
        {
            $path = $request->file('resume')->store('resumes');
            $resume = auth()->user()->resume;
            $resume->storedResume()->update(['file'=>$path]);
            return $this->showModelAsResponse($resume->load('storedResume'));
        }
        throw ValidationException::withMessages(['resume'=>['required']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if(auth()->user()->resume)
        {
            $resume = auth()->user()->resume;
            $resume->storedResume()->delete();
            $resume->delete();
            return $this->successResponse('Deleted The resume',200);
        }
        return $this->errorResponse('No resume Found',404);
    }
}
