<?php
    include 'model.php';
    include 'calculator.php';
    $calcu = new calculator();
    $method = $_SERVER['REQUEST_METHOD']; 

    $obj = setVals($method);
    $model = new model($obj);
    
    $retVal = checkFunc($obj['func'],$model,$calcu);

    $a = array('result'=>$retVal);
    header('Content-Type: application/json');
    echo json_encode($a);

    function checkFunc(&$func,&$model,&$calcu) {
        if(isset($func)) {
            switch ($func) {
                case 'mult':
                    $retVal = $calcu->mult($model);
                    break;
                case 'avg':
                    $retVal = $calcu->avg($model);
                    break;
                case 'sum':
                    $retVal = $calcu->sum($model);
                    break;
                default:
                    $retVal = 'invalid method';
                    break;
            }
        } else {
        $retVal = 'no function set';
        }
        return $retVal;
    }

    function setVals(&$method) {
        $obj = null;
        switch ($method) {
            case 'PUT':
                parse_str(file_get_contents("php://input"),$obj);
                break;
            case 'POST':
                $obj = $_POST;  
                break;
            case 'GET':
                $obj = $_GET;
                break;
            default:
                break;
        }
        return $obj;
    }
?>