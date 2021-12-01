<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDocmn2 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['doc_id','menus_id']);
            $table->integer('docid');
            $table->integer('menuid');
            $table->dropColumn('doc_id');
            $table->dropColumn('menus_id');
            $table->primary(['docid','menuid']);
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['docid','menuid']);
            $table->dropColumn('docid');
            $table->dropColumn('menuid');
            $table->integer('doc_id');
            $table->integer('menus_id');
            $table->primary(['doc_id','menus_id']);
        });
    }
}
