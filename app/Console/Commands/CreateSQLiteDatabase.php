<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateSQLiteDatabase extends Command
{
    protected $signature = 'db:create-sqlite';
    protected $description = 'Create an SQLite database for the Laravel application';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Define the path to the SQLite database file
        $databasePath = database_path('database.sqlite');

        // Check if the SQLite database file already exists
        if (File::exists($databasePath)) {
            $this->error('SQLite database file already exists.');
        } else {
            // Create the SQLite database file
            File::put($databasePath, '');

            $this->info('SQLite database created successfully.');
        }
    }
}
