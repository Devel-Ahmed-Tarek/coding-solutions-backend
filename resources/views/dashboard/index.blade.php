@extends('layouts.dashboard')

@section('title', 'لوحة التحكم')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">لوحة التحكم</h1>
    <p class="text-gray-500 mt-1">مرحباً بك في لوحة التحكم</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
    <a href="{{ route('dashboard.services.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 mb-4">📋</div>
        <h3 class="font-semibold text-gray-800">الخدمات</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $servicesCount }}</p>
    </a>
    <a href="{{ route('dashboard.projects.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 mb-4">📁</div>
        <h3 class="font-semibold text-gray-800">المشاريع</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $projectsCount }}</p>
    </a>
    <a href="{{ route('dashboard.technologies.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 mb-4">⚙️</div>
        <h3 class="font-semibold text-gray-800">التقنيات</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $technologiesCount }}</p>
    </a>
    <a href="{{ route('dashboard.testimonials.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 mb-4">⭐</div>
        <h3 class="font-semibold text-gray-800">الشهادات</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $testimonialsCount }}</p>
    </a>
    <a href="{{ route('dashboard.articles.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 mb-4">📝</div>
        <h3 class="font-semibold text-gray-800">المقالات</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $articlesCount }}</p>
    </a>
</div>

<div class="mt-12 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <h2 class="font-semibold text-gray-800 mb-4">روابط API</h2>
    <p class="text-gray-500 mb-4">يمكن استهلاك البيانات عبر الـ API التالية:</p>
    <div class="space-y-2 font-mono text-sm bg-gray-50 rounded-xl p-4">
        <p><span class="text-blue-600">GET</span> /api/services</p>
        <p><span class="text-blue-600">GET</span> /api/projects</p>
        <p><span class="text-blue-600">GET</span> /api/technologies</p>
        <p><span class="text-blue-600">GET</span> /api/testimonials</p>
        <p><span class="text-blue-600">GET</span> /api/articles</p>
        <p><span class="text-blue-600">GET</span> /api/articles/{slug}</p>
        <p><span class="text-blue-600">GET</span> /api/contact</p>
    </div>
</div>
@endsection
