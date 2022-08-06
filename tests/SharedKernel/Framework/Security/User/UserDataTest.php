<?php
declare(strict_types=1);

namespace Tests\SharedKernel\Framework\Security\User;

use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Framework\Security\User\UserData;
use Symfony\Component\Uid\Uuid;

class UserDataTest extends TestCase
{
    public function testCreationUserData(): void
    {
        $userData = new UserData(
            $userId = 1,
            $uuid = Uuid::v4(),
            $email =  new Email('email@gmail.com'),
            $passwordHash = new PasswordHash('123'),
        );

        self::assertEquals($userId, $userData->getUserId());
        self::assertEquals($uuid, $userData->getUserUuid());
        self::assertEquals($email, $userData->getEmail());
        self::assertEquals($passwordHash, $userData->getPasswordHash());
    }
}