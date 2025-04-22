<?php

namespace wakeelkhaled\RepositoryGenerator\Generators;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ContractGenerator
{
    protected $model;
    protected $stub;

    public function __construct(string $model)
    {
        $this->model = $model;
        $this->stub = File::get(__DIR__.'/../Stubs/contract.stub');
    }

    public function generate()
    {
        $path = app_path('Repositories/Contracts/'.$this->model.'Contract.php');

        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        $content = str_replace(
            ['{{model}}', '{{modelVariable}}'],
            [$this->model, Str::camel($this->model)],
            $this->stub
        );

        File::put($path, $content);
    }
}
