<?php

declare(strict_types=1);

use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
use Domains\Customer\Events\ProductWasAddedToCart;
use Domains\Customer\States\Statuses\CartStatus;
use Illuminate\Testing\Fluent\AssertableJson;
use Domains\Catalog\Models\Variant;
use JustSteveKing\StatusCode\Http;
use Domains\Customer\Models\Cart;
use function Pest\Laravel\post;
use function Pest\Laravel\get;

it('creates a cart for an unauthenticated user', function () {
    post(
        route('api:v1:carts:store')
    )->assertStatus(
        Http::CREATED()
    )->assertJson(fn(AssertableJson $json) => $json
        ->where('type', 'cart')
        ->where('attributes.status', CartStatus::pending()->label)
        ->etc()
    );
});

it('return a cart for a logged user', function () {
    $cart = Cart::factory()->create();

    auth()->loginUsingId($cart->user_id);

    get(
        route('api:v1:carts:index')
    )->assertStatus(
        Http::OK()
    );
});

it('returns a not found status when a guest tries to retrieve their carts', function () {
    get(
        route('api:v1:carts:index')
    )->assertStatus(
        Http::NO_CONTENT()
    );
});

it('can add a new product to a cart', function () {
    expect(EloquentStoredEvent::query()->get())
        ->toHaveCount(0);

    $cart = Cart::factory()->create();
    $variant = Variant::factory()->create();

    post(
        route('api:v1:carts:products:store', $cart->uuid),
        [
            'quantity' => 1,
            'purchasable_id' => $variant->id,
            'purchasable_type' => 'variant'
        ]
    )->assertStatus(
        Http::CREATED()
    );

    expect(EloquentStoredEvent::query()->get())
        ->toHaveCount(1)
        ->and(EloquentStoredEvent::query()->get()->first()->event_class)
        ->toEqual(ProductWasAddedToCart::class);
});
