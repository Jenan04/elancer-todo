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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                  ->after('id')
                  ->constrained()
                  ->cascadeOnDelete(); 


            $table->string('client_or_project')->nullable()->after('description');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium')->nullable()->after('status');
            $table->dateTime('due_at')->nullable()->after('completed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            
            $table->dropColumn([
                'user_id',
                'client_or_project',
                'priority',
                'due_at'
            ]);
        });
    }
};
