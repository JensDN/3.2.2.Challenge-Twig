<?php


namespace App\Services;

use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;


class LoggerClass
{

    private $logger;

    /**
     * LoggerClass constructor.
     * @param LoggerInterface $logger
     * @throws Exception
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger->pushHandler(new StreamHandler(__DIR__.'/src/Logs/log.info',Logger::INFO));
    }
    public function message(string $message): bool
    {
        return $this->logger->info($message);
    }


}