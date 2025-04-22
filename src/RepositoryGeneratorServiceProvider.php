<?php

namespace wakeelkhaled\RepositoryGenerator;

use Illuminate\Support\ServiceProvider;
use wakeelkhaled\RepositoryGenerator\Commands\GenerateRepositoryCommand;

class RepositoryGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateRepositoryCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
