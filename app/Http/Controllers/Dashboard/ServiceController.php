<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::ordered()->get();

        return view('dashboard.services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        return view('dashboard.services.show', compact('service'));
    }

    public function create(): View
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Service::create($validated);

        return redirect()->route('dashboard.services.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit(Service $service): View
    {
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $service->update($validated);

        return redirect()->route('dashboard.services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('dashboard.services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}
