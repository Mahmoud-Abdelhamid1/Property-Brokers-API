<?php

use App\Enums\PropertyStatusEnums;
use App\Enums\PropertyTypeEnums;
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
        Schema::create('property_characteristics', function (Blueprint $table) {

            $table->unsignedBigInteger('property_id')->unique();
            $table->float('price')->required();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_type' ,[
                PropertyTypeEnums::SINGLE->value,
                PropertyTypeEnums::MULTIFAMILY->value,
                PropertyTypeEnums::TOWNHOUSE->value,
                PropertyTypeEnums::BUNGALOW->value,
            ]);

            $table->enum('status' , [
                PropertyStatusEnums::SALE->value,
                PropertyStatusEnums::SOLD->value,
                PropertyStatusEnums::HOLD->value,
            ])->required();
            $table->timestamps();

            $table->foreign('property_id')
            ->references('id')
            ->on('properties')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_characteristics');
    }
};
