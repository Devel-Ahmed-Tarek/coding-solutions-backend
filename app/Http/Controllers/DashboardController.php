<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContactInfo;
use App\Models\Project;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index', [
            'servicesCount' => Service::count(),
            'projectsCount' => Project::count(),
            'technologiesCount' => Technology::count(),
            'testimonialsCount' => Testimonial::count(),
            'articlesCount' => Article::count(),
        ]);
    }
}
