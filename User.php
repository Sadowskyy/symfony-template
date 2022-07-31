<?php
declare(strict_types=1);

namespace App\SharedKernel;

use App\Security\UserData;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class User implements UserInterface, EquatableInterface
{
    private UserData $userData;

    public function isEqualTo(UserInterface $user): bool
    {
        $this->userData->getEmail() !== $user->get
    }

    public function getRoles(): array
    {
        return [];
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        // TODO: Implement getUserIdentifier() method.
    }
}