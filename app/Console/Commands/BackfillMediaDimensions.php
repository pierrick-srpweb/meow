<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BackfillMediaDimensions extends Command
{
    protected $signature = 'media:backfill-dimensions';

    protected $description = 'Backfill width/height custom properties on existing photo media';

    public function handle(): int
    {
        $media = Media::where('collection_name', 'photos')
            ->whereNull('custom_properties->width')
            ->get();

        if ($media->isEmpty()) {
            $this->info('All photos already have dimensions.');

            return self::SUCCESS;
        }

        $this->info("Backfilling dimensions for {$media->count()} photos...");

        $bar = $this->output->createProgressBar($media->count());

        foreach ($media as $item) {
            $path = $item->getPath();

            if (! file_exists($path)) {
                $bar->advance();

                continue;
            }

            $dimensions = getimagesize($path);

            if ($dimensions) {
                $item->setCustomProperty('width', $dimensions[0]);
                $item->setCustomProperty('height', $dimensions[1]);
                $item->saveQuietly();
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Done.');

        return self::SUCCESS;
    }
}
