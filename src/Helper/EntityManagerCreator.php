<?php

namespace Alura\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
	public static function createEntityManager(): EntityManager
	{
		$config = ORMSetup::createAttributeMetadataConfiguration(
			[__DIR__."/.."],
			true,
		);
        $output = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        $logMiddleware = new Middleware($logger);
        $config->setMiddlewares([$logMiddleware]);

		$conn = [
			'driver' => 'pdo_sqlite',
			'path' => __DIR__ . '/../../db.sqlite'
		];

		return EntityManager::create($conn, $config);
	}

}