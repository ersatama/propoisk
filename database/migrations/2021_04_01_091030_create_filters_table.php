<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\FilterContract;

class CreateFiltersTable extends Migration
{

    public function up()
    {
        Schema::create(FilterContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(FilterContract::SUB_CATEGORY_ID);
            $table->enum(FilterContract::BLOCKED,FilterContract::STATE)->default(FilterContract::ON);
            $table->string(FilterContract::TITLE);
            $table->string(FilterContract::TITLE_KZ)->nullable();
            $table->string(FilterContract::TITLE_EN)->nullable();
            $table->integer(FilterContract::PARENT_ID)->default(0);
            $table->integer(FilterContract::LFT)->default(0);
            $table->integer(FilterContract::RGT)->default(0);
            $table->integer(FilterContract::DEPTH)->default(0);
            $table->timestamps();
            $table->index(FilterContract::SUB_CATEGORY_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(FilterContract::TABLE);
    }

}
