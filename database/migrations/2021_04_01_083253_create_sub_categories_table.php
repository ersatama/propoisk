<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\SubCategoryContract;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SubCategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(SubCategoryContract::CATEGORY_ID);
            $table->enum(SubCategoryContract::BLOCKED,SubCategoryContract::STATE)->default(SubCategoryContract::ON);
            $table->string(SubCategoryContract::TITLE);
            $table->string(SubCategoryContract::TITLE_KZ)->nullable();
            $table->string(SubCategoryContract::TITLE_EN)->nullable();
            $table->string(SubCategoryContract::DESCRIPTION)->nullable();
            $table->string(SubCategoryContract::DESCRIPTION_KZ)->nullable();
            $table->string(SubCategoryContract::DESCRIPTION_EN)->nullable();
            $table->string(SubCategoryContract::ICON)->nullable();
            $table->string(SubCategoryContract::IMG)->nullable();
            $table->integer(SubCategoryContract::PARENT_ID)->default(0);
            $table->integer(SubCategoryContract::LFT)->default(0);
            $table->integer(SubCategoryContract::RGT)->default(0);
            $table->integer(SubCategoryContract::DEPTH)->default(0);
            $table->timestamps();
            $table->index(SubCategoryContract::CATEGORY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(SubCategoryContract::TABLE);
    }
}
