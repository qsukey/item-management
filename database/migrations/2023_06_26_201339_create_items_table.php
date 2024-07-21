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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name', 100)->index()->comment('写真の題名');
            $table->integer('recommend')->default(0)->comment('5段階評価');
            $table->enum('category', ['自然', 'グルメ', '動物', '人物', '建造物', 'その他'])->comment('種別');
            $table->text('about')->nullable()->comment('説明文');
            $table->longText('image')->nullable()->comment('画像');
            $table->timestamps(); // created_at, updated_at を自動生成
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
