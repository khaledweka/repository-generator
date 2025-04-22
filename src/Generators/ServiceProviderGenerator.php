<?php

namespace wakeelkhaled\RepositoryGenerator\Generators;

use Illuminate\Support\Facades\File;

class ServiceProviderGenerator
{
    protected $stub;

    public function __construct()
    {
        $this->stub = File::get(__DIR__.'/../Stubs/service-provider.stub');
    }

    public function update()
    {
        $path = app_path('Providers/RepositoryServiceProvider.php');

        if (!File::exists($path)) {
            File::put($path, $this->stub);
        }
    }
}
