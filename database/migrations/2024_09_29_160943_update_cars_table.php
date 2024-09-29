<?php

use App\Models\Brand;
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
        Schema::table('cars', function(Blueprint $table) {
            $table->dropColumn('brand');
            $table->foreignIdFor(Brand::class)->after('id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function(Blueprint $table) {
            $table->dropConstrainedForeignIdFor('brand_id');
            $table->string('brand')->after('id');
        });
    }
};
