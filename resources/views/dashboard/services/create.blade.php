@extends('layouts.dashboard')

@section('title', 'إضافة خدمة')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">إضافة خدمة</h1>
    <p class="text-gray-500 mt-1">أضف خدمة جديدة للموقع</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('dashboard.services.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                <textarea name="description" rows="4" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الأيقونة (اختياري)</label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="مثال: database"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الترتيب</label>
                <input type="number" name="order" value="{{ old('order', 0) }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600">
                    <span class="text-sm text-gray-700">نشط</span>
                </label>
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
            <a href="{{ route('dashboard.services.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
