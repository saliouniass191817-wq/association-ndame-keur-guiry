<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('second_name')->nullable()->after('first_name');
            $table->enum('sex', ['homme', 'femme'])->nullable()->after('role');
            $table->string('civility')->nullable()->after('sex');
            $table->string('profession')->nullable()->after('civility');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['second_name', 'sex', 'civility', 'profession']);
        });
    }
};
