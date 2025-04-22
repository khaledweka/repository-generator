# Laravel Repository Generator

A Laravel package to generate repository pattern files based on your models.

## Installation

1. Install the package via composer:

```bash
composer require wakeelkhaled/repository-generator
```

Publish the configuration file (optional):

```bash
php artisan vendor:publish --provider="wakeelkhaled\RepositoryGenerator\RepositoryGeneratorServiceProvider"

```
Usage
Generate repository files for a specific model:

```bash
php artisan make:repository User
```
Generate repository files for all models:

```bash
php artisan make:repository --all
```
Features
Generates contract interfaces for repositories

Generates repository classes that extend BaseRepository

Automatically updates the RepositoryServiceProvider

Follows your existing repository pattern implementation


## How to Use

1. Install the package in your Laravel project
2. Run the command to generate repositories:
   - For a specific model: `php artisan make:repository User`
   - For all models: `php artisan make:repository --all`
3. The package will generate:
   - Contract interface in `app/Repositories/Contracts/`
   - Repository class in `app/Repositories/SQL/`
   - Update the `RepositoryServiceProvider`

## Key Features

1. Follows your existing repository pattern implementation
2. Generates proper type hints and method signatures
3. Automatically binds contracts to implementations in the service provider
4. Supports generating repositories for all models at once
5. Maintains your existing base repository structure

The package will save you significant time when implementing the repository pattern in your Laravel applications by automating the boilerplate code generation.
