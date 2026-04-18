@extends('layouts.dashboard')

@section('title', 'تعديل المشروع')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">تعديل المشروع</h1>
    <p class="text-gray-500 mt-1">{{ $project->title_ar }}</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('dashboard.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">العربية</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان (عربي)</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', $project->title_ar) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                        @error('title_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف (عربي)</label>
                        <textarea name="description_ar" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">{{ old('description_ar', $project->description_ar) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الفئة (عربي)</label>
                        <input type="text" name="category_ar" value="{{ old('category_ar', $project->category_ar) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">English</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title (English)</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $project->title_en) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                        @error('title_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                        <textarea name="description_en" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('description_en', $project->description_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category (English)</label>
                        <input type="text" name="category_en" value="{{ old('category_en', $project->category_en) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Deutsch</h2>
                <p class="text-sm text-gray-500 mb-4">اختياري</p>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Titel (Deutsch)</label>
                        <input type="text" name="title_de" value="{{ old('title_de', $project->title_de) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                        @error('title_de')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Beschreibung (Deutsch)</label>
                        <textarea name="description_de" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('description_de', $project->description_de) }}</textarea>
                        @error('description_de')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategorie (Deutsch)</label>
                        <input type="text" name="category_de" value="{{ old('category_de', $project->category_de) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الرابط</label>
                <input type="url" name="link" value="{{ old('link', $project->link) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الترتيب</label>
                <input type="number" name="order" value="{{ old('order', $project->order) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">إضافة صور جديدة</label>
                <input type="file" name="images[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                <p class="text-gray-500 text-sm mt-1">jpeg, png, jpg, gif, webp — الحد الأقصى 5 ميجا للصورة</p>
                @error('images.*')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">التقنيات</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($technologies as $tech)
                    <label class="flex items-center gap-2 px-3 py-2 bg-gray-50 rounded-lg">
                        <input type="checkbox" name="technologies[]" value="{{ $tech->id }}" {{ $project->technologies->contains($tech) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
                        <span>{{ $tech->name_ar }} <span class="text-gray-400 text-xs" dir="ltr">({{ $tech->name_en }}@if($tech->name_de) / {{ $tech->name_de }}@endif)</span></span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
                    <span class="text-sm text-gray-700">نشط</span>
                </label>
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
            <a href="{{ route('dashboard.projects.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition">إلغاء</a>
        </div>
    </form>

    @if($project->images->isNotEmpty())
    <div class="mt-8 pt-8 border-t border-gray-100">
        <label class="block text-sm font-medium text-gray-700 mb-2">الصور الحالية (حذف من زر ×)</label>
        <div class="flex flex-wrap gap-4">
            @foreach($project->images as $img)
            <div class="relative">
                <img src="{{ asset('storage/' . $img->path) }}" alt="" class="w-24 h-24 object-cover rounded-lg border border-gray-200">
                <form action="{{ route('dashboard.projects.images.destroy', [$project, $img]) }}" method="POST" class="absolute -top-2 -left-2" onsubmit="return confirm('حذف الصورة؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">×</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
