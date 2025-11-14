<?php

namespace App\Providers;

use App\Providers\ServiceProvider;
use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class BladeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->container->addShared('blade.filesystem', function () {
            return new Filesystem();
        });

        $this->container->addShared('blade.compiler', function () {
            $filesystem = $this->container->get('blade.filesystem');
            $viewsPath = __DIR__ . '/../../views';
            $cachePath = __DIR__ . '/../../storage/cache/views';

            // Create cache directory if it doesn't exist
            if (!is_dir($cachePath)) {
                mkdir($cachePath, 0755, true);
            }

            return new BladeCompiler($filesystem, $cachePath);
        });

        $this->container->addShared('blade.engine.resolver', function () {
            $resolver = new EngineResolver();
            $filesystem = $this->container->get('blade.filesystem');
            $compiler = $this->container->get('blade.compiler');

            $resolver->register('blade', function () use ($compiler) {
                return new CompilerEngine($compiler);
            });

            $resolver->register('php', function () use ($filesystem) {
                return new PhpEngine($filesystem);
            });

            return $resolver;
        });

        $this->container->addShared('blade.view.finder', function () {
            $filesystem = $this->container->get('blade.filesystem');
            $viewsPath = __DIR__ . '/../../views';

            return new FileViewFinder($filesystem, [$viewsPath]);
        });

        $this->container->addShared('blade.view.factory', function () {
            $resolver = $this->container->get('blade.engine.resolver');
            $finder = $this->container->get('blade.view.finder');
            $events = new Dispatcher(new IlluminateContainer());

            return new Factory($resolver, $finder, $events);
        });
    }
}

