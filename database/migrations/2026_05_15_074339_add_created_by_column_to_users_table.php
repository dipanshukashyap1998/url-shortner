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
        Schema::table('users', function (Blueprint $table) {
             $table->foreignId('created_by')
                  ->nullable()
                  ->after('id'); // Optional: position

            // Then add the self-referential foreign key
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null'); // Or cascade

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
   // Drop foreign key first
            $table->dropForeign(['created_by']);

            // Then drop the column
            $table->dropColumn('created_by');        });
    }
};
