<?php namespace Rb\Documentrb\Models;

use Model;

/**
 * Model
 */
class DocumentCategory extends Model
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
    public $table = 'rb_documentrb_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
