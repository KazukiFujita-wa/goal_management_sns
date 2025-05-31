<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->boolean('is_completed')->default(false)->after('goal_content');
            // 目標の完了状態を示すカラムを追加
            // デフォルト値はfalse（未完了）とする
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('is_completed');
            // 目標の完了状態を示すカラムを削除
        });
    }
};
