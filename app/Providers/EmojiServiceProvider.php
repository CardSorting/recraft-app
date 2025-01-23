<?php

namespace App\Providers;

use App\Services\Emoji\CompositeEmojiTranslator;
use App\Services\Emoji\Contracts\EmojiTranslatorInterface;
use Illuminate\Support\ServiceProvider;

class EmojiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(EmojiTranslatorInterface::class, function ($app) {
            return new CompositeEmojiTranslator();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
