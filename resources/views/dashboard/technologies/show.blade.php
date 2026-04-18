@extends('layouts.dashboard')

@section('title', 'عرض التقنية')

@section('content')
<div class="mb-8 flex justify-between items-start">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">{{ $technology->name_ar }}</h1>
        <p class="text-gray-500 mt-1" dir="ltr">{{ $technology->name_en }}@if($technology->name_de) · {{ $technology->name_de }}@endif</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('dashboard.technologies.edit', $technology) }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm">تعديل</a>
        <a href="{{ route('dashboard.technologies.index') }}" class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition text-sm">رجوع</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <dl class="space-y-4">
        <div>
            <dt class="text-sm font-medium text-gray-500">الاسم — عربي</dt>
            <dd class="mt-1 text-gray-800 font-medium" dir="rtl">{{ $technology->name_ar }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Name — English</dt>
            <dd class="mt-1 text-gray-800" dir="ltr">{{ $technology->name_en }}</dd>
        </div>
        @if($technology->name_de)
        <div>
            <dt class="text-sm font-medium text-gray-500">Name — Deutsch</dt>
            <dd class="mt-1 text-gray-800" dir="ltr">{{ $technology->name_de }}</dd>
        </div>
        @endif
        <div>
            <dt class="text-sm font-medium text-gray-500">الترتيب</dt>
            <dd class="mt-1 text-gray-800">{{ $technology->order }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الحالة</dt>
            <dd class="mt-1">
                <span class="px-3 py-1 rounded-full text-xs {{ $technology->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                    {{ $technology->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </dd>
        </div>
    </dl>
</div>
@endsection
