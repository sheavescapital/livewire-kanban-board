<?php

namespace Mantix\LivewireStatusBoard;

use Illuminate\Support\ServiceProvider;

class LivewireStatusBoardServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     */
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-kanban-board');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/livewire-kanban-board'),
            ], 'livewire-kanban-board-views');
        }
    }

    /**
     * Register the application services.
     */
    public function register() {
        //
    }
}
