<?php

namespace wakeelkhaled\RepositoryGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use wakeelkhaled\RepositoryGenerator\Generators\ContractGenerator;
use wakeelkhaled\RepositoryGenerator\Generators\RepositoryGenerator;
use wakeelkhaled\RepositoryGenerator\Generators\ServiceProviderGenerator;

class GenerateRepositoryCommand extends Command
{
    protected $signature = 'make:repository {model : The name of the model}
                            {--all : Generate all repository files for all models}';

    protected $description = 'Create a new repository class for the given model';

    public function handle()
    {
        if ($this->option('all')) {
            $this->generateForAllModels();
            return;
        }

        $model = $this->argument('model');
        $this->generateRepositoryFiles($model);
    }

    protected function generateForAllModels()
    {
        $modelPath = app_path('Models');
        $models = collect(File::files($modelPath))
            ->map(fn ($file) => pathinfo($file)['filename'])
            ->reject(fn ($model) => $model === 'Model');

        foreach ($models as $model) {
            $this->generateRepositoryFiles($model);
        }

        $this->info('Generated repository files for all models.');
    }

    protected function generateRepositoryFiles(string $model)
    {
        $contractGenerator = new ContractGenerator($model);
        $repositoryGenerator = new RepositoryGenerator($model);
        $serviceProviderGenerator = new ServiceProviderGenerator();

        $contractGenerator->generate();
        $repositoryGenerator->generate();
        $serviceProviderGenerator->update();

        $this->info("Repository files for {$model} generated successfully!");
    }
}
