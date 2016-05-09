<?php
declare(strict_types=1);

namespace Domain\ValueObject;

use Domain\Validation\Assert;
use Ramsey\Uuid\Uuid as BaseUuid;

final class Uuid
{
    /**
     * @var string
     */
    private $uuid;

    private function __construct(string $uuid)
    {
        Assert::uuid($uuid);

        $this->uuid = $uuid;
    }

    /**
     * This breaks the Single Responsibility Principle and it was done
     * knowingly for easier access and chance of this class changing anytime
     * soon. Refactor then the need arises.
     */
    public static function generate() : self
    {
        return new static((string) BaseUuid::uuid4());
    }

    public static function fromString(string $uuid) : self
    {
        return new static($uuid);
    }

    public function toString() : string
    {
        return $this->uuid;
    }

    public function __toString() : string
    {
        return $this->toString();
    }
}
