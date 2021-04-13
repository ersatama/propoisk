<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\CategoryContract;
use App\Domain\Contracts\GlobalFilterContract;
use App\Http\Requests\GlobalFilterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\GlobalFilter;

class GlobalFilterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(GlobalFilter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/globalfilter');
        CRUD::setEntityNameStrings('Фильтр', 'фильтры категории');
    }

    protected function setupListOperation()
    {
        CRUD::column(GlobalFilterContract::CATEGORY_ID)->type('select')->label('Раздел')
            ->entity('category')->model('App\Models\Category')->attribute(GlobalFilterContract::TITLE);
        CRUD::column(GlobalFilterContract::BLOCKED)->label('Статус');
        CRUD::column(GlobalFilterContract::TITLE)->label('Название');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(GlobalFilterRequest::class);
        $this->crud->addFields([
            [
                'name'  => GlobalFilterContract::CATEGORY_ID,
                'label' => 'Раздел',
                'type'  => 'select',
                'entity'    => 'category',
                'model'     => "App\Models\Category",
                'attribute' => CategoryContract::TITLE,
            ]
        ]);
        CRUD::field(GlobalFilterContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            GlobalFilterContract::ON    =>  GlobalFilterContract::TRANSLATE[GlobalFilterContract::ON],
            GlobalFilterContract::OFF   =>  GlobalFilterContract::TRANSLATE[GlobalFilterContract::OFF],
        ])->default(GlobalFilterContract::ON);
        CRUD::field(GlobalFilterContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(GlobalFilterContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(GlobalFilterContract::TITLE_EN)->label('Название на англииском')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
