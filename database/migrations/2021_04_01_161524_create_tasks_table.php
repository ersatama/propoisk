<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\TaskContract;

class CreateTasksTable extends Migration
{

    public function up()
    {
        Schema::create(TaskContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(TaskContract::BLOCKED,TaskContract::STATE)->default(TaskContract::ON);
            $table->bigInteger(TaskContract::CATEGORY_ID);
            $table->bigInteger(TaskContract::SUB_CATEGORY_ID)->nullable();
            $table->bigInteger(TaskContract::CITY_ID)->nullable();
            $table->string(TaskContract::TITLE);
            $table->text(TaskContract::DESCRIPTION)->nullable();
            $table->string(TaskContract::PRICE);
            $table->timestamps();
            $table->index(TaskContract::CATEGORY_ID);
            $table->index(TaskContract::SUB_CATEGORY_ID);
            $table->index(TaskContract::CITY_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(TaskContract::TABLE);
    }
}
