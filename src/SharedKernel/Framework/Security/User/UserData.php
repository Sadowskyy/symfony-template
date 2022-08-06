<?php
declare(strict_types=1);

namespace SharedKernel\Framework\Security\User;

use SharedKernel\Domain\Email;
use SharedKernel\Domain\PasswordHash;
use Symfony\Component\Uid\Uuid;

final class UserData
{
    public function __construct(
        private int $userId,
        private Uuid $userUuid,
        private Email $email,
        private PasswordHash $passwordHash
    ) {
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): PasswordHash
    {
        return $this->passwordHash;
    }
}