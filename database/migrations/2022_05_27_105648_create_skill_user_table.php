<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("skill_id");
            $table->foreign("skill_id")->references("id")->on("skills")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->integer("point")->default(1);
			$table->integer("pending_point")->nullable();
            $table->boolean("is_approved")->nullable();
            $table->unsignedBigInteger("approve_user_id")->nullable();
            $table->foreign("approve_user_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamp("request_at")->nullable();
            $table->timestamp("approved_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_user');
    }
};
