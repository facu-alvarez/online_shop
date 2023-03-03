<?php

declare(strict_types=1);

namespace App\Providers;

use Spatie\EventSourcing\Facades\Projectionist;
use Domains\Customer\Projectors\CartProjector;
use Illuminate\Support\ServiceProvider;

class EventSourcingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Projectionist::addProjectors(
            projectors:
            [
                CartProjector::class
            ]
        );
    }

    public function boot(): void
    {
        //
    }
}
