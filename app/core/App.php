<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        if ($url == null) {
            $url[] = 'Home';
        }

        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }


        // jalankan controller & method, serta kirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //rtrim digunakan untuk menghapus tanda / pada akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // mmefilter url dari karakter aneh
            $url = explode('/', $url); //pecah url dengan fungsi explode dengan delimiter slash / 
            return $url;
        }
    }
}
