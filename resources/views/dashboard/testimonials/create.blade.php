@extends('layouts.dashboard')

@section('title', 'إضافة شهادة')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">إضافة شهادة</h1>
    <p class="text-gray-500 mt-1">العربية والإنجليزية</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('dashboard.testimonials.store') }}" method="POST">
        @csrf
        <div class="space-y-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">العربية</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الاسم (عربي)</label>
                        <input type="text" name="name_ar" value="{{ old('name_ar') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                        @error('name_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">المسمى الوظيفي (عربي)</label>
                        <input type="text" name="job_title_ar" value="{{ old('job_title_ar') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl" placeholder="مدير شركة">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الشهادة / الاقتباس (عربي)</label>
                        <textarea name="quote_ar" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">{{ old('quote_ar') }}</textarea>
                        @error('quote_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">English</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name (English)</label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                        @error('name_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Job title (English)</label>
                        <input type="text" name="job_title_en" value="{{ old('job_title_en') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr" placeholder="CEO">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Quote (English)</label>
                        <textarea name="quote_en" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('quote_en') }}</textarea>
                        @error('quote_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">التقييم (1-5)</label>
                <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الرمزية (رابط اختياري)</label>
                <input type="text" name="avatar" value="{{ old('avatar') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الترتيب</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
                    <span class="text-sm text-gray-700">نشط</span>
                </label>
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
            <a href="{{ route('dashboard.testimonials.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
