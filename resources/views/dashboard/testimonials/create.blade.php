@extends('layouts.dashboard')

@section('title', 'إضافة شهادة')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">إضافة شهادة</h1>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('dashboard.testimonials.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الاسم</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">المسمى (مثل: مدير شركة)</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الشهادة / الاقتباس</label>
                <textarea name="quote" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('quote') }}</textarea>
                @error('quote')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">التقييم (1-5)</label>
                <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
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
