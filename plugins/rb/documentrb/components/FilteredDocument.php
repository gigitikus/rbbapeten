<?php namespace rb\documentrb\components;

use Cms\Classes\ComponentBase;
use Input;
use rb\documentrb\models\documents;
use rb\documentrb\models\documentmenu;
use rb\documentrb\models\documentcategory;

class FilteredDocument extends ComponentBase
{
    public function componentDetails(){
        return [
            'name' => 'Filtered Document',
            'description' => 'Filtered Document'
        ];
    }

    public function onRun(){
        $this->documents = $this->filteredDocument();
        $this->tahun = $this->filterTahun();
        $this->categories = $this->getCategories();
    }

    public function getCategories(){
        $categories = documentcategory::all();
        return $categories;
    }

    public function filteredDocument(){
        $menuid = Input::get('menuid');
        $tahun = Input::get('tahun');

        if($menuid && $tahun)
        {
            /*
            $query = \DB::table('rb_documentrb_ as d') 
            ->join('rb_documentrb_menus as dm', 'd.menu_id', '=', 'dm.id')
            ->join('rb_documentrb_categories as dc', 'd.category_id', '=', 'dc.id')
            ->select('d.*', 'dm.menu_title', 'dc.orderno', 'dc.category_title')
            ->where('menu_id', '=', $menuid)
            ->where('year', '=', $tahun)
            ->orderBy('orderno')
            ->get();
            */
            
            $query = documents::where('menu_id', '=', $menuid)->where('year', '=', $tahun)->get();
        }

        return $query;
    }

    public function filterTahun()
    {
        $menuid = Input::get('menuid');
        $tahun = [];

        if($menuid){
            $query = documents::where('menu_id', '=', $menuid)->orderby('year','DESC')->get();

            $i = 0;
            foreach($query as $th){
                $tahun[$i] = $th->year;
                $i++;
            }

            $tahun = array_unique($tahun);
        }

        return $tahun;
    }

    public $documents;
    public $tahun;
    public $categories;
    
}