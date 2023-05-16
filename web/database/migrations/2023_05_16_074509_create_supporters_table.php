<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            if (env("SUPP_AUTO_ACTIVATE", false) === true) {
                $table->enum("status", ["pending", "active", "inactive"])->default("active");
            } else {
                $table->enum("status", ["pending", "active", "inactive"])->default("pending");
            }
            $table->string("email")->unique();
            $table->json("data")->nullable()->default(json_encode([]));
            if (env("SUPP_EMAIL_VERIFICATION", false) === false) {
                $table->string("email_verified_at")->nullable()->default(DB::raw("CURRENT_TIMESTAMP"));
                $table->string("email_verification_token")->nullable()->default(1);
            } else {
                $table->dateTime("email_verified_at")->nullable()->default(null);
                $table->string("email_verification_token");
            }
            $table->boolean("public")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supporters');
    }
};
