<?php namespace Rb\Documentrb\Models;

use Model;

/**
 * Model
 */
class Documents extends Model
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
    public $table = 'rb_documentrb_';

    protected $jsonable = ['lampiran'];

    /* Relations */
    public $belongsTo = [
        'menu' => [
            DocumentMenu::class,'default' => true
        ],
        'category' => [
            DocumentCategory::class,'default' => true
        ],
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
