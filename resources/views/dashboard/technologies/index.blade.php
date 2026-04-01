@extends('layouts.dashboard')

@section('title', 'التقنيات')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">التقنيات</h1>
        <p class="text-gray-500 mt-1">إدارة التقنيات المستخدمة في المشاريع</p>
    </div>
    <a href="{{ route('dashboard.technologies.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium">إضافة تقنية</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الاسم</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الترتيب</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($technologies as $tech)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $tech->name }}</td>
                <td class="px-6 py-4">{{ $tech->order }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.technologies.show', $tech) }}" class="text-gray-600 hover:underline ml-4">عرض</a>
                    <a href="{{ route('dashboard.technologies.edit', $tech) }}" class="text-blue-600 hover:underline ml-4">تعديل</a>
                    <form action="{{ route('dashboard.technologies.destroy', $tech) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-6 py-12 text-center text-gray-500">لا توجد تقنيات</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
