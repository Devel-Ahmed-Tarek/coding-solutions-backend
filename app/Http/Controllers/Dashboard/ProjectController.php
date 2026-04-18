<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Technology;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::ordered()->with(['technologies', 'images'])->get();

        return view('dashboard.projects.index', compact('projects'));
    }

    public function show(Project $project): View
    {
        $project->load(['technologies', 'images']);

        return view('dashboard.projects.show', compact('project'));
    }

    public function create(): View
    {
        $technologies = Technology::ordered()->get();

        return view('dashboard.projects.create', compact('technologies'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_de' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'category_ar' => 'nullable|string|max:255',
            'category_en' => 'nullable|string|max:255',
            'category_de' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $technologies = $validated['technologies'] ?? [];
        unset($validated['technologies']);

        $project = Project::create($validated);
        $project->technologies()->sync($technologies);

        $files = $request->file('images', []);
        $validFiles = is_array($files) ? array_filter($files, fn ($f) => $f && $f->isValid()) : [];
        if (count($validFiles) > 0) {
            $paths = FileUploadService::uploadMany($validFiles, 'projects');
            foreach ($paths as $order => $path) {
                $project->images()->create(['path' => $path, 'order' => $order]);
            }
        }

        return redirect()->route('dashboard.projects.index')->with('success', 'تم إضافة المشروع بنجاح');
    }

    public function edit(Project $project): View
    {
        $project->load('images');
        $technologies = Technology::ordered()->get();

        return view('dashboard.projects.edit', compact('project', 'technologies'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_de' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'category_ar' => 'nullable|string|max:255',
            'category_en' => 'nullable|string|max:255',
            'category_de' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $technologies = $validated['technologies'] ?? [];
        unset($validated['technologies']);

        $project->update($validated);
        $project->technologies()->sync($technologies);

        $files = $request->file('images', []);
        $validFiles = is_array($files) ? array_filter($files, fn ($f) => $f && $f->isValid()) : [];
        if (count($validFiles) > 0) {
            $paths = FileUploadService::uploadMany($validFiles, 'projects');
            $startOrder = $project->images()->max('order') ?? -1;
            foreach ($paths as $i => $path) {
                $project->images()->create(['path' => $path, 'order' => $startOrder + 1 + $i]);
            }
        }

        return redirect()->route('dashboard.projects.index')->with('success', 'تم تحديث المشروع بنجاح');
    }

    public function destroy(Project $project): RedirectResponse
    {
        foreach ($project->images as $img) {
            FileUploadService::delete($img->path);
        }
        $project->delete();

        return redirect()->route('dashboard.projects.index')->with('success', 'تم حذف المشروع بنجاح');
    }

    public function destroyImage(Project $project, ProjectImage $image): RedirectResponse
    {
        if ($image->project_id !== $project->id) {
            abort(404);
        }
        FileUploadService::delete($image->path);
        $image->delete();

        return back()->with('success', 'تم حذف الصورة');
    }
}
