<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\CountryContract;
use App\Http\Requests\RegionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Region;
use App\Domain\Contracts\RegionContract;

class RegionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Region::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/region');
        CRUD::setEntityNameStrings('Регион', 'Регионы');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(RegionContract::BLOCKED)->label('Статус');
        CRUD::column(RegionContract::COUNTRY_ID)->type('select')->label('Страна')
            ->entity('country')->model('App\Models\Country')->attribute(CountryContract::TITLE);
        CRUD::column(RegionContract::TITLE)->label('Название');
        CRUD::column(RegionContract::TITLE_KZ)->label('Название на казахском');
        CRUD::column(RegionContract::TITLE_EN)->label('Название на англииском');
    }

    protected function setupListOperation()
    {
        CRUD::column(RegionContract::BLOCKED)->label('Статус');
        CRUD::column(RegionContract::COUNTRY_ID)->type('select')->label('Страна')
            ->entity('country')->model('App\Models\Country')->attribute(CountryContract::TITLE);
        CRUD::column(RegionContract::TITLE)->label('Название');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(RegionRequest::class);

        $this->crud->addFields([
            [
                'name'  => RegionContract::COUNTRY_ID,
                'label' => 'Страна',
                'type'  => 'select',
                'entity'    => 'country',
                'model'     => "App\Models\Country",
                'attribute' => CountryContract::TITLE,
            ]
        ]);

        CRUD::field(RegionContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            RegionContract::ON    =>  RegionContract::TRANSLATE[RegionContract::ON],
            RegionContract::OFF   =>  RegionContract::TRANSLATE[RegionContract::OFF],
        ])->default(RegionContract::ON);
        CRUD::field(RegionContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(RegionContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(RegionContract::TITLE_EN)->label('Название на англииском')->type('text');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
