<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('title_de')->nullable();
            $table->text('description_de')->nullable();
            $table->string('slug_de')->nullable();
            $table->string('category_de')->nullable();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->unique('slug_de');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('title_de')->nullable();
            $table->text('description_de')->nullable();
        });

        Schema::table('technologies', function (Blueprint $table) {
            $table->string('name_de')->nullable();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_de')->nullable();
            $table->text('description_de')->nullable();
            $table->string('category_de')->nullable();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name_de')->nullable();
            $table->string('job_title_de')->nullable();
            $table->text('quote_de')->nullable();
        });

        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('company_name_de')->nullable();
            $table->text('about_text_de')->nullable();
            $table->text('address_de')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropUnique(['slug_de']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'title_de',
                'description_de',
                'slug_de',
                'category_de',
            ]);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title_de', 'description_de']);
        });

        Schema::table('technologies', function (Blueprint $table) {
            $table->dropColumn('name_de');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_de', 'description_de', 'category_de']);
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['name_de', 'job_title_de', 'quote_de']);
        });

        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn(['company_name_de', 'about_text_de', 'address_de']);
        });
    }
};
