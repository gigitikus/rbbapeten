<?php namespace Rb\Documentrb\Models;

use Model;

/**
 * Model
 */
class DocumentMenu extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rb_documentrb_menus';

    /* Relations */
    public $belongsToMany =[
        'categories' => [
            'rb\documentrb\models\DocumentCategory',
            'table' => 'rb_documentrb_mncategory',
            'order' => 'orderno'
        ]
    ]; 
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
