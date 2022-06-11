<?php

namespace SyrianOpenSource\LaravelLivv\Commands;

use Illuminate\Console\Command;

class LaravelLivvCommand extends Command
{
    public $signature = 'laravel-livv';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
