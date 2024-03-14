<?php

declare(strict_types=1);

namespace Khalilleo\TokenGen;

final class CharSet
{
    public const LOWER_LETTERS = 'abcdefghijklmnopqrstuvwxyz';

    public const UPPER_LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public const MIXED_LETTERS = self::LOWER_LETTERS . self::UPPER_LETTERS;

    public const DIGITS = '9876543210';

    public const LETTERS_AND_DIGITS = self::MIXED_LETTERS . self::DIGITS;

    public const SPECIAL_CHARS = '$_+%*?=@#~!^';

    public const ALL = self::LETTERS_AND_DIGITS . self::SPECIAL_CHARS;
}
