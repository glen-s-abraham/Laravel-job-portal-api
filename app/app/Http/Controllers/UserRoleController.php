<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserRoleController extends Controller
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
        return $this->showCollectionAsResponse(UserRole::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', UserRole::class);
        if($request->has('name'))
        {
            $userRole = UserRole::create(
                $request->only(['name'])
            );
            return $this->showModelAsResponse($userRole);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        return $this->showModelAsResponse($userRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        $this->authorize('update', UserRole::class);
        if($request->has('name'))
        {
            $userRole->update($request->only(['name']));
            return $this->showModelAsResponse($userRole);
        }
        throw ValidationException::withMessages(['name'=>['required']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        $this->authorize('destroy', UserRole::class);
        $userRole->delete();
        return $this->showModelAsResponse($userRole);
    }
}
