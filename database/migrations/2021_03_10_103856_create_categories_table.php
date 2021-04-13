<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\CategoryContract;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create(CategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(CategoryContract::BLOCKED,CategoryContract::STATES)->default(CategoryContract::ON);
            $table->string(CategoryContract::TITLE);
            $table->string(CategoryContract::TITLE_KZ)->nullable();
            $table->string(CategoryContract::TITLE_EN)->nullable();
            $table->string(CategoryContract::DESCRIPTION)->nullable();
            $table->string(CategoryContract::DESCRIPTION_KZ)->nullable();
            $table->string(CategoryContract::DESCRIPTION_EN)->nullable();
            $table->string(CategoryContract::ICON)->nullable();
            $table->string(CategoryContract::IMG)->nullable();
            $table->integer(CategoryContract::PARENT_ID)->default(0);
            $table->integer(CategoryContract::LFT)->default(0);
            $table->integer(CategoryContract::RGT)->default(0);
            $table->integer(CategoryContract::DEPTH)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(CategoryContract::TABLE);
    }
}
