<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProjectRequest as StoreRequest;
use App\Http\Requests\ProjectRequest as UpdateRequest;

/**
 * Class ProjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProjectCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Project');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/project');
        $this->crud->setEntityNameStrings('project', 'projects');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // Setting up table
        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'year',
            'type' => 'text',
        ]);

        // |--------------------------------------------------------------------------
        // Setting up create form
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'label' => 'Thumbnail image',
            'name' => 'image',
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // omit or set to 0 to allow any aspect ratio
        ]);
        $this->crud->addField([
            'name' => 'backgroundColor',
            'type' => 'color',
            'label' => 'Background Color',
            'default' => '#ffffff',
        ]);
        $this->crud->addField([
            'name' => 'textColor',
            'type' => 'color',
            'label' => 'Text Color',
        ]);
        $this->crud->addField([
            'name' => 'year',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'client',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'label' => 'Category',
            'name' => 'categories',
            'type' => 'checklist',
            'entity' => 'categories', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Category",
            'pivot' => true,
        ]);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'ckeditor',
            'options' => [
                'autoGrow_minHeight' => 500,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);

        // add asterisk for fields that are required in ProjectRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }
}
