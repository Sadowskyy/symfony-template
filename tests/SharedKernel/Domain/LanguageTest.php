<?php
declare(strict_types=1);

namespace Tests\SharedKernel\Domain;

use Domain\Exception\InvalidEmailException;
use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\Language;

class LanguageTest extends TestCase
{
    public function testConstruction(): void
    {
        $language = new Language('en');
        self::assertEquals('en', (string) $language);
    }

    public function testShouldFail(): void
    {
        $this->expectException(InvalidEmailException::class);
        $language = new Language('cz');
    }
}
