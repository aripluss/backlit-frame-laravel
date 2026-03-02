<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('alt');
            $table->string('text');
            $table->string('origin');
            $table->string('benefit');
            $table->text('description');
            $table->decimal('basePrice', 8, 2);
            $table->json('sizes')->nullable(); // необов'язкове поле (null)
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete(); // при видаленні категорії залишає товар без категорії (null)
            // $table->foreignId('category_id')->constrained()->onDelete('cascade'); // видаляє всі товари категорії при видаленні категорії
            $table->float('discount')->default(0); // за замовчуванням 0
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
