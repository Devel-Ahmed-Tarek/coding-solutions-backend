@extends('layouts.dashboard')

@section('title', 'الخدمات')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">الخدمات</h1>
        <p class="text-gray-500 mt-1">إدارة الخدمات المعروضة في الموقع</p>
    </div>
    <a href="{{ route('dashboard.services.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium">
        إضافة خدمة
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">العنوان</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الترتيب</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الحالة</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($services as $service)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $service->title_ar }}</div>
                    <div class="text-xs text-gray-500" dir="ltr">{{ $service->title_en }}</div>
                </td>
                <td class="px-6 py-4">{{ $service->order }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs {{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $service->is_active ? 'نشط' : 'غير نشط' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.services.show', $service) }}" class="text-gray-600 hover:underline ml-4">عرض</a>
                    <a href="{{ route('dashboard.services.edit', $service) }}" class="text-blue-600 hover:underline ml-4">تعديل</a>
                    <form action="{{ route('dashboard.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center text-gray-500">لا توجد خدمات</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
