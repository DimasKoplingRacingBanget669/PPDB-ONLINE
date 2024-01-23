<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $hashedPassword = bcrypt($user->password);
            DB::table('users')->where('id', $user->id)->update(['password' => $hashedPassword]);
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bcrypt', function (Blueprint $table) {
            //
        });
    }
};
