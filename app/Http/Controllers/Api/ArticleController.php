<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $articles = Article::active()->ordered()->get();

        return ArticleResource::collection($articles);
    }

    public function show(string $slug): JsonResource
    {
        $article = Article::active()
            ->where(function ($q) use ($slug) {
                $q->where('slug_ar', $slug)
                    ->orWhere('slug_en', $slug)
                    ->orWhere('slug_de', $slug);
            })
            ->firstOrFail();

        return new ArticleResource($article);
    }
}
