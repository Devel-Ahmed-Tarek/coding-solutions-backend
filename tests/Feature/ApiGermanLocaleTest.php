<?php

use App\Models\Article;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('services api returns german title when lang=de', function () {
    Service::create([
        'icon' => null,
        'title_ar' => 'عربي',
        'title_en' => 'English',
        'title_de' => 'Deutsch Titel',
        'description_ar' => 'وصف',
        'description_en' => 'Desc',
        'description_de' => 'Beschreibung',
        'order' => 0,
        'is_active' => true,
    ]);

    $response = $this->getJson('/api/services?lang=de');

    $response->assertSuccessful();
    expect($response->json('data.0.locale'))->toBe('de')
        ->and($response->json('data.0.title'))->toBe('Deutsch Titel');
});

test('article api resolves slug_de when lang=de', function () {
    Article::create([
        'title_ar' => 'عنوان',
        'title_en' => 'Title',
        'title_de' => 'Titel',
        'description_ar' => 'وصف',
        'description_en' => 'Desc',
        'description_de' => 'Beschreibung',
        'slug_ar' => 'slug-ar',
        'slug_en' => 'slug-en',
        'slug_de' => 'slug-de',
        'category_ar' => null,
        'category_en' => null,
        'category_de' => null,
        'icon' => null,
        'image' => null,
        'order' => 0,
        'is_active' => true,
        'published_at' => now(),
    ]);

    $response = $this->getJson('/api/articles/slug-de?lang=de');

    $response->assertSuccessful();
    expect($response->json('data.title'))->toBe('Titel')
        ->and($response->json('data.slug'))->toBe('slug-de');
});
