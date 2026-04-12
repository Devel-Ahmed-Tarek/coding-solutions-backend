<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
        });

        foreach (DB::table('services')->orderBy('id')->get() as $row) {
            DB::table('services')->where('id', $row->id)->update([
                'title_ar' => $row->title,
                'description_ar' => $row->description,
                'title_en' => $row->title,
                'description_en' => $row->description,
            ]);
        }

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });

        Schema::table('technologies', function (Blueprint $table) {
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
        });

        foreach (DB::table('technologies')->orderBy('id')->get() as $row) {
            DB::table('technologies')->where('id', $row->id)->update([
                'name_ar' => $row->name,
                'name_en' => $row->name,
            ]);
        }

        Schema::table('technologies', function (Blueprint $table) {
            $table->dropColumn('name');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('category_ar')->nullable();
            $table->string('category_en')->nullable();
        });

        foreach (DB::table('projects')->orderBy('id')->get() as $row) {
            DB::table('projects')->where('id', $row->id)->update([
                'title_ar' => $row->title,
                'title_en' => $row->title,
                'description_ar' => $row->description,
                'description_en' => $row->description,
                'category_ar' => $row->category,
                'category_en' => $row->category,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'category']);
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('job_title_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->text('quote_ar')->nullable();
            $table->text('quote_en')->nullable();
        });

        foreach (DB::table('testimonials')->orderBy('id')->get() as $row) {
            DB::table('testimonials')->where('id', $row->id)->update([
                'name_ar' => $row->name,
                'name_en' => $row->name,
                'job_title_ar' => $row->title,
                'job_title_en' => $row->title,
                'quote_ar' => $row->quote,
                'quote_en' => $row->quote,
            ]);
        }

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['name', 'title', 'quote']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('category_ar')->nullable();
            $table->string('category_en')->nullable();
        });

        foreach (DB::table('articles')->orderBy('id')->get() as $row) {
            DB::table('articles')->where('id', $row->id)->update([
                'title_ar' => $row->title,
                'title_en' => $row->title,
                'description_ar' => $row->description,
                'description_en' => $row->description,
                'slug_ar' => $row->slug,
                'slug_en' => $row->slug.'-en-'.$row->id,
                'category_ar' => $row->category,
                'category_en' => $row->category,
            ]);
        }

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'slug', 'category']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->unique('slug_ar');
            $table->unique('slug_en');
        });

        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('company_name_ar')->nullable();
            $table->string('company_name_en')->nullable();
            $table->text('about_text_ar')->nullable();
            $table->text('about_text_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
        });

        foreach (DB::table('contact_infos')->orderBy('id')->get() as $row) {
            DB::table('contact_infos')->where('id', $row->id)->update([
                'company_name_ar' => $row->company_name,
                'company_name_en' => $row->company_name,
                'about_text_ar' => $row->about_text,
                'about_text_en' => $row->about_text,
                'address_ar' => $row->address,
                'address_en' => $row->address,
            ]);
        }

        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'about_text', 'address']);
        });
    }

    public function down(): void
    {
        //
    }
};
