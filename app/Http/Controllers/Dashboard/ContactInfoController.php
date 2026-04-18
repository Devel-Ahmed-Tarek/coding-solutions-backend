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
            'address_ar' => 'nullable|string',
            'address_en' => 'nullable|string',
            'address_de' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'company_name_ar' => 'nullable|string|max:255',
            'company_name_en' => 'nullable|string|max:255',
            'company_name_de' => 'nullable|string|max:255',
            'about_text_ar' => 'nullable|string',
            'about_text_en' => 'nullable|string',
            'about_text_de' => 'nullable|string',
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
