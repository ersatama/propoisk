<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\UserContract;
use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('пользователь', 'Пользователи');
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(UserContract::CREATED_AT)->label('Дата регистрации');
        CRUD::column(UserContract::STATUS)->label('Статус');
        CRUD::column(UserContract::BLOCKED)->label('Заблокирован');
        CRUD::column(UserContract::NAME)->label('Имя');
        CRUD::column(UserContract::SURNAME)->label('Фамилия');
        CRUD::column(UserContract::LAST_NAME)->label('Отчество');
        CRUD::column(UserContract::BIRTHDATE)->label('Дата рождения');
        CRUD::column(UserContract::CODE)->label('Код подтверждения');
        CRUD::column(UserContract::PHONE)->label('Телефон номер');
        CRUD::column(UserContract::PHONE_VERIFIED_AT)->label('Статус телефон номера');
        CRUD::column(UserContract::EMAIL)->label('Эл.почта');
        CRUD::column(UserContract::EMAIL_VERIFIED_AT)->label('Статус эл.почты');
    }

    protected function setupListOperation()
    {
        CRUD::column('status')->label('Статус');
        CRUD::column('blocked')->label('Заблокирован');
        CRUD::column('name')->label('Имя');
        CRUD::column('surname')->label('Фамилия');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('email')->label('Эл.почта');
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field('status')->label('Статус')->type('select_from_array')->options([
            UserContract::USER          =>  UserContract::TRANSLATE[UserContract::USER],
            UserContract::ADMIN         =>  UserContract::TRANSLATE[UserContract::ADMIN],
            UserContract::SUPER_ADMIN   =>  UserContract::TRANSLATE[UserContract::SUPER_ADMIN],
        ]);

        CRUD::field('blocked')->label('Заблокирован')->type('select_from_array')->options([
            UserContract::ON    =>  UserContract::TRANSLATE[UserContract::ON],
            UserContract::OFF   =>  UserContract::TRANSLATE[UserContract::OFF],
        ]);
    }
}
