<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\UserContract;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(UserContract::STATUS,UserContract::STATUS_VALUES)->default(UserContract::USER);
            $table->enum(UserContract::BLOCKED,UserContract::STATE)->default(UserContract::ON);
            $table->string(UserContract::NAME);
            $table->string(UserContract::SURNAME);
            $table->string(UserContract::LAST_NAME)->nullable();
            $table->date(UserContract::BIRTHDATE)->nullable();
            $table->enum(UserContract::PUSH_NOTIFICATION,UserContract::STATE)
                ->default(UserContract::ON);
            $table->mediumInteger(UserContract::CODE);
            $table->string(UserContract::PHONE)->unique();
            $table->timestamp(UserContract::PHONE_VERIFIED_AT)->nullable();
            $table->string(UserContract::EMAIL)->unique()->nullable();
            $table->timestamp(UserContract::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserContract::PASSWORD);
            $table->string(UserContract::API_TOKEN)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserContract::TABLE);
    }
}
