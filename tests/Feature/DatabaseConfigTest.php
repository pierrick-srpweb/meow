<?php

it('configures sqlite with wal journal mode', function (): void {
    $config = config('database.connections.sqlite');

    expect($config['journal_mode'])->toBe('wal');
});

it('configures sqlite with a busy timeout', function (): void {
    $config = config('database.connections.sqlite');

    expect($config['busy_timeout'])->toBe(5000);
});
