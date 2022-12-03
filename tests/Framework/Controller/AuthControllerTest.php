<?php

declare(strict_types=1);

namespace Tests\Framework\Controller;

use Doctrine\DBAL\Driver\Connection;
use SharedKernel\Application\Query\User\GetUserByEmailQuery;
use Tests\Utils\AbstractFunctionalTestCase;

class AuthControllerTest extends AbstractFunctionalTestCase
{
    private Connection $connection;
    
    public function __construct(Connection $connection)
    {
        parent::__construct(null, [], '$dataName');
        $this->connection = $connection;
    }

    public function testMainPageEndpoint(): void
    {
        $client = $this->getClient();
        $user = $this->connection->exec((string) new GetUserByEmailQuery());
        dd($user);
    }
}
