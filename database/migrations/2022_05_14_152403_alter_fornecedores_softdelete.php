<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresSoftdelete extends Migration
{
    public function up() {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
