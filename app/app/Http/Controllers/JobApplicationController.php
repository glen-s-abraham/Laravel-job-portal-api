<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use App\Models\User;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'getJobApplicants',
            'getMyJobApplications',
            'applyForJob',
            'cancelJobApplication'
        ]);
    }
    public function getJobApplicants(JobList $job)
    {
        return $this->showCollectionAsResponse($job->applicants);
    }

    public function getMyJobApplications()
    {
        $user = auth()->user();
        return $this->showCollectionAsResponse($user->applications);
    }

    public function applyForJob(Request $request,JobList $job)
    {
        $user = auth()->user();
        $user->applications()->attach($job->id);
        return $this->successResponse("Application Submitted",200);
    }

    public function cancelJobApplication(Request $request,JobList $job)
    {
        $user = auth()->user();
        $user->applications()->detach($job->id);
        return $this->successResponse("Application Cancelled",200);
    }

}
