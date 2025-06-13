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
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('message');
            $table->enum('type',[  
                'ALINEACIÓN Y BALANCEO',
                'REVISIÓN TECNOMECÁNICA',
                'TANQUEO',
                'CAMBIO DE ACEITE',
                'REPARACIÓN',
                'SINCRONIZACIÓN',
                'MULTA',
                'ACCIDENTE',
                'MEJORA',
                'COMPRA',
                'VENTA',
                'OTRO'
            ]);
            $table->float('cost');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};
