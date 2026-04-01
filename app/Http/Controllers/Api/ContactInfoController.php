<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactInfoResource;
use App\Models\ContactInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactInfoController extends Controller
{
    public function show(): JsonResource
    {
        $contact = ContactInfo::first();

        return new ContactInfoResource($contact ?? new ContactInfo);
    }
}
