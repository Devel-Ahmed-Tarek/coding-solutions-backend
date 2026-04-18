<?php

namespace App\Support;

trait HasBilingualAttributes
{
    /**
     * @param  array<int, string>  $suffixPriority
     */
    private function firstNonEmptyLocalized(string $field, array $suffixPriority): string
    {
        foreach ($suffixPriority as $suffix) {
            $value = $this->{$field.'_'.$suffix} ?? null;
            if ($value !== null && $value !== '') {
                return (string) $value;
            }
        }

        return '';
    }

    public function localizedValue(string $field): string
    {
        $locale = app()->getLocale();

        return match ($locale) {
            'en' => $this->firstNonEmptyLocalized($field, ['en', 'ar', 'de']),
            'de' => $this->firstNonEmptyLocalized($field, ['de', 'en', 'ar']),
            default => $this->firstNonEmptyLocalized($field, ['ar', 'en', 'de']),
        };
    }

    /**
     * @param  array<int, string>  $fields
     * @return array{ar: array<string, string>, en: array<string, string>, de: array<string, string>}
     */
    public function translationsFor(array $fields): array
    {
        $out = ['ar' => [], 'en' => [], 'de' => []];

        foreach ($fields as $field) {
            $out['ar'][$field] = $this->{$field.'_ar'} ?? '';
            $out['en'][$field] = $this->{$field.'_en'} ?? '';
            $out['de'][$field] = $this->{$field.'_de'} ?? '';
        }

        return $out;
    }
}
