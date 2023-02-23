<?php

declare(strict_types=1);

namespace Tests\Feature;

use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;


it('asdasdas', function () {
    get(
        route('home'),
    )->assertStatus(
        Http::OK()
    );
});
