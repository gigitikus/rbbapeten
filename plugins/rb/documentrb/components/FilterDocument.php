<?php namespace rb\documentrb\components;

use Cms\Classes\ComponentBase;
use Input;
use rb\documentrb\models\documentrb;

class FilterDocument extends ComponentBase
{
    public function componentDetails(){
        return [
            'name' => 'Filter Document',
            'description' => 'Filter Document'
        ];
    }

    public function onRun(){
        $this->documentrb = $this->filterDocument();
        $this->categories = $this->filterCategory();
        $this->tahun = $this->filterTahun();
        $this->currentPage = $this->setCurrentPage();
    }

    public function setCurrentPage()
    {
        $menuid = Input::get('menuid');
        return $menuid;
    }

    public function filterDocument()
    {
        $menuid = Input::get('menuid');
        $tahun = Input::get('tahun');
        
        if($menuid && $tahun)
        {
            $query = documentrb::where('menuid', '=', $menuid)->where('year', '=', $tahun)
            ->orderby('categoryorderno')
            ->orderby('titleorderno')
            ->get();
        }    
        /* dd($query); */
        return $query;
    }

    public function filterCategory()
    {
        $menuid = Input::get('menuid');
        $categories = [];

        if($menuid){
            $query = documentrb::where('menuid', '=', $menuid)->orderby('categoryorderno')->get();

            $i = 0;
            foreach($query as $category){
                $categories[$i] = $category->categoryid;
                $i++;
            }

            $categories = array_unique($categories);
        }

        return $categories;
    }

    public function filterTahun()
    {
        $menuid = Input::get('menuid');
        $tahun = [];

        if($menuid){
            $query = documentrb::where('menuid', '=', $menuid)->orderby('year','DESC')->get();

            $i = 0;
            foreach($query as $th){
                $tahun[$i] = $th->year;
                $i++;
            }

            $tahun = array_unique($tahun);
        }

        return $tahun;
    }

    public $documentrb;
    public $categories;
    public $tahun;
    public $currentPage;
}