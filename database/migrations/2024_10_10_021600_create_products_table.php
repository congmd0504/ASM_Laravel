<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignIdFor(Category::class)->constrained();
            $table->decimal('price');
            $table->string('description')->comment('Mô tả ngắn');
            $table->integer('weight')->nullable();
            $table->integer('quality');
            $table->text('content')->comment('Mô tả');
            $table->string('image')->nullable();
            $table->integer('view')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
