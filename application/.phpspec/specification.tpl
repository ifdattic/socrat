<?php
declare(strict_types=1);

namespace %namespace%;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class %name% extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('%subject%');
    }
}
