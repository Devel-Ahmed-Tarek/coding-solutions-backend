<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    public function index(): View
    {
        $technologies = Technology::ordered()->get();

        return view('dashboard.technologies.index', compact('technologies'));
    }

    public function show(Technology $technology): View
    {
        return view('dashboard.technologies.show', compact('technology'));
    }

    public function create(): View
    {
        return view('dashboard.technologies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Technology::create($validated);

        return redirect()->route('dashboard.technologies.index')->with('success', 'تم إضافة التقنية بنجاح');
    }

    public function edit(Technology $technology): View
    {
        return view('dashboard.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology): RedirectResponse
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $technology->update($validated);

        return redirect()->route('dashboard.technologies.index')->with('success', 'تم تحديث التقنية بنجاح');
    }

    public function destroy(Technology $technology): RedirectResponse
    {
        $technology->delete();

        return redirect()->route('dashboard.technologies.index')->with('success', 'تم حذف التقنية بنجاح');
    }
}
