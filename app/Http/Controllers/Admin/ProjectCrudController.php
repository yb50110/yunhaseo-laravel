<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectRole;
use App\Models\ProjectTool;
use App\Models\Skill;
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
        $this->crud->addColumn([
            'label' => 'Company',
            'name' => 'company_id',
            'type' => 'select',
            'entity' => 'companies',
            'attribute' => 'name',
        ]);
        $this->crud->addColumn([
            'name' => 'featured',
            'type' => 'boolean',
        ]);

        // |--------------------------------------------------------------------------
        // Setting up create form
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'label' => 'Featured?',
            'name' => 'featured',
            'type' => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label;
                0 => "False",
                1 => "True"
            ],
            'inline' => true,
        ]);
        $this->crud->addField([
            'label' => 'Thumbnail image',
            'name' => 'image',
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
        ]);
        $this->crud->addField([
            'name' => 'year',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'url',
            'type' => 'url',
        ]);
        $this->crud->addField([
            'label' => 'Company',
            'name' => 'company_id',
            'type' => 'select2',
            'entity' => 'companies', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false,
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
            'label' => 'Role',
            'name' => 'roles',
            'type' => 'checklist',
            'entity' => 'roles', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => true,
        ]);
        $this->crud->addField([
            'label' => 'Tools',
            'name' => 'tools',
            'type' => 'select2_multiple',
            'entity' => 'tools', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => true,
        ]);
        $this->crud->addField([
            'label' => 'Skills (separate each with new line or comma)',
            'name' => 'skills',
            'type' => 'select2_multiple',
            'entity' => 'skills',
            'attribute' => 'name',
            'pivot' => true,
        ]);
        $this->crud->addField([
            'name' => 'quote',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'short_description',
            'type' => 'ckeditor',
            'options' => [
                'autoGrow_minHeight' => 500,
                'autoGrow_bottomSpace' => 50,
            ]
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
