<?php

namespace App\Providers;

use App\Nova\Post;
use App\Nova\User;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\PostCount;
use App\Nova\Metrics\PostPerDay;
use Illuminate\Support\Facades\Gate;
use App\Nova\Metrics\PostsPerCategory;
use Laravel\Nova\NovaApplicationServiceProvider;
use Mnplus\Viewcache\Viewcache;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,
            new PostCount,
            new PostPerDay,
            new PostsPerCategory,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new Viewcache
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    // protected function resources()
    // {
    //     Nova::resourcesIn(app_path('Nova'));

    //     Nova::resources([
    //         User::class,
    //         Post::class,
    //     ]);
    // }
}
