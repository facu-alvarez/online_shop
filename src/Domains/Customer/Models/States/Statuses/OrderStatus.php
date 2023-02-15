<?php

declare(strict_types=1);

namespace Domains\Customer\Models\States\Statuses;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self pending()
 * @method static self completed()
 * @method static self abandoned()
 * @method static self refunded()
 */
final class OrderStatus extends Enum {}
