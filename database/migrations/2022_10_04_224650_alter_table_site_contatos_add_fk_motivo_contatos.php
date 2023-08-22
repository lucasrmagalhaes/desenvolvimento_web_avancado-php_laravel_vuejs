<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // Atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        // Criação da FK e remover a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Criar a columa motivo_contato e removendo a FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            // Padrão: <table>_<coluna>_foreign
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');

            // Atribuindo motivo_contatos_id para a coluna motivo_contato
            DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contatos_id');

            // Removendo a coluna motivo_contatos_id
            Schema::table('site_contatos', function (Blueprint $table) {
                $table->dropColumn('motivo_contatos_id');
            });
        });
    }
}