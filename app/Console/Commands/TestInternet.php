<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestInternet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-internet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $content = file_get_contents('https://www.google.com');

        $this->info($content);
    }
}
