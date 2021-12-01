<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbMenus2 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_menus', function($table)
        {
            $table->renameColumn('menu_id', 'id');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_menus', function($table)
        {
            $table->renameColumn('id', 'menu_id');
        });
    }
}
