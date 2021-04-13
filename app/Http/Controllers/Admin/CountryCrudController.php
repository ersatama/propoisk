<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\CategoryContract;
use App\Http\Requests\CountryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Country;
use App\Domain\Contracts\CountryContract;

class CountryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Country::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/country');
        CRUD::setEntityNameStrings('Страну', 'Страны');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(CountryContract::BLOCKED)->label('Статус');
        CRUD::column(CountryContract::TITLE)->label('Название');
        CRUD::column(CountryContract::TITLE_KZ)->label('Название на казахском');
        CRUD::column(CountryContract::TITLE_EN)->label('Название на англииском');
    }

    protected function setupListOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(CountryContract::BLOCKED)->label('Статус');
        CRUD::column(CountryContract::TITLE)->label('Название');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CountryRequest::class);

        CRUD::field(CountryContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            CountryContract::ON    =>  CountryContract::TRANSLATE[CountryContract::ON],
            CountryContract::OFF   =>  CountryContract::TRANSLATE[CountryContract::OFF],
        ])->default(CountryContract::ON);

        CRUD::field(CountryContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(CountryContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(CountryContract::TITLE_EN)->label('Название на англииском')->type('text');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
