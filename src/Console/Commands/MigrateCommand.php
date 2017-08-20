<?php

declare(strict_types=1);

namespace Cortex\Foundation\Console\Commands;

use Illuminate\Console\Command;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:migrate:foundation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Cortex Foundation Tables.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->warn('Migrate cortex/foundation:');
        $this->call('migrate', ['--step' => true, '--path' => 'app/cortex/foundation/database/migrations']);
    }
}