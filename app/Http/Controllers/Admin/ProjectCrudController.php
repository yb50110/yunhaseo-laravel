<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
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
            'name' => 'image_url',
            'type' => 'image',
            'upload' => true,
//            'crop' => true, // set to true to allow cropping, false to disable
//            'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
        ]);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'ckeditor',
            // optional:
//            'extra_plugins' => ['oembed', 'widget']
//            'options' => [
//            'autoGrow_minHeight' => 200,
//            'autoGrow_bottomSpace' => 50,
//            'removePlugins' => 'resize,maximize',
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
            'label' => 'Category',
            'name' => 'category_id',
            'type' => 'select2',
            'entity' => 'categories', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false,
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
            'label' => 'Role',
            'name' => 'role_id',
            'type' => 'select2',
            'entity' => 'roles', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false,
        ]);
        $this->crud->addField([
            'label' => 'Tools',
            'name' => 'tool_id',
            'type' => 'select2_multiple',
            'entity' => 'tools', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false,
        ]);
        $this->crud->addField([
            'label' => 'Skills (separate each with new line or comma)',
            'name' => 'skills',
            'type' => 'textarea',
        ]);

        // add asterisk for fields that are required in ProjectRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->featured = $request->featured;
        $project->description = $request->description;
        $project->year = $request->year;
        $project->url = $request->url;
        $project->category_id = $request->category_id;
        $project->company_id = $request->company_id;
        $project->role_id = $request->role_id;

        // storing image_url
        $disk = "public";
        $destination_path = "uploads/projects";
        // if the image was erased
        if ($request->image_url==null)
        {
            \Storage::disk($disk)->delete($project->image_url);
            $project->image_url = null;
        }
        // if a base64 was sent, store it in the db
        if (starts_with($request->image_url, 'data:image'))
        {
            $image = \Image::make($request->image_url)->encode('jpg', 90);
            $filename = md5($request->image_url.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $project->image_url = $destination_path.'/'.$filename;
        }

        $project->save();

        // create project_tool record after project is created
        if(count($request->tool_id)) {
            foreach ($request->tool_id as $index => $tool_id) {
                $item = new ProjectTool();
                $item->project_id = $project->id;
                $item->tool_id = $tool_id;
                $item->save();
            }
        }

        // create records in skills
        $skills = str_replace(array("\r", "\n"), ',', $request->skills);
        $skills = array_filter(explode(', ', $skills));
        if(count($skills)) {
            foreach ($skills as $index => $skill) {
                $item = new Skill;
                $item->name = $skill;
                $item->project_id = $project->id;
                $item->save();
            }
        }

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        $redirect_location = $this->performSaveAction($project->getKey());
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
