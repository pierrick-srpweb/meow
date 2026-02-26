<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Media::created(function (Media $media): void {
            if ($media->collection_name !== 'photos') {
                return;
            }

            $path = $media->getPath();

            if (! file_exists($path)) {
                return;
            }

            $dimensions = getimagesize($path);

            if ($dimensions) {
                $media->setCustomProperty('width', $dimensions[0]);
                $media->setCustomProperty('height', $dimensions[1]);
                $media->saveQuietly();
            }
        });
    }
}
