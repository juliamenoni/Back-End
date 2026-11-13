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
        Schema::create('orden_servicos', function (Blueprint $table) {
            $table->id();
            $table->string("codigo")->unique();
            $table->string("titulo");
            $table->foreignId("equipamento_id")->constrained("equipamentos");
            $table->string("tipo");
            $table->string("prioridade");
            $table->string("status")->default("ABERTA");
            $table->string("tecnico");
            $table->datetime("data_abertura");
            $table->datetime("prazo_limite");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_servicos');
    }
};
