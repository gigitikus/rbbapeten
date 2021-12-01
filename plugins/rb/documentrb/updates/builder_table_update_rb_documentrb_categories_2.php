<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbCategories2 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_categories', function($table)
        {
            $table->renameColumn('category_id', 'id');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_categories', function($table)
        {
            $table->renameColumn('id', 'category_id');
        });
    }
}
