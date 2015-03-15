<?php
namespace app\core\classes;

Class UrlException extends \app\core\classes\AbstractException {

    public static function invalidControllerName()
    {
        try {
           throw new self;
        }
        catch (UrlException $e) {
            echo "<pre style='color:#a94442;background: #f2dede;font-size: 15px;padding:10px;position: fixed;
            bottom:5px;width: 100%;'><a style='color:#480B54;font-weight: 900;'>Исключение: Вызов несуществующего метода</a> ('{$e->getMessage()}')\n{$e}\n</pre>";die;
        }
        catch (\Exception $e) {
            echo "Caught Exception ('{$e->getMessage()}')\n{$e}\n";
        }
    }

}