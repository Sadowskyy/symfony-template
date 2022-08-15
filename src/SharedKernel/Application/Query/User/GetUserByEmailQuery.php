<?php
declare(strict_types=1);

namespace SharedKernel\Application\Query\User;

final class GetUserByEmailQuery
{
    public function getSQL(): string
    {
        return <<<SQL
SELECT *
FROM users
WHERE email = ?
SQL;
    }

    public function __toString(): string
    {
       return $this->getSQL();
    }
}
