@extends('layouts.dashboard')

@section('title', 'عرض المقال')

@section('content')
<div class="mb-8 flex justify-between items-start">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">{{ $article->title_ar }}</h1>
        <p class="text-gray-500 mt-1" dir="ltr">{{ $article->title_en }}</p>
        @if($article->title_de)
        <p class="text-gray-500 mt-1 text-sm" dir="ltr">{{ $article->title_de }}</p>
        @endif
    </div>
    <div class="flex gap-2">
        <a href="{{ route('dashboard.articles.edit', $article) }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm">تعديل</a>
        <a href="{{ route('dashboard.articles.index') }}" class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition text-sm">رجوع</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl space-y-6">
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">الوصف — عربي</h3>
        <p class="text-gray-800 whitespace-pre-wrap" dir="rtl">{{ $article->description_ar }}</p>
    </div>
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">Description — English</h3>
        <p class="text-gray-800 whitespace-pre-wrap" dir="ltr">{{ $article->description_en }}</p>
    </div>
    @if($article->description_de)
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">Beschreibung — Deutsch</h3>
        <p class="text-gray-800 whitespace-pre-wrap" dir="ltr">{{ $article->description_de }}</p>
    </div>
    @endif
    <dl class="space-y-4 pt-4 border-t">
        <div>
            <dt class="text-sm font-medium text-gray-500">Slug — عربي / English / Deutsch</dt>
            <dd class="mt-1 font-mono text-sm"><span dir="rtl">{{ $article->slug_ar }}</span> / <span dir="ltr">{{ $article->slug_en }}</span>@if($article->slug_de) / <span dir="ltr">{{ $article->slug_de }}</span>@endif</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الفئة</dt>
            <dd class="mt-1">{{ $article->category_ar ?? '—' }} / <span dir="ltr">{{ $article->category_en ?? '—' }}</span>@if($article->category_de) / <span dir="ltr">{{ $article->category_de }}</span>@endif</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">تاريخ النشر</dt>
            <dd class="mt-1 text-gray-800">{{ $article->published_at?->format('Y-m-d H:i') ?? '—' }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الحالة</dt>
            <dd class="mt-1">
                <span class="px-3 py-1 rounded-full text-xs {{ $article->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                    {{ $article->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </dd>
        </div>
    </dl>
</div>
@endsection
