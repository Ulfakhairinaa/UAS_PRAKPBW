<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
        $table->string('full_name')->after('event_id');
        $table->string('email')->after('full_name');
        $table->string('phone')->after('email');
        $table->string('institution')->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'email',
                'phone',
                'institution',

            ]);
        });
    }
};