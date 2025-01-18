<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class LogRegisterJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $appName,
        public string $logType,
        public array $payload
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo 'Log registred by ' . env('APP_NAME') .
            '. From: ' . $this->appName .
            '; Type: ' . strtoupper($this->logType) .
            '; Payload: ' . json_encode($this->payload);
    }
}
