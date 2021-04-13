<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\RegionContract;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(RegionContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(RegionContract::BLOCKED,RegionContract::STATES)->default(RegionContract::ON);
            $table->bigInteger(RegionContract::COUNTRY_ID);
            $table->string(RegionContract::TITLE);
            $table->string(RegionContract::TITLE_KZ)->nullable();
            $table->string(RegionContract::TITLE_EN)->nullable();
            $table->timestamps();
            $table->index(RegionContract::COUNTRY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(RegionContract::TABLE);
    }
}
