<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDocmn3 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['docid','menuid']);
            $table->integer('doc_id');
            $table->integer('menu_id');
            $table->dropColumn('docid');
            $table->dropColumn('menuid');
            $table->primary(['doc_id','menu_id']);
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['doc_id','menu_id']);
            $table->dropColumn('doc_id');
            $table->dropColumn('menu_id');
            $table->integer('docid');
            $table->integer('menuid');
            $table->primary(['docid','menuid']);
        });
    }
}
