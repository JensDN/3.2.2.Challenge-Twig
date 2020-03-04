<?php


namespace App\Classes;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerClass
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * LoggerClass constructor.
     * @param Logger $logger
     * @throws \Exception
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger->pushHandler(new StreamHandler(__DIR__.'/src/Logs/log.info',Logger::INFO));
    }
    public function message(string $message): bool
    {
        return $this->logger->info($message);
    }


}