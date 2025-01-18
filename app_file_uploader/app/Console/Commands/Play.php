<?php

namespace App\Console\Commands;

use App\Jobs\LogRegisterJob;
use Illuminate\Console\Command;

class Play extends Command
{
    protected $signature = 'play {type}';

    protected $description = 'Give o type as argument';

    public function handle()
    {
        $type = $this->argument('type');

        LogRegisterJob::dispatch(
            env('APP_NAME'),
            $type,
            ['id' => fake()->numberBetween(1, 100), 'name' => fake()->name]
        );
    }
}
