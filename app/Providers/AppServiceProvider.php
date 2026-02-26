<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AppServiceProvider extends ServiceProvider
{
    #[\Override]
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        RateLimiter::for('livewire', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });

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
