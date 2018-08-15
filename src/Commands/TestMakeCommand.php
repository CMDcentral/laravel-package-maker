<?php

namespace Naoray\LaravelPackageMaker\Commands;

use Illuminate\Foundation\Console\TestMakeCommand as MakeTest;
use Naoray\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Naoray\LaravelPackageMaker\Traits\HasNameAttribute;
use Symfony\Component\Console\Input\InputOption;

class TestMakeCommand extends MakeTest
{
    use CreatesPackageStubs, HasNameAttribute;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:package:test';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = null;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('unit')) {
            return __DIR__.'/stubs/unit-test.stub';
        }

        return __DIR__.'/stubs/test.stub';
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->getNamespaceInput().'\Tests';
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'/tests';
    }

    /**
     * Adds additional options to the command.
     *
     * @return array
     */
    protected function additionalOptions()
    {
        return [
            ['unit', 'u', InputOption::VALUE_NONE, 'Create a unit test'],
        ];
    }
}