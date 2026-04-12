@extends('layouts.dashboard')

@section('title', 'عرض الشهادة')

@section('content')
<div class="mb-8 flex justify-between items-start">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">{{ $testimonial->name_ar }}</h1>
        <p class="text-gray-500 mt-1" dir="ltr">{{ $testimonial->name_en }}</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('dashboard.testimonials.edit', $testimonial) }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm">تعديل</a>
        <a href="{{ route('dashboard.testimonials.index') }}" class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition text-sm">رجوع</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl space-y-6">
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">المسمى — عربي / English</h3>
        <p class="text-gray-800" dir="rtl">{{ $testimonial->job_title_ar ?? '—' }}</p>
        <p class="text-gray-600 text-sm mt-1" dir="ltr">{{ $testimonial->job_title_en ?? '—' }}</p>
    </div>
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">الشهادة — عربي</h3>
        <p class="text-gray-800" dir="rtl">{{ $testimonial->quote_ar }}</p>
    </div>
    <div>
        <h3 class="text-sm font-medium text-gray-500 mb-2">Quote — English</h3>
        <p class="text-gray-800" dir="ltr">{{ $testimonial->quote_en }}</p>
    </div>
    <dl class="space-y-4 pt-4 border-t">
        <div>
            <dt class="text-sm font-medium text-gray-500">التقييم</dt>
            <dd class="mt-1 text-gray-800">{{ $testimonial->rating }}/5</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">الحالة</dt>
            <dd class="mt-1">
                <span class="px-3 py-1 rounded-full text-xs {{ $testimonial->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                    {{ $testimonial->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </dd>
        </div>
    </dl>
</div>
@endsection
