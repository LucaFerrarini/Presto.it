<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {

            $table->string('name_en');
            $table->string('name_ar');
        });

        $categoriesEN = [

            'Electronics',
            'Home',
            'Clothes',
            'Shoes',
            'Accessories',
            'Veichles',
            'Books',
            'Home appliances',
            'Sport',
            'Furniture'

        ];
        $categoriesAR = [

            'إلكترونيات,',
            'أدوات منزلية،',
            'ملابس',
            'أحذية',
            'مُكَمِّلات',
            'المحركات',
            'الكتب',
            'الأجهزة المنزلية',
            'رياضة',
            'أثاث'

        ];

        $counter=0;

        foreach(Category::all() as $category) {
            $category -> name_en = $categoriesEN[$counter];
            $category -> name_ar = $categoriesAR[$counter];

            $counter++;
            $category->save();

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
           $table->dropColumn('name_en');
           $table->dropColumn('name_ar');
        });
    }
};
