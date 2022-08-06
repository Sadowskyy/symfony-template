<?php
declare(strict_types=1);

namespace SharedKernel\Framework\Security\Provider;

use Doctrine\DBAL\Connection;
use Domain\Exception\UserCannotBeFound;
use SharedKernel\Application\Query\User\GetUserByEmailQuery;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Framework\Security\User\SharedUser;
use SharedKernel\Framework\Security\User\UserData;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Uid\Uuid;

final class UserByEmailProvider implements UserProviderInterface
{

    public function __construct(private Connection $connection) {
    }

    public function refreshUser(UserInterface $user)
    {
    }

    public function supportsClass(string $class): bool
    {
        return SharedUser::class === $class;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = $this->connection->fetchAssociative((string) new GetUserByEmailQuery(), [$identifier]);

        if (empty($user)) {
            throw new UserCannotBeFound("User with email ($identifier) cannot be found");
        }

        $userData = new UserData(
            (int)$user['id'],
            Uuid::fromString($user['uuid']),
            new Email($user['email']),
            new PasswordHash($user['password']),
        );

        return new SharedUser($userData);    }
}