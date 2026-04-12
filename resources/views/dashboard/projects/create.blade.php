@extends('layouts.dashboard')

@section('title', 'إضافة مشروع')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">إضافة مشروع</h1>
    <p class="text-gray-500 mt-1">العربية والإنجليزية</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">العربية</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان (عربي)</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                        @error('title_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف (عربي)</label>
                        <textarea name="description_ar" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">{{ old('description_ar') }}</textarea>
                        @error('description_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الفئة (عربي)</label>
                        <input type="text" name="category_ar" value="{{ old('category_ar') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl" placeholder="تجارة إلكترونية">
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">English</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title (English)</label>
                        <input type="text" name="title_en" value="{{ old('title_en') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                        @error('title_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                        <textarea name="description_en" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('description_en') }}</textarea>
                        @error('description_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category (English)</label>
                        <input type="text" name="category_en" value="{{ old('category_en') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr" placeholder="E-commerce">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الرابط</label>
                <input type="url" name="link" value="{{ old('link') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الترتيب</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
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
                        <span>{{ $tech->name_ar }} <span class="text-gray-400 text-xs" dir="ltr">({{ $tech->name_en }})</span></span>
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
