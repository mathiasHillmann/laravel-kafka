<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaProducer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:producer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = new Message(
            topicName: 'koch',
            headers: ['retries' => 5],
            body: ['periodos' => 27],
            key: 'previsao'
        );

        $producer = Kafka::publishOn('laravel-kafka-kafka', 'koch')
            ->withMessage($message)
            ->withDebugEnabled();

        $producer->send();
    }
}
