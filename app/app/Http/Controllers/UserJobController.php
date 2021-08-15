<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $user=User::where('id',$userId)->first();//replace with auth()->user()
        return $this->showCollectionAsResponse($user->jobs);
    }

}
