<?php namespace Rb\Documentrb\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Facades\BackendAuth;

class Documents extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Rb.Documentrb', 'documentrb', 'documents');
    }

    public function formExtendModel($model)
    {
        if ($this->formGetContext() === 'create') {
            $model->lastmodified = date("Y-m-d H:i:s");
            $model->modifiedby = BackendAuth::getUser()->login;
        }

        if ($this->formGetContext() === 'update') {
            $model->lastmodified = date("Y-m-d H:i:s");
            $model->modifiedby = BackendAuth::getUser()->login;
        }

    }
}
