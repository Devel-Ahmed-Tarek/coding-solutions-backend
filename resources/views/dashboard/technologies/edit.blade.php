@extends('layouts.dashboard')

@section('title', 'تعديل التقنية')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">تعديل التقنية</h1>
    <p class="text-gray-500 mt-1">{{ $technology->name_ar }} — {{ $technology->name_en }}</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('dashboard.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">العربية</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الاسم (عربي)</label>
                    <input type="text" name="name_ar" value="{{ old('name_ar', $technology->name_ar) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                    @error('name_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">English</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name (English)</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $technology->name_en) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                    @error('name_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الترتيب</label>
                <input type="number" name="order" value="{{ old('order', $technology->order) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $technology->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
                    <span class="text-sm text-gray-700">نشط</span>
                </label>
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
            <a href="{{ route('dashboard.technologies.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
