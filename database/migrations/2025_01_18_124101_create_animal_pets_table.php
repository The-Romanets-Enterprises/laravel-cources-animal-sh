<?php

use App\Enums\Sex;
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
        Schema::create('animal_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->enum('sex', Sex::getValues()->all());
            $table->text('description');
            $table->boolean('is_confirmed')->default(false);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('birth_date');
            $table->boolean('is_sterilized')->default(false);
            $table->boolean('has_vaccination')->default(false);
            $table->string('wool_type',100)->nullable();
            $table->text('character')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_pets');
    }
};
