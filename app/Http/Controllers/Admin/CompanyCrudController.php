<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\UserContract;
use App\Http\Requests\CompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Company;
use App\Domain\Contracts\CompanyContract;

class CompanyCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Company::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/company');
        CRUD::setEntityNameStrings('Компанию', 'Компании');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(CompanyContract::BLOCKED)->label('Статус');
        CRUD::column(CompanyContract::USER_ID)->type('select')->label('Пользователь')
            ->entity('user')->model('App\Models\User')->attribute(UserContract::NAME.' '.UserContract::SURNAME);
        CRUD::column(CompanyContract::BLOCKED)->label('Статус');
        CRUD::column(CompanyContract::TITLE)->label('Название');
        CRUD::column(CompanyContract::ICON)->label('Лого');
    }

    protected function setupListOperation()
    {
        CRUD::column(CompanyContract::ID)->label('ID');
        CRUD::column(CompanyContract::BLOCKED)->label('Статус');
        CRUD::column(CompanyContract::USER_ID)->type('select')->label('Пользователь')
            ->entity('user')->model('App\Models\User')->attribute(UserContract::NAME.' '.UserContract::SURNAME);
        CRUD::column(CompanyContract::TITLE)->label('Название');
        CRUD::column(CompanyContract::ICON)->label('Лого');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CompanyRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
