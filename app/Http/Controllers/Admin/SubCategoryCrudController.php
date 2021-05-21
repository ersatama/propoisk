<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\CategoryContract;
use App\Http\Requests\SubCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\SubCategory;
use App\Domain\Contracts\SubCategoryContract;

class SubCategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(SubCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subcategory');
        CRUD::setEntityNameStrings('Раздел', 'разделы');
    }

    public function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(SubCategoryContract::CATEGORY_ID)->type('select')->label('Категория')
            ->entity('category')->model('App\Models\Category')->attribute(CategoryContract::TITLE);
        CRUD::column(SubCategoryContract::BLOCKED)->label('Статус');
        CRUD::column(SubCategoryContract::TITLE)->label('Название');
        CRUD::column(SubCategoryContract::ICON)->label('Иконка');
        CRUD::column(SubCategoryContract::IMG)->label('Картина');
    }

    protected function setupListOperation()
    {
        CRUD::column(SubCategoryContract::CATEGORY_ID)->type('select')->label('Категория')
            ->entity('category')->model('App\Models\Category')->attribute(CategoryContract::TITLE);
        CRUD::column(CategoryContract::BLOCKED)->label('Статус');
        CRUD::column(CategoryContract::TITLE)->label('Название');
        CRUD::column(CategoryContract::ICON)->label('Иконка');
        CRUD::column(CategoryContract::IMG)->label('Картина');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SubCategoryRequest::class);

        $this->crud->addFields([
            [
                'name'  => SubCategoryContract::CATEGORY_ID,
                'label' => 'Категория',
                'type'  => 'select',
                'entity'    => 'category',
                'model'     => "App\Models\Category",
                'attribute' => CategoryContract::TITLE,
            ]
        ]);
        CRUD::field(SubCategoryContract::BLOCKED)->label('Статус')->type('select_from_array')->options([
            SubCategoryContract::ON    =>  SubCategoryContract::TRANSLATE[SubCategoryContract::ON],
            SubCategoryContract::OFF   =>  SubCategoryContract::TRANSLATE[SubCategoryContract::OFF],
        ])->default(SubCategoryContract::ON);
        CRUD::field(SubCategoryContract::TITLE)->label('Название на русском (обязательное поле)')
            ->type('text')
            ->attributes([
                'required'  =>  'required'
            ]);
        CRUD::field(SubCategoryContract::TITLE_KZ)->label('Название на казахском')->type('text');
        CRUD::field(SubCategoryContract::TITLE_EN)->label('Название на англииском')->type('text');
        CRUD::field(SubCategoryContract::DESCRIPTION)->label('Описание на русском')->type('textarea');
        CRUD::field(SubCategoryContract::DESCRIPTION_KZ)->label('Описание на казахском')->type('textarea');
        CRUD::field(SubCategoryContract::DESCRIPTION_EN)->label('Описание на англииском')->type('textarea');
        CRUD::field(SubCategoryContract::ICON)->label('Иконка')->type('image')->attributes([
            'accept'    =>  'image/png, image/jpeg, image/jpg'
        ]);
        CRUD::field(SubCategoryContract::IMG)->label('Картинка')->type('image')->attributes([
            'accept'    =>  'image/png, image/jpeg, image/jpg'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
