<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'لوحة التحكم') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [dir="rtl"] { font-family: 'Instrument Sans', 'Segoe UI', Tahoma, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-l border-gray-200 min-h-screen shadow-sm flex flex-col">
            <div class="p-6 border-b border-gray-100">
                <a href="{{ route('dashboard.index') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold">S</div>
                    <span class="font-semibold text-gray-800">CODING SOLUTIONS</span>
                </a>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>🏠</span>
                    <span>الرئيسية</span>
                </a>
                <a href="{{ route('dashboard.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>📋</span>
                    <span>الخدمات</span>
                </a>
                <a href="{{ route('dashboard.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>📁</span>
                    <span>المشاريع</span>
                </a>
                <a href="{{ route('dashboard.technologies.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>⚙️</span>
                    <span>التقنيات</span>
                </a>
                <a href="{{ route('dashboard.testimonials.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>⭐</span>
                    <span>الشهادات</span>
                </a>
                <a href="{{ route('dashboard.articles.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>📝</span>
                    <span>المقالات</span>
                </a>
                <a href="{{ route('dashboard.contact.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span>📞</span>
                    <span>بيانات التواصل</span>
                </a>
            </nav>
            <div class="mt-auto p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-red-50 hover:text-red-600 transition w-full">
                        <span>🚪</span>
                        <span>تسجيل الخروج</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
