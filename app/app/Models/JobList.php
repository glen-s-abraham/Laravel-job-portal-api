<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobList extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function applicants()
    {
        return $this->belongsToMany(
            User::class,
            'job_user',
            'user_id',
            'job_id'
        );
    }

}
