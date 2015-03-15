<?php
namespace app\core\classes;

Class Controller {

    public function getInfo() {
        return phpinfo();
    }

    public function registerAssets($params=[]) {
        for ($i = 0; $i < count($params['js']); $i++) {
            if (strpos($params['js'][$i], 'http') !== false) {
                echo '<script src="' . $params['js'][$i] . '"></script>';
            } else {
                echo '<script src="'.DIR_PUBLIC_ASSETS_PATH.'script/'.$params['js'][$i].'"></script>';
            }
        }

        for($j=0;$j < count($params['css']); $j++) {
            if (strpos($params['css'][$j], 'http') !== false) {
                echo '<link rel="stylesheet" href="' . $params['css'][$j] . '">';
            } else {
                echo '<link rel="stylesheet" href="'.DIR_PUBLIC_ASSETS_PATH.'css/'.$params['css'][$j].'">';
            }
        }
    }

    public function meta($meta) {
        echo $meta;
    }

    public function srcImage($src) {
        echo DIR_PUBLIC_ASSETS_PATH.'image/'.$src;
    }

    public function renderView($view, $param=[])
    {
        if(is_file($view.'.php')) {
            $all_project = $param['all_project'];
            $all_task = $param['all_task'];
            include (DIR_VIEW_PATH.$view.'.php');
        } else {
            \app\core\classes\ValidateException::invalidFileName();
        }
        return true;
    }
}