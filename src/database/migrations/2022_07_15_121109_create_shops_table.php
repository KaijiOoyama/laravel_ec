<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId("owner_id")
            ->constrained()
            ->onUpdate('cascade') // 外部キー制約を設けた場合リレーション先が削除、更新されたばあいも自動でへんこうが入るようにしておく。
            ->onDelete('cascade');
            $table->string("name");
            $table->text("information");
            $table->string("filename");
            $table->boolean("is_selling");
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
        Schema::dropIfExists('shops');
    }
}
