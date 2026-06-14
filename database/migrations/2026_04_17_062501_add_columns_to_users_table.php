<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'role')) {
            $table->string('role')->default('petugas')->after('email');
        }
        if (!Schema::hasColumn('users', 'status')) {
            $table->string('status')->default('active')->after('role');
        }
        if (!Schema::hasColumn('users', 'photo')) {
            $table->string('photo')->nullable()->after('status');
        }
    });
}
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
