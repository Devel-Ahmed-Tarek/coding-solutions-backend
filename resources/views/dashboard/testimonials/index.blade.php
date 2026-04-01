@extends('layouts.dashboard')

@section('title', 'الشهادات')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">الشهادات</h1>
        <p class="text-gray-500 mt-1">آراء العملاء</p>
    </div>
    <a href="{{ route('dashboard.testimonials.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium">إضافة شهادة</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الاسم</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">المسمى</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">التقييم</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($testimonials as $t)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $t->name }}</td>
                <td class="px-6 py-4">{{ $t->title ?? '-' }}</td>
                <td class="px-6 py-4">{{ $t->rating }}/5</td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.testimonials.show', $t) }}" class="text-gray-600 hover:underline ml-4">عرض</a>
                    <a href="{{ route('dashboard.testimonials.edit', $t) }}" class="text-blue-600 hover:underline ml-4">تعديل</a>
                    <form action="{{ route('dashboard.testimonials.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500">لا توجد شهادات</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
