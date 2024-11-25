<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command {
    /**
    * The name and signature of the console command.
    *
    * @var string
    */

    protected $signature = 'keto:install';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Migrates Database , Seeds Database';

    /**
    * Create a new command instance.
    *
    * @return void
    */

    public function __construct() {
        parent::__construct();
    }

    /**
    * Execute the console command.
    *
    * @return int
    */

    public function handle() {

        $this->generateAppKey();
        $this->setupDatabase();
        $this->seedDatabase();
        $this->storageLink();
        $this->clearCache();
        $this->info( 'Installation Complete' );
    }

    /*
    Clears Config Cache after updating env file
    */
    protected function clearCache() {
        $this->info( 'Clear Config Cache' );
        $this->call( 'config:clear' );
    }

    /**
    * Run all the seeders.
    *
    * @return void
    */
    protected function seedDatabase() {
        $this->line( 'Seeding Database ==' );

        $this->call( 'db:seed' );

        $this->info( 'Database Seeding successful' );
    }

    /**
    * Generate private application key.
    *
    * @return void
    */
    protected function generateAppKey() {
        $this->line( 'Generating application key..' );

        $this->call( 'key:generate', [ '--force' => true ] );

        $this->info( 'Application key generated successfully.' );
    }

    /**
    * Setup the database.
    *
    * @return void
    */
    protected function setupDatabase( ) {
        $this->line( 'Installing the database...' );
        $this->info( 'Running Fresh Database Migration' );
        $this->call( 'migrate:fresh', [ '--force' => true ] );
        $this->info( 'Database installed successfully.' );
    }

    /**
    * Create Storage Link.
    *
    * @return void
    */
    protected function storageLink() {
        $this->call( 'storage:link' );
        $this->line( ' Storage Linked Successfully...' );
    }

     
}
