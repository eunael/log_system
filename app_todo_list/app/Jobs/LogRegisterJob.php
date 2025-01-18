<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class LogRegisterJob implements ShouldQueue
{
    use Queueable;
    public function __construct(
        public string $appName,
        public string $logType,
        public array $payload
    ){}

    public function handle(): void {}
}
