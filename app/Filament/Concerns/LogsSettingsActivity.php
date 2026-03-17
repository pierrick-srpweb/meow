<?php

namespace App\Filament\Concerns;

trait LogsSettingsActivity
{
    protected array $oldSettings = [];

    protected function beforeSave(): void
    {
        $settingsClass = static::$settings;
        $settings = app($settingsClass);

        $this->oldSettings = collect((new \ReflectionClass($settings))
            ->getProperties(\ReflectionProperty::IS_PUBLIC))
            ->mapWithKeys(fn (\ReflectionProperty $prop): array => [$prop->getName() => $settings->{$prop->getName()}])
            ->toArray();
    }

    protected function afterSave(): void
    {
        $settingsClass = static::$settings;
        $settings = app($settingsClass);

        $newSettings = collect((new \ReflectionClass($settings))
            ->getProperties(\ReflectionProperty::IS_PUBLIC))
            ->mapWithKeys(fn (\ReflectionProperty $prop): array => [$prop->getName() => $settings->{$prop->getName()}])
            ->toArray();

        $changed = array_filter($newSettings, function ($value, $key) {
            return ($this->oldSettings[$key] ?? null) !== $value;
        }, ARRAY_FILTER_USE_BOTH);

        if (empty($changed)) {
            return;
        }

        $old = array_intersect_key($this->oldSettings, $changed);

        activity()
            ->causedBy(auth()->user())
            ->withProperties([
                'attributes' => $changed,
                'old' => $old,
            ])
            ->log($this->getActivityDescription());
    }

    protected function getActivityDescription(): string
    {
        return 'Paramètres modifiés';
    }
}
