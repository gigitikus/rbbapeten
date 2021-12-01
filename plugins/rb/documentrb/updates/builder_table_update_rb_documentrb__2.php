<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrb2 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
