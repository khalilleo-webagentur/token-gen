<?php

declare(strict_types=1);

namespace Khalilleo\TokenGen;

use Exception;

final class Token
{
    protected const LENGTH = 32;

    protected const PW_MIN = 8;

    protected const DIGITS_MIN = 6;

    public function getRandomToken(int $length = self::LENGTH): string
    {
        return $this->generate(CharSet::LETTERS_AND_DIGITS, $length);
    }

    public function getRandomTokenOnlyLowers(int $length = self::LENGTH): string
    {
        return $this->generate(CharSet::LOWER_LETTERS, $length);
    }

    public function getRandomTokenOnlyUppers(int $length = self::LENGTH): string
    {
        return $this->generate(CharSet::UPPER_LETTERS, $length);
    }

    public function getRandomApiToken(): string
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return sprintf('%s-%s-%s-%s-%s',
            bin2hex(substr($data, 0, 4)),
            bin2hex(substr($data, 4, 2)),
            bin2hex(substr($data, 6, 2)),
            bin2hex(substr($data, 8, 2)),
            bin2hex(substr($data, 10, 6))
        );
    }

    public function getRandomDigits(int $length): int
    {
        return (int) $this->generate(CharSet::DIGITS, $length);
    }

    public function getOtp(): int
    {
        try {
            return random_int(111111, 999999);
        } catch (Exception $e) {
            return (int) $this->generate(CharSet::DIGITS, self::DIGITS_MIN);
        }
    }

    public function getRandomPassword(int $length = self::PW_MIN): string
    {
        $lowerLetters = str_shuffle(CharSet::LOWER_LETTERS);

        $upperLetters = str_shuffle(CharSet::UPPER_LETTERS);

        $chars = substr($upperLetters, 0, 5)
            . str_shuffle(CharSet::SPECIAL_CHARS)[1]
            . str_shuffle(CharSet::DIGITS)[1]
            . substr($lowerLetters, 0, 9);

        return $this->generate($chars, $length);
    }

    private function generate(string $chars, int $length): string
    {
        return str_shuffle(substr(str_shuffle($chars), 0, $length));
    }
}
