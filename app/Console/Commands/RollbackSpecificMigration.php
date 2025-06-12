<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RollbackSpecificMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:rollback-specific {class : The name of the migration class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Roll back a specific migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $className = $this->argument('class');

        if (class_exists($className)) {
            // Attempt to instantiate the migration class
            try {
                $migrationInstance = app()->make($className);
            } catch (\Throwable $e) {
                $this->error("Failed to instantiate migration class {$className}: " . $e->getMessage());
                return;
            }

            if (method_exists($migrationInstance, 'down')) {
                try {
                    $migrationInstance->down();
                    $this->info("Migration {$className} rolled back successfully!");

                    // Optionally, remove the migration from the migrations table
                    $migrationName = (new \ReflectionClass($migrationInstance))->getShortName();
                    DB::table('migrations')->where('migration', $migrationName)->delete();
                } catch (\Throwable $e) {
                    $this->error("Failed to roll back migration {$className}: " . $e->getMessage());
                }
            } else {
                $this->error("The migration class {$className} does not have a down method.");
            }
        } else {
            $this->error("Migration class {$className} does not exist.");
        }
    }
}
