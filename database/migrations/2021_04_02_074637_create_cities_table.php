<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\CityContract;

class CreateCitiesTable extends Migration
{

    public function up()
    {
        Schema::create(CityContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(CityContract::BLOCKED,CityContract::STATES)->default(CityContract::ON);
            $table->bigInteger(CityContract::REGION_ID);
            $table->string(CityContract::TITLE);
            $table->string(CityContract::TITLE_KZ)->nullable();
            $table->string(CityContract::TITLE_EN)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(CityContract::TABLE);
    }
}
