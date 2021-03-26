<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Domain\Contracts\CategoryContract;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('Категорию', 'Категорий');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(CategoryContract::STATUS)->label('Статус');
        CRUD::column(CategoryContract::TITLE)->label('Название');
        CRUD::column(CategoryContract::ICON)->label('Иконка');
        CRUD::column(CategoryContract::IMG)->label('Картина');
    }

    protected function setupListOperation()
    {
        CRUD::column(CategoryContract::STATUS)->label('Статус');
        CRUD::column(CategoryContract::TITLE)->label('Название');
        CRUD::column(CategoryContract::ICON)->label('Иконка');
        CRUD::column(CategoryContract::IMG)->label('Картина');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);

        CRUD::field(CategoryContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            CategoryContract::ON    =>  CategoryContract::TRANSLATE[CategoryContract::ON],
            CategoryContract::OFF   =>  CategoryContract::TRANSLATE[CategoryContract::OFF],
        ])->default(CategoryContract::ON);
        CRUD::field(CategoryContract::TITLE)->label('Название на русском (обязательное поле)')->type('text')->attributes([
            'required'  =>  'required'
        ]);
        CRUD::field(CategoryContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(CategoryContract::TITLE_EN)->label('Название на англииском')->type('text');
        CRUD::field(CategoryContract::DESCRIPTION)->label('Описание на русском')->type('textarea');
        CRUD::field(CategoryContract::DESCRIPTION_KZ)->label('Описание на казахском')->type('textarea');
        CRUD::field(CategoryContract::DESCRIPTION_EN)->label('Описание на англииском')->type('textarea');
        CRUD::field(CategoryContract::ICON)->label('Иконка')->type('image')->attributes([
            'accept'    =>  'image/png, image/jpeg, image/jpg'
        ]);
        CRUD::field(CategoryContract::IMG)->label('Картинка')->type('image')->attributes([
            'accept'    =>  'image/png, image/jpeg, image/jpg'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
