@extends('layouts.dashboard')

@section('title', 'بيانات التواصل')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">بيانات التواصل</h1>
    <p class="text-gray-500 mt-1">معلومات الشركة وطرق التواصل</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('dashboard.contact.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">اسم الشركة</label>
                <input type="text" name="company_name" value="{{ old('company_name', $contact->company_name) }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
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
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
                <textarea name="address" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('address', $contact->address) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">نص من نحن</label>
                <textarea name="about_text" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('about_text', $contact->about_text) }}</textarea>
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
            </div>
        </div>
        <div class="mt-8">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">حفظ</button>
        </div>
    </form>
</div>
@endsection
