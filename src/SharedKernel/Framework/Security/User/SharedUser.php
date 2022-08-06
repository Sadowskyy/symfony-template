<?php
declare(strict_types=1);

namespace SharedKernel\Framework\Security\User;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class SharedUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct(private UserData $userData) {
    }

    public function getPassword(): string
    {
        return (string) $this->userData->getPasswordHash();
    }

    public function getRoles(): array
    {
        return [];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->userData->getEmail();
    }
}