<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Education;
use App\Models\JobCategory;
use App\Models\Specialization;
use App\Models\State;
use App\Models\UserRole;
use App\Policies\AdminModelsPolicies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Country::class => AdminModelsPolicies::class,  
        State::class => AdminModelsPolicies::class,
        Education::class => AdminModelsPolicies::class,
        Specialization::class => AdminModelsPolicies::class,
        JobCategory::class => AdminModelsPolicies::class,
        UserRole::class => AdminModelsPolicies::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
