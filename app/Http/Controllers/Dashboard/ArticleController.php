<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::ordered()->get();

        return view('dashboard.articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('dashboard.articles.show', compact('article'));
    }

    public function create(): View
    {
        return view('dashboard.articles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'slug_ar' => 'nullable|string|max:255|unique:articles,slug_ar',
            'slug_en' => 'nullable|string|max:255|unique:articles,slug_en',
            'category_ar' => 'nullable|string|max:255',
            'category_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['slug_ar'] = filled($validated['slug_ar'] ?? null) ? $validated['slug_ar'] : Str::slug($validated['title_ar']);
        $validated['slug_en'] = filled($validated['slug_en'] ?? null) ? $validated['slug_en'] : Str::slug($validated['title_en']);

        Article::create($validated);

        return redirect()->route('dashboard.articles.index')->with('success', 'تم إضافة المقال بنجاح');
    }

    public function edit(Article $article): View
    {
        return view('dashboard.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'slug_ar' => 'nullable|string|max:255|unique:articles,slug_ar,'.$article->id,
            'slug_en' => 'nullable|string|max:255|unique:articles,slug_en,'.$article->id,
            'category_ar' => 'nullable|string|max:255',
            'category_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['slug_ar'] = filled($validated['slug_ar'] ?? null) ? $validated['slug_ar'] : Str::slug($validated['title_ar']);
        $validated['slug_en'] = filled($validated['slug_en'] ?? null) ? $validated['slug_en'] : Str::slug($validated['title_en']);

        $article->update($validated);

        return redirect()->route('dashboard.articles.index')->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('dashboard.articles.index')->with('success', 'تم حذف المقال بنجاح');
    }
}
