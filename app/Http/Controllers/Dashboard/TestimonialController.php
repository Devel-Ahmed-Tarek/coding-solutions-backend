<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::ordered()->get();

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function show(Testimonial $testimonial): View
    {
        return view('dashboard.testimonials.show', compact('testimonial'));
    }

    public function create(): View
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'avatar' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['rating'] = $validated['rating'] ?? 5;

        Testimonial::create($validated);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم إضافة الشهادة بنجاح');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'avatar' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['rating'] = $validated['rating'] ?? 5;

        $testimonial->update($validated);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم تحديث الشهادة بنجاح');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم حذف الشهادة بنجاح');
    }
}
