<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LaporanreskrimRequest as StoreRequest;
use App\Http\Requests\LaporanreskrimRequest as UpdateRequest;

class LaporanreskrimCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Laporanreskrim');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/laporanreskrim');
        $this->crud->setEntityNameStrings('laporanreskrim', 'laporanreskrims');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();
        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'no_laporan',
                                'label' => 'No Laporan',
                                'type' => 'text',
                            ]);
                            
        $this->crud->addColumn([
                                'name' => 'judul_laporan',
                                'label' => 'Judul',
                                'type' => 'text',
                            ]);
        
        $this->crud->addColumn([
                                'name' => 'tgl_laporan',
                                'label' => 'Tgl Laporan',
                                'type' => 'date',
                            ]);
        $this->crud->addColumn([
                                'name' => 'file',
                                'label' => 'File',
                                'type' => "image",
                                // 'function_name' => 'getSlugWithLink', // the method in your Model
                            ]);
                            
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                                // 'type' => 'radio',
                                // 'options'     => [
                                //     0 => "Non Aktif",
                                //     1 => "Aktif"
                                //     ]
                                ]);
        
        $this->crud->addColumn([
                                'label' => 'Pelapor',
                                'type' => 'text',
                                'name' => 'user_id',
                                'entity' => 'users',
                                'attribute' => 'name',
                                'model' => "app\User",
                            ]);
        
        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
                                'name' => 'no_laporan',
                                'label' => 'No Laporan',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);
        
        $this->crud->addField([    // TEXT
                                'name' => 'judul_laporan',
                                'label' => 'Judul Laporan',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);
        
        $this->crud->addField([    // TEXT
                                'name' => 'tgl_laporan',
                                'label' => 'Tgl Laporan',
                                'type' => 'date',
                                'value' => date('d-m-Y'),
                            ], 'create');
                            
        $this->crud->addField([
                                'name' => 'file',
                                'label' => 'File ',
                                'type' => 'browse',
                                'hint' => 'Will be automatically generated from your title, if left empty.',
                                // 'disabled' => 'disabled'
                            ]);
                            
        $this->crud->addField([
                                'name'        => 'status', // the name of the db column
                                'label'       => 'Status', // the input label
                                'type'        => 'radio',
                                'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                                    0 => "Non Aktif",
                                                    1 => "Aktif"
                                ],
                                // optional
                                'inline'      => true, // show the radios all on the same line?
                            ]);
        
        $this->crud->addField([    // SELECT
                                'label' => 'Pelapor',
                                'type' => 'select2',
                                'name' => 'user_id',
                                'entity' => 'users',
                                'attribute' => 'name',
                                'model' => "app\User",
                            ]);


        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
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
