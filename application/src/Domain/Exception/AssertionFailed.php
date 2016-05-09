<?php
declare(strict_types = 1);

namespace Domain\Exception;

use Assert\InvalidArgumentException;

/**
 * Extending the class as currently we don't have anything custom for
 * it. This is for keeping things separate and avoiding mostly copy-pasting
 * the code. If some custom logic has to be done here, think about
 * removing the extends from a class.
 */
final class AssertionFailed extends InvalidArgumentException
{
}
