<?php
namespace app\core\classes;

Class ValidateException extends \app\core\classes\AbstractException {

    public static function invalidControllerName()
    {
        try {
            throw new self;
        }
        catch (ValidateException $e) {
            echo "<pre style='color:#a94442;background: #f2dede;font-size: 15px;padding:10px;position: fixed;
            bottom:5px;width: 100%;'><a style='color:#480B54;font-weight: 900;'>Исключение: Нет такого имени контроллера</a> ('{$e->getMessage()}')\n{$e}\n</pre>";die;
        }
        catch (\Exception $e) {
            echo "Caught Exception ('{$e->getMessage()}')\n{$e}\n";
        }
    }

    public static function invalidFileName() {
        try {
            throw new self;
        }
        catch (ValidateException $e) {
            echo "<pre style='color:#a94442;background: #f2dede;font-size: 15px;padding:10px;position: fixed;
            bottom:5px;width: 100%;'><a style='color:#480B54;font-weight: 900;'>Исключение: Нет запрашиваемого файла</a> ('{$e->getMessage()}')\n{$e}\n</pre>";die;
        }
        catch (\Exception $e) {
            echo "Caught Exception ('{$e->getMessage()}')\n{$e}\n";
        }
    }

}