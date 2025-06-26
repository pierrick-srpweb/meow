<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nom')->nullable()->index();
            $table->string('sexe')->nullable()->index();
            $table->date('date_naissance')->nullable();
            $table->boolean('ok_chien')->nullable();
            $table->boolean('ok_enfant')->nullable();
            $table->boolean('litiere')->nullable();
            $table->date('vaccination')->nullable();
            $table->string('numero_puce')->nullable();
            $table->date('antipuce')->nullable();
            $table->date('vermifuge')->nullable();
            $table->text('description')->nullable();
            $table->string('famille_accueil')->nullable();
            $table->date('reservation')->nullable();
            $table->date('adoption')->nullable();
            $table->string('famille_adoption')->nullable();
            $table->string('categorie');
            $table->boolean('est_publie')->default(false);
            $table->dateTime('date_publication')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
