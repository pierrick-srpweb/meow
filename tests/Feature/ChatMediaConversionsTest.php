<?php

use App\Models\Chat;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function (): void {
    Storage::fake('public');
});

it('registers card, detail and thumbnail conversions', function (): void {
    $chat = Chat::factory()->create();
    $chat->registerMediaConversions();

    $names = collect($chat->mediaConversions)->map(fn ($c) => $c->getName())->all();

    expect($names)->toContain('card')
        ->toContain('detail')
        ->toContain('thumbnail');
});

it('does not register old preview conversion', function (): void {
    $chat = Chat::factory()->create();
    $chat->registerMediaConversions();

    $names = collect($chat->mediaConversions)->map(fn ($c) => $c->getName())->all();

    expect($names)->not->toContain('preview');
});

it('scopes card conversion to cv collection', function (): void {
    $chat = Chat::factory()->create();
    $chat->registerMediaConversions();

    $card = collect($chat->mediaConversions)->first(fn ($c) => $c->getName() === 'card');

    expect($card->getPerformOnCollections())->toContain('cv');
});

it('scopes detail conversion to cv collection', function (): void {
    $chat = Chat::factory()->create();
    $chat->registerMediaConversions();

    $detail = collect($chat->mediaConversions)->first(fn ($c) => $c->getName() === 'detail');

    expect($detail->getPerformOnCollections())->toContain('cv');
});

it('scopes thumbnail conversion to photos collection', function (): void {
    $chat = Chat::factory()->create();
    $chat->registerMediaConversions();

    $thumbnail = collect($chat->mediaConversions)->first(fn ($c) => $c->getName() === 'thumbnail');

    expect($thumbnail->getPerformOnCollections())->toContain('photos');
});

it('generates card and detail conversions for cv media', function (): void {
    $chat = Chat::factory()->create();

    $chat->addMedia(UploadedFile::fake()->image('cv.jpg', 1200, 800))
        ->toMediaCollection('cv');

    $media = $chat->fresh()->getFirstMedia('cv');

    expect($media->hasGeneratedConversion('card'))->toBeTrue()
        ->and($media->hasGeneratedConversion('detail'))->toBeTrue();
});

it('generates thumbnail conversion for photos media', function (): void {
    $chat = Chat::factory()->create();

    $chat->addMedia(UploadedFile::fake()->image('photo.jpg', 1200, 800))
        ->toMediaCollection('photos');

    $media = $chat->fresh()->getMedia('photos')->first();

    expect($media->hasGeneratedConversion('thumbnail'))->toBeTrue();
});
