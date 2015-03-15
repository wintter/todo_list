<?php
namespace app\core\classes;

Class PdoException extends \app\core\classes\AbstractException {

    public static function invalidClaim()
    {
        try {
            throw new self;
        }
        catch (PdoException $e) {
            echo "<pre style='color:#a94442;background: #f2dede;font-size: 15px;padding:10px;position: fixed;
            bottom:5px;width: 100%;'><a style='color:#480B54;font-weight: 900;'>Исключение: Запрос не выполнен</a> ('{$e->getMessage()}')\n{$e}\n</pre>";die;
        }
        catch (\Exception $e) {
            echo "Caught Exception ('{$e->getMessage()}')\n{$e}\n";
        }
    }

}