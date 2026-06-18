<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['show_contact', 'show_social_media']);
            
            $table->boolean('show_address')->default(true);
            $table->boolean('show_email')->default(true);
            $table->boolean('show_phone')->default(true);
            $table->boolean('show_instagram')->default(true);
            $table->boolean('show_facebook')->default(true);
            $table->boolean('show_whatsapp')->default(true);
            $table->boolean('show_youtube')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('show_contact')->default(true);
            $table->boolean('show_social_media')->default(true);

            $table->dropColumn([
                'show_address',
                'show_email',
                'show_phone',
                'show_instagram',
                'show_facebook',
                'show_whatsapp',
                'show_youtube',
            ]);
        });
    }
};
