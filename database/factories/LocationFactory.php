<?php

declare(strict_types=1);

namespace Database\Factories;

use JustSteveKing\LaravelPostcodes\Service\PostcodeService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Customer\Models\Location;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition()
    {
        $service = resolve(PostcodeService::class);

        $location = $service->getRandomPostcode();

        $streetAddress = $street = fake()->streetAddress();

        return [
            'house' => Str::of($streetAddress)->before(' '),
            'street' => Str::of( $street)->after(' '),
            'parish' => data_get($location, 'parish'),
            'ward' => data_get($location, 'admin_ward'),
            'district' => data_get($location, 'admin_district'),
            'county' => data_get($location, 'admin_county'),
            'postcode' => data_get($location, 'postcode'),
            'country' => data_get($location, 'country')
        ];
    }
}
