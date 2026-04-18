@extends('layouts.dashboard')

@section('title', 'المقالات')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">المقالات</h1>
        <p class="text-gray-500 mt-1">إدارة المقالات والمدونة</p>
    </div>
    <a href="{{ route('dashboard.articles.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium">إضافة مقال</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">العنوان</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الفئة</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الروابط (slug)</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($articles as $article)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $article->title_ar }}</div>
                    <div class="text-xs text-gray-500" dir="ltr">{{ $article->title_en }}</div>
                    @if($article->title_de)<div class="text-xs text-gray-400" dir="ltr">{{ $article->title_de }}</div>@endif
                </td>
                <td class="px-6 py-4">
                    <div>{{ $article->category_ar ?? '—' }}</div>
                    <div class="text-xs text-gray-500" dir="ltr">{{ $article->category_en ?? '' }}</div>
                </td>
                <td class="px-6 py-4 text-xs font-mono">
                    <div dir="rtl">{{ $article->slug_ar }}</div>
                    <div dir="ltr" class="text-gray-500">{{ $article->slug_en }}@if($article->slug_de) / {{ $article->slug_de }}@endif</div>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.articles.show', $article) }}" class="text-gray-600 hover:underline ml-4">عرض</a>
                    <a href="{{ route('dashboard.articles.edit', $article) }}" class="text-blue-600 hover:underline ml-4">تعديل</a>
                    <form action="{{ route('dashboard.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500">لا توجد مقالات</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
