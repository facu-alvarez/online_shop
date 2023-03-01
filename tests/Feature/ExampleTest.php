<?php

declare(strict_types=1);

namespace Tests\Feature;

use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;


it('It receives HTTP OK on the home page', function () {
    get(
        route('home'),
    )->assertStatus(
        Http::OK()
    );
});
