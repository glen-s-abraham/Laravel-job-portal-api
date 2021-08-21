<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use Illuminate\Http\Request;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;

class JobController extends Controller
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
        return $this->showCollectionAsResponse(JobList::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStoreRequest $request)
    {
        $this->authorize('create',JobList::class);
        $data = $request->only([
            'title',
            'description',
            'job_category_id'
        ]);
        $data['user_id'] = auth()->user()->id;
        $job = JobList::create($data);
        return $this->showModelAsResponse($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobList  $jobList
     * @return \Illuminate\Http\Response
     */
    public function show(JobList $job)
    {
        return $this->showModelAsResponse($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobList  $jobList
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdateRequest $request, JobList $job)
    {
        $this->authorize('update',$job);
        $job->update($request->only([
            'title',
            'description',
            'job_category_id'
        ]));
        return $this->showModelAsResponse($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobList  $jobList
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobList $job)
    {
        $this->authorize('delete',$job);
        $job->delete();
        return $this->showModelAsResponse($job);
    }
}
