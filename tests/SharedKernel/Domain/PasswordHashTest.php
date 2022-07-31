<?php
declare(strict_types=1);

namespace Tests\SharedKernel\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\PasswordHash;

class PasswordHashTest extends TestCase
{
    public function testCreation(): void
    {
        $passwordHash = new PasswordHash('123iy12i32');
        self::assertEquals('123iy12i32', $passwordHash->jsonSerialize());
    }

    public function testFailure(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $passwordHash = new PasswordHash('');
    }
}
