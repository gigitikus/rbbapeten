<?php namespace Pkurg\CardSlider\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use RainLab\Blog\Models\Category as CategoryModel;
use RainLab\Blog\Models\Post as PostModel;

class SmallCardSlider extends ComponentBase
{

    public $postPageUrl;
    public $postCount;

    public function componentDetails()
    {
        return [
            'name' => 'Small Card Slider Component',
            'description' => 'Bootstrap 4 Small Card Slider',
        ];
    }

    public function defineProperties()
    {
        return [
            'cardonslider' => [
                'title' => 'Cards On Slider',
                'type' => 'dropdown',
                'default' => '4',
                'options' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '6' => '6'],

            ],
            'maxCardItems' => [
                'title' => 'Max Cards',
                'description' => 'The most amount of todo items allowed',
                'default' => 12,
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items property can contain only numeric symbols',
            ],
            'interval' => [
                'title' => 'Slide interval',
                'type' => 'string',
                'default' => 'false',
            ],
            // 'dateformat' => [
            //     'title' => 'Date format',
            //     'type' => 'string',
            //     'default' => 'm/d/Y',
            // ],
            'postPage' => [
                'title' => 'Post page',
                'type' => 'dropdown',
                'default' => 'blog/post',
            ],
            'postPageSlug' => [
                'title' => 'Post page slug',
                'default' => ':slug',
            ],

            'exceptcategory' => [
                'title' => 'Show all category except',
                'type' => 'checkbox',
                'default' => 0,
            ],
            'categoryslug' => [
                'title' => 'Post category for cards',
                'type' => 'string',
                'placeholder' => 'Enter category slug',
            ],
            'showuncatpost' => [
                'title' => 'Show Uncategorized posts',
                'type' => 'checkbox',
                'default' => 'false',
            ],
            'sortorder' => [
                'title' => 'Published_at order',
                'type' => 'dropdown',
                'default' => 'desc',
                'options' => ['asc' => 'asc', 'desc' => 'desc', 'random' => 'random'],

            ],
            'addCss' => [
                'title' => 'Add component css',
                'type' => 'checkbox',
                'default' => 'frue',
            ],

            'image_width' => [
                'group' => 'Image',
                'title' => 'Image width',
                'default' => 100,
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items property can contain only numeric symbols',
            ],
            'image_height' => [
                'group' => 'Image',
                'title' => 'Image height',
                'default' => 100,
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items property can contain only numeric symbols',
            ],
            'mode' => [
                'group' => 'Image',
                'title' => 'Resize image mode',
                'type' => 'dropdown',
                'default' => 'crop',
                'options' => ['auto' => 'auto', 'exact' => 'exact', 'portrait' => 'portrait', 'landscape' => 'landscape', 'crop' => 'crop', 'fit' => 'fit'],
            ],

        ];

    }

    public function getPostPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getSliderCount()
    {

        //return ceil($this->property('maxCardItems') / $this->property('cardonslider'));
        return ceil($this->getTrueMaxItem() / $this->property('cardonslider'));

    }

    public function getURLPost($slug)
    {

        return str_replace($this->property('postPageSlug'), $slug, $this->postPageUrl);

    }

    public function getTrueMaxItem()
    {

        if ($this->property('maxCardItems') > $this->postCount) {

            return $this->postCount;
        } else {

            return $this->property('maxCardItems');
        }

    }

    public function getCompName()
    {

        return $this->alias;

    }

    public function onRun()
    {

        if ($this->property('addCss')) {
            $this->addCss('/plugins/pkurg/cardslider/assets/css/small-cardslider.css');
        }

    }

    public function getPosts()
    {

        $a = array_map('trim', explode(',', $this->property('categoryslug')));

        if ($this->property('exceptcategory') == '1') {

            $categories = CategoryModel::whereNotIn('slug', $a)->pluck('id');

        }

        if ($this->property('exceptcategory') == '0') {

            $categories = CategoryModel::whereIn('slug', $a)->pluck('id');
        }

        if ($categories !== null) {

            if ($this->property('sortorder') == "random") {
                $posts = PostModel::whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('id', $categories);
                })->where('published', '1')
                    ->limit($this->property('maxCardItems'))
                    ->inRandomOrder()
                    ->get();

                if ($this->property('showuncatpost')=='1') {

                    $uncatposts = PostModel::doesnthave('categories')
                        ->limit($this->property('maxCardItems'))
                        ->inRandomOrder()
                        ->get();

                    $posts = $posts->merge($uncatposts);

                }

            } else {

                $posts = PostModel::whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('id', $categories);
                })->where('published', '1')
                    ->limit($this->property('maxCardItems'))
                    ->orderBy('published_at', $this->property('sortorder'))
                    ->get();

                if ($this->property('showuncatpost')=='1') {

                    $uncatposts = PostModel::doesnthave('categories')
                        ->limit($this->property('maxCardItems'))
                        ->orderBy('published_at', $this->property('sortorder'))
                        ->get();

                    $posts = $posts->merge($uncatposts);

                }

            }

        }
        if ($categories->isEmpty()) {

            $posts = PostModel::doesnthave('categories')->get();

            if ($this->property('sortorder') == "random") {
                $posts = PostModel::doesnthave('categories')
                    ->limit($this->property('maxCardItems'))
                    ->inRandomOrder()
                    ->get();
            } else {
                $posts = PostModel::doesnthave('categories')
                    ->limit($this->property('maxCardItems'))
                    ->orderBy('published_at', $this->property('sortorder'))
                    ->get();
            }

        }
        $theme = Theme::getEditTheme();
        $pages = Page::listInTheme($theme, true);

        foreach ($pages as $page) {

            if ($page->baseFileName == $this->property('postPage')) {

                $this->postPageUrl = $page->url;

            }

        }

        $this->postCount = $posts->count();

        return $posts;

    }
}
