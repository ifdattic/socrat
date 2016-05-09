<?php
declare(strict_types=1);

namespace spec\Domain\ValueObject;

use Domain\Exception\AssertionFailed;
use Domain\ValueObject\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\TestValues;

/** @mixin Uuid */
final class UuidSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', [TestValues::UUID]);
    }

    function it_has_uuid_type()
    {
        $this->shouldHaveType(Uuid::class);
    }

    function it_is_created_from_string()
    {
        $this->shouldHaveType(Uuid::class);
        $this->toString()->shouldReturn(TestValues::UUID);
    }

    function it_returns_its_value_as_a_string()
    {
        $this->toString()->shouldReturn(TestValues::UUID);
    }

    function it_returns_its_value_as_a_string_on_string_usage()
    {
        $this->__toString()->shouldReturn(TestValues::UUID);
    }

    function it_throws_an_exception_if_value_is_an_invalid_uuid_string()
    {
        $this->beConstructedThrough('fromString', [TestValues::INVALID_UUID]);

        $this->shouldThrow(AssertionFailed::class)->duringInstantiation();
    }

    function it_generates_a_random_uuid_object()
    {
        $this->beConstructedThrough('generate');

        $this->shouldHaveType(Uuid::class);

        $this->toString()->shouldMatch(TestValues::UUID_REGEX);
    }
}
