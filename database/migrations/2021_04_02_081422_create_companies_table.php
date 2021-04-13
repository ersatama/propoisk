<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\CompanyContract;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create(CompanyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(CompanyContract::BLOCKED,CompanyContract::STATES)->default(CompanyContract::ON);
            $table->bigInteger(CompanyContract::USER_ID);
            $table->string(CompanyContract::TITLE);
            $table->string(CompanyContract::DESCRIPTION)->nullable();
            $table->string(CompanyContract::ICON)->nullable();
            $table->integer(CompanyContract::PARENT_ID)->default(0);
            $table->integer(CompanyContract::LFT)->default(0);
            $table->integer(CompanyContract::RGT)->default(0);
            $table->integer(CompanyContract::DEPTH)->default(0);
            $table->timestamps();
            $table->index(CompanyContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(CompanyContract::TABLE);
    }
}
