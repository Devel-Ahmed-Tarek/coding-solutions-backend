@extends('layouts.dashboard')

@section('title', 'بيانات التواصل')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">بيانات التواصل</h1>
    <p class="text-gray-500 mt-1">معلومات الشركة وطرق التواصل (عربي / إنجليزي / ألماني)</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('dashboard.contact.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">اسم الشركة</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">اسم الشركة (عربي)</label>
                        <input type="text" name="company_name_ar" value="{{ old('company_name_ar', $contact->company_name_ar) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Company name (English)</label>
                        <input type="text" name="company_name_en" value="{{ old('company_name_en', $contact->company_name_en) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Firmenname (Deutsch, optional)</label>
                        <input type="text" name="company_name_de" value="{{ old('company_name_de', $contact->company_name_de) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">وسائل التواصل المباشرة</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الهاتف</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">واتساب</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">العنوان</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان (عربي)</label>
                        <textarea name="address_ar" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">{{ old('address_ar', $contact->address_ar) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address (English)</label>
                        <textarea name="address_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('address_en', $contact->address_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Adresse (Deutsch, optional)</label>
                        <textarea name="address_de" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('address_de', $contact->address_de) }}</textarea>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">نص من نحن</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">من نحن (عربي)</label>
                        <textarea name="about_text_ar" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="rtl">{{ old('about_text_ar', $contact->about_text_ar) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">About (English)</label>
                        <textarea name="about_text_en" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('about_text_en', $contact->about_text_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Über uns (Deutsch, optional)</label>
                        <textarea name="about_text_de" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none" dir="ltr">{{ old('about_text_de', $contact->about_text_de) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">فيسبوك</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $contact->facebook) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تويتر</label>
                    <input type="url" name="twitter" value="{{ old('twitter', $contact->twitter) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">لينكد إن</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $contact->linkedin) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">انستغرام</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $contact->instagram) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">يوتيوب</label>
                    <input type="url" name="youtube" value="{{ old('youtube', $contact->youtube) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                </div>
            </div>
        </div>
        <div class="mt-8">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
        </div>
    </form>
</div>
@endsection
