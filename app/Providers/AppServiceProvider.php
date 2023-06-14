<?php

namespace App\Providers;

use App\Http\Services\MailchimpNewsletter;
use App\Http\Services\Newsletter;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     */
    public function register(): void
    {
        //
        app()->bind(Newsletter::class, function () {

            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us11'
            ]);
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application Services.
     */
    public function boot(): void
    {
        //
        Model::unguard();
        Gate::define('admin', function (User $user) {
            return $user->username === '141D';
//            if (auth()->user()?->username !== '141D') {
//                abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
//            }

        });
        Blade::if('admin', function () {
            return request()->user()->can('admin');
    });
    }
}
