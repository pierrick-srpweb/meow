<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->index('categorie');
            $table->index('est_publie');
        });

        Schema::table('temoignages', function (Blueprint $table) {
            $table->foreign('chat_id')->references('id')->on('chats')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropIndex(['categorie']);
            $table->dropIndex(['est_publie']);
        });

        Schema::table('temoignages', function (Blueprint $table) {
            $table->dropForeign(['chat_id']);
        });
    }
};
