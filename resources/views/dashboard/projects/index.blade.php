@extends('layouts.dashboard')

@section('title', 'المشاريع')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">المشاريع</h1>
        <p class="text-gray-500 mt-1">إدارة المشاريع المعروضة في الموقع</p>
    </div>
    <a href="{{ route('dashboard.projects.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium">إضافة مشروع</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">العنوان</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">الفئة</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">التقنيات</th>
                <th class="text-right px-6 py-4 text-sm font-medium text-gray-600">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $project->title_ar }}</div>
                    <div class="text-xs text-gray-500" dir="ltr">{{ $project->title_en }}</div>
                </td>
                <td class="px-6 py-4">
                    <div>{{ $project->category_ar ?? '—' }}</div>
                    <div class="text-xs text-gray-500" dir="ltr">{{ $project->category_en ?? '' }}</div>
                </td>
                <td class="px-6 py-4 text-sm">{{ $project->technologies->pluck('name_ar')->join(', ') ?: '—' }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.projects.show', $project) }}" class="text-gray-600 hover:underline ml-4">عرض</a>
                    <a href="{{ route('dashboard.projects.edit', $project) }}" class="text-blue-600 hover:underline ml-4">تعديل</a>
                    <form action="{{ route('dashboard.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500">لا توجد مشاريع</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
