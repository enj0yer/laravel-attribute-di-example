<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;
use ReflectionProperty;
use App\Attributes\Inject;

class AttributeInjectionServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->app->resolving(function ($object, $app) {

            if (!method_exists($object, 'canInjectProperties') ||  !$object->canInjectProperties()) {
                return;
            }

            $reflector = new ReflectionClass($object);

            foreach ($reflector->getProperties() as $property) {
                $attributes = $property->getAttributes(Inject::class);

                if (!empty($attributes)) {
                    $this->injectDependency($object, $property, $app);
                }
            }
        });
    }

    private function injectDependency($object, ReflectionProperty $property, $app)
    {
        $property->setAccessible(true);
        $dependencyClass = $property->getType()?->getName();

        if ($dependencyClass && $app->bound($dependencyClass)) {
            $property->setValue($object, $app->make($dependencyClass));
        }
    }
}
