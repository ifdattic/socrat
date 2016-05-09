<?php
declare(strict_types = 1);

namespace spec;

final class TestValues
{
    const INVALID_UUID = '123';
    const UUID = '5399dbab-ccd0-493c-be1a-67300de1671f';
    const UUID_REGEX = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';
}
