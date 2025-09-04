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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->string('cpf')->unique() ->nullable();
            $table->date('birth_date') ->nullable();
            $table->string('phone', 15) ->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('cep') ->nullable();
            $table->string('rua') ->nullable();
            $table->string('numero') ->nullable();
            $table->string('bairro') ->nullable();
            $table->string('cidade') ->nullable();
            $table->string('estado', 2) ->nullable();
            $table->string('complemento') ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'is_admin',
                'cpf',
                'birth_date',
                'phone',
                'profile_photo_path',
                'cep',
                'rua',
                'numero',
                'bairro',
                'cidade',
                'estado',
                'complemento',
            ]);
        });
    }
};
