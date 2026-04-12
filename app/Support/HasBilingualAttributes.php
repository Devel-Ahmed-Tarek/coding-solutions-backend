<?php

namespace App\Support;

trait HasBilingualAttributes
{
    /**
     * @param  array<int, string>  $fields
     */
    public function localizedValue(string $field): string
    {
        $locale = app()->getLocale();
        $ar = $this->{$field.'_ar'} ?? null;
        $en = $this->{$field.'_en'} ?? null;

        if ($locale === 'en') {
            return (string) ($en !== null && $en !== '' ? $en : $ar ?? '');
        }

        return (string) ($ar !== null && $ar !== '' ? $ar : $en ?? '');
    }

    /**
     * @param  array<int, string>  $fields
     */
    public function translationsFor(array $fields): array
    {
        $out = ['ar' => [], 'en' => []];

        foreach ($fields as $field) {
            $out['ar'][$field] = $this->{$field.'_ar'} ?? '';
            $out['en'][$field] = $this->{$field.'_en'} ?? '';
        }

        return $out;
    }
}
