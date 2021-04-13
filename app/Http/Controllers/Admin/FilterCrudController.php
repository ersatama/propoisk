<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FilterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Filter;
use App\Domain\Contracts\FilterContract;
use App\Domain\Contracts\SubCategoryContract;

/**
 * Class FilterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FilterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Filter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/filter');
        CRUD::setEntityNameStrings('Фильтр', 'фильтры');
    }

    protected function setupListOperation()
    {
        CRUD::column(FilterContract::SUB_CATEGORY_ID)->type('select')->label('Раздел')
            ->entity('subCategory')->model('App\Models\SubCategory')->attribute(SubCategoryContract::TITLE);
        CRUD::column(FilterContract::BLOCKED)->label('Статус');
        CRUD::column(FilterContract::TITLE)->label('Название');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FilterRequest::class);

        $this->crud->addFields([
            [
                'name'  => FilterContract::SUB_CATEGORY_ID,
                'label' => 'Раздел',
                'type'  => 'select',
                'entity'    => 'subCategory',
                'model'     => "App\Models\SubCategory",
                'attribute' => SubCategoryContract::TITLE,
            ]
        ]);
        CRUD::field(FilterContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            FilterContract::ON    =>  FilterContract::TRANSLATE[FilterContract::ON],
            FilterContract::OFF   =>  FilterContract::TRANSLATE[FilterContract::OFF],
        ])->default(FilterContract::ON);
        CRUD::field(FilterContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(FilterContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(FilterContract::TITLE_EN)->label('Название на англииском')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
