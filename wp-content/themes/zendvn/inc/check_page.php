<?php
class Check_Page {
    private $_is_arr = array();
   
    public function __construct()
    {
       $this->check();
    }

    public function check() {
       if(is_404())                      $this->is404();
       if(is_search())                   $this->isSearch();
       if(is_archive())                  $this->isArchive();
       if(is_single())                   $this->isSingle();
       if(is_front_page())               $this->isFrontPage();
       if(is_home())                     $this->isHome();
    }

    public function is404() {
       $tmp = array();
       $tmp['function'] = 'is_404()';
       $tmp['page']     = '404.php';

       echo "<pre>";
       print_r($tmp);
       echo "</pre>";
    }

    public function isSearch() {
        $tmp = array();
        $tmp['function'] = 'is_search()';
        $tmp['page']     = 'search.php';

        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }

    public function isArchive() {
        $tmp = array();
        $tmp['function'] = 'is_archive()';
        $tmp['page']     = 'archive.php';

        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }

    public function isSingle() {
        $tmp = array();
        $tmp['function'] = 'is_single()';
        $tmp['page']     = 'single.php';

        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }

    public function isFrontPage() {
        $tmp = array();
        $tmp['function'] = 'is_front_page()';
        $tmp['page']     = 'page.php';

        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }

    public function isHome() {
        $tmp = array();
        $tmp['function'] = 'is_home()';
        $tmp['page']     = 'home.php';

        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }
}