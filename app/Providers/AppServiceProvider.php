<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\User;
use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('can_review_create', function (User $user){
            return $user->can_review == 1;
        });

        Gate::define('can_review_edit', function(Auth $auth, Review $review){
            return $auth->id() == $review->user_id;
        });
    }
}
