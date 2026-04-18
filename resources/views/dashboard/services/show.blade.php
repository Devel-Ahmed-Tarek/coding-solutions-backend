@extends('layouts.dashboard')

@section('title', 'عرض الخدمة')

@section('content')
<div class="mb-8 flex justify-between items-start">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">{{ $service->title_ar }}</h1>
        <p class="text-gray-500 mt-1 text-sm" dir="ltr">{{ $service->title_en }}@if($service->title_de) · {{ $service->title_de }}@endif</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('dashboard.services.edit', $service) }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm">تعديل</a>
        <a href="{{ route('dashboard.services.index') }}" class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition text-sm">رجوع</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl space-y-6">
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">الوصف — عربي</h3>
        <p class="text-gray-800" dir="rtl">{{ $service->description_ar }}</p>
    </div>
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">Description — English</h3>
        <p class="text-gray-800" dir="ltr">{{ $service->description_en }}</p>
    </div>
    @if($service->description_de)
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">Beschreibung — Deutsch</h3>
        <p class="text-gray-800" dir="ltr">{{ $service->description_de }}</p>
    </div>
    @endif
    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t">
        <div>
            <dt class="text-sm font-medium text-gray-500">الأيقونة</dt>
            <dd class="mt-1">{{ $service->icon ?? '—' }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الترتيب</dt>
            <dd class="mt-1">{{ $service->order }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الحالة</dt>
            <dd class="mt-1">
                <span class="px-3 py-1 rounded-full text-xs {{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                    {{ $service->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </dd>
        </div>
    </dl>
</div>
@endsection
