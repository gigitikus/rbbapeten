<?php namespace Rb\Documentrb\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Facades\BackendAuth;

class DocRB extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'documentrb.docrb.managa_doc' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Rb.Documentrb', 'documentrb', 'docrb');
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
