<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->boolean('enabled')->default(1);
            $table->enum('role', ['user', 'office', 'admin'])->default('user');
            $table->string('lastlogin_ip')->nullable();
            $table->timestamp('lastlogin_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Administrator Man",
            'email' => 'a@a.a',
            'role' => 'admin',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('a'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
