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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('description', 45);

            // restrictOnDelete() : mean cannot delete his reference,
            // if u will try delete category that have sub category, error will display

            // cascadeOnDelete() : mean subCategory will delete when u delete his reference,

            // nullOnDelete() : mean subCategory will set as null when u delete his reference,

            $table->foreignIdFor(Category::class)->constrained()->restrictOnDelete(); // equal of 2 line under this
            // $table->foreignIdFor(Category::class);
            // $table->foreign('category_id')->on('categories')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
