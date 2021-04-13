<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\GlobalFilterContract;

class CreateGlobalFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(GlobalFilterContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(GlobalFilterContract::CATEGORY_ID);
            $table->enum(GlobalFilterContract::BLOCKED,GlobalFilterContract::STATE)->default(GlobalFilterContract::ON);
            $table->string(GlobalFilterContract::TITLE);
            $table->string(GlobalFilterContract::TITLE_KZ)->nullable();
            $table->string(GlobalFilterContract::TITLE_EN)->nullable();
            $table->integer(GlobalFilterContract::PARENT_ID)->default(0);
            $table->integer(GlobalFilterContract::LFT)->default(0);
            $table->integer(GlobalFilterContract::RGT)->default(0);
            $table->integer(GlobalFilterContract::DEPTH)->default(0);
            $table->timestamps();
            $table->index(GlobalFilterContract::CATEGORY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(GlobalFilterContract::TABLE);
    }
}
