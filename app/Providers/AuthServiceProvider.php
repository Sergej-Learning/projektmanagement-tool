<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\UserPolicy;



class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Project::class => \App\Policies\ProjectPolicy::class,
        \App\Models\Task::class => \App\Policies\TaskPolicy::class,
        \App\Models\History::class => \App\Policies\HistoryPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
