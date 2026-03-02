<?php

use Illuminate\View\ViewException;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;

it('suppresses locked property exceptions for unauthenticated users', function (): void {
    $exception = new CannotUpdateLockedPropertyException('test_property');

    $shouldReport = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
        ->shouldReport($exception);

    expect($shouldReport)->toBeFalse();
});

it('suppresses TypeError from livewire files for unauthenticated users', function (): void {
    $exception = createTypeErrorFromFile('vendor/livewire/livewire/src/SomeFile.php');

    $shouldReport = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
        ->shouldReport($exception);

    expect($shouldReport)->toBeFalse();
});

it('suppresses TypeError from filament files for unauthenticated users', function (): void {
    $exception = createTypeErrorFromFile('vendor/filament/notifications/src/Collection.php');

    $shouldReport = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
        ->shouldReport($exception);

    expect($shouldReport)->toBeFalse();
});

it('suppresses filament action resolve ViewException for unauthenticated users', function (): void {
    $exception = new ViewException('An action tried to resolve without a name.');

    $shouldReport = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
        ->shouldReport($exception);

    expect($shouldReport)->toBeFalse();
});

it('does not suppress regular exceptions for unauthenticated users', function (): void {
    $exception = new RuntimeException('Something went wrong');

    $shouldReport = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
        ->shouldReport($exception);

    expect($shouldReport)->toBeTrue();
});

function createTypeErrorFromFile(string $file): TypeError
{
    try {
        eval('throw new TypeError("Test error");');
    } catch (TypeError $e) {
        $reflection = new ReflectionClass($e);
        $property = $reflection->getProperty('file');
        $property->setValue($e, $file);

        return $e;
    }
}
