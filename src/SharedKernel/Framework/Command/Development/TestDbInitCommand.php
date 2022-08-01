<?php
declare(strict_types=1);

namespace SharedKernel\Framework\Command\Development;

//use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class TestDbInitCommand extends Command
{
    //soon add db connection
    public function __construct(private ContainerInterface $container)
    {
        parent::__construct('dev:db:init');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $projectDir = $this->container->getParameter('kernel.project_dir');
        $initializeDbFiles = array_diff(scandir("$projectDir/dev/mysql"), array('.', '..'));
//
//        foreach ($initializeDbFiles as $file) {
//            if (pathinfo(($file))['extension'] === 'sql') {
//                $this->connection->executeQuery(
//                    (string) file_get_contents("$projectDir/dev/mysql/$file")
//                );
//            }
//        }

        return Command::SUCCESS;
    }
}