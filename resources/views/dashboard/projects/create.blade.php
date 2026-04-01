@extends('layouts.dashboard')

@section('title', 'إضافة مشروع')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">إضافة مشروع</h1>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('description') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الفئة (مثل: E-commerce, CRM)</label>
                <input type="text" name="category" value="{{ old('category') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الرابط</label>
                <input type="url" name="link" value="{{ old('link') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">صور المشروع (يمكن اختيار أكثر من صورة)</label>
                <input type="file" name="images[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                <p class="text-gray-500 text-sm mt-1">jpeg, png, jpg, gif, webp — الحد الأقصى 5 ميجا للصورة</p>
                @error('images.*')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">التقنيات</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($technologies as $tech)
                    <label class="flex items-center gap-2 px-3 py-2 bg-gray-50 rounded-lg">
                        <input type="checkbox" name="technologies[]" value="{{ $tech->id }}" class="rounded border-gray-300 text-blue-600">
                        <span>{{ $tech->name }}</span>
                    </label>
                    @endforeach
                </div>
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
            <a href="{{ route('dashboard.projects.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
