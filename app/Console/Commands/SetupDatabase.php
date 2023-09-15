<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Exception;

class SetupDatabase extends Command
{
    protected $signature = 'run';
    protected $description = 'Create SQLite database, run migrations, seed, and start the development server';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            // Step 1: Create the SQLite database
            $databasePath = database_path('database.sqlite');

            if (File::exists($databasePath)) {
                $this->error('SQLite database file already exists.');
            } else {
                File::put($databasePath, '');
                $this->info('SQLite database created successfully.');
            }

            // Step 2: Run migrations
            Artisan::call('migrate');
            $this->info('Migrations completed successfully.');

            // Step 3: Seed the database
            $this->info('Seeding started, this could take a few minutes.');
            Artisan::call('db:seed --class=UsersTableSeeder');
            $this->info('Database seeding completed successfully.');

             // Start the Laravel development server
            $descriptorspec = [
                0 => ["pipe", "r"],
                1 => ["pipe", "w"],
                2 => ["pipe", "w"]
            ];

            // run the command in the background and capture its output
            $process = proc_open('php artisan serve --host=localhost --port=8000', $descriptorspec, $pipes);

            if (is_resource($process)) {
                // Capture and display the output of the server process
                while ($s = fgets($pipes[1])) {
                    echo $s;
                }

                fclose($pipes[0]);
                fclose($pipes[1]);
                fclose($pipes[2]);

                proc_close($process);
            }
        } catch (Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
