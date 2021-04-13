<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\RegionContract;
use App\Http\Requests\CityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\City;
use App\Domain\Contracts\CityContract;

class CityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(City::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/city');
        CRUD::setEntityNameStrings('Город', 'города');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(CityContract::BLOCKED)->label('Статус');
        CRUD::column(CityContract::REGION_ID)->type('select')->label('Регион')
            ->entity('region')->model('App\Models\Region')->attribute(RegionContract::TITLE);
        CRUD::column(CityContract::TITLE)->label('Название');
        CRUD::column(CityContract::TITLE_KZ)->label('Название на казахском');
        CRUD::column(CityContract::TITLE_EN)->label('Название на англииском');
    }

    protected function setupListOperation()
    {
        CRUD::column(CityContract::BLOCKED)->label('Статус');
        CRUD::column(CityContract::REGION_ID)->type('select')->label('Регион')
            ->entity('region')->model('App\Models\Region')->attribute(RegionContract::TITLE);
        CRUD::column(CityContract::TITLE)->label('Название');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CityRequest::class);

        $this->crud->addFields([
            [
                'name'  => CityContract::REGION_ID,
                'label' => 'Страна',
                'type'  => 'select',
                'entity'    => 'region',
                'model'     => "App\Models\Region",
                'attribute' => RegionContract::TITLE,
            ]
        ]);

        CRUD::field(CityContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            CityContract::ON    =>  CityContract::TRANSLATE[CityContract::ON],
            CityContract::OFF   =>  CityContract::TRANSLATE[CityContract::OFF],
        ])->default(CityContract::ON);
        CRUD::field(CityContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(CityContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(CityContract::TITLE_EN)->label('Название на англииском')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
