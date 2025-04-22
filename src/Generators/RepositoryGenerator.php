<?php

namespace wakeelkhaled\RepositoryGenerator\Generators;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RepositoryGenerator
{
    protected $model;
    protected $stub;

    public function __construct(string $model)
    {
        $this->model = $model;
        $this->stub = File::get(__DIR__.'/../Stubs/repository.stub');
    }

    public function generate()
    {
        $path = app_path('Repositories/SQL/'.$this->model.'Repository.php');

        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        $content = str_replace(
            ['{{model}}', '{{modelVariable}}', '{{modelNamespace}}'],
            [
                $this->model,
                Str::camel($this->model),
                $this->getModelNamespace()
            ],
            $this->stub
        );

        File::put($path, $content);
    }

    protected function getModelNamespace()
    {
        return 'App\\Models\\'.$this->model;
    }
}
