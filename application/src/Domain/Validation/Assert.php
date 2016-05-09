<?php
declare(strict_types = 1);

namespace Domain\Validation;

use Assert\Assertion as BaseAssertion;
use Domain\Exception\AssertionFailed;

final class Assert extends BaseAssertion
{
    protected static $exceptionClass = AssertionFailed::class;
}
