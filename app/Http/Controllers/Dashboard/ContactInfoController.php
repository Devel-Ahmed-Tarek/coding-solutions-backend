<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactInfoController extends Controller
{
    public function edit(): View
    {
        $contact = ContactInfo::first() ?? new ContactInfo;

        return view('dashboard.contact.edit', compact('contact'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'logo' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'about_text' => 'nullable|string',
        ]);

        $contact = ContactInfo::first();

        if ($contact) {
            $contact->update($validated);
        } else {
            ContactInfo::create($validated);
        }

        return redirect()->route('dashboard.contact.edit')->with('success', 'تم تحديث بيانات التواصل بنجاح');
    }
}
