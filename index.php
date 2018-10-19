<?php
error_reporting(E_ALL - E_WARNING);
header('Content-type: application/json');


if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['PATH_INFO'])){
        $n1 = $_GET['n1'];
        $n2 = $_GET['n2'];
        $tempN1 = (int)$_GET['n1'];
        $tempN2 = (int)$_GET['n2'];
        if(!isset($_GET['n1']) || !isset($_GET['n2']) || !is_numeric($_GET['n1']) || !is_numeric($_GET['n2']) || $n1-$tempN1 !=0 ||$n2-$tempN2!=0){
            $status_code = 400;
            $json_result = array(
                'status' => 'error',
                'message' => 'Parameter n1 dan n2 wajib ada dan harus berupa bilangan bulat'
            );
        }
        else{
            switch($_SERVER['PATH_INFO']){
                case '/add':
                    $json_result = array (
                        'status' => 'ok',
                        'result' => $n1+$n2
                    );
                    $status_code = 200;
                break;
                case '/substract':
                    $json_result = array (
                        'status' => 'ok',
                        'result' => $n1-$n2
                    );
                    $status_code = 200;
                break;
                case '/multiply':
                    $json_result = array (
                        'status' => 'ok',
                        'result' => $n1*$n2
                    );
                    $status_code = 200;
                break;
                case '/divide':
                if($n2==0){
                    $json_result = array (
                        'status' => 'error',
                        'result' => "Ada masalah dalam operasi aritmatik"
                    );
                    $status_code = 500;
                }
                else{
                    $json_result = array (
                        'status' => 'ok',
                        'result' => $n1/$n2
                    );
                    $status_code = 200;
                }
                break;
                case '/power':
                    $json_result = array (
                        'status' => 'error',
                        'result' => 'Layanan power belum diimplementasi'
                    );
                    $status_code = 501;
                break;
                default:
                    $json_result = array (
                        'status' => 'error',
                        'result' => "Layanan tidak ditemukan: ".substr($_SERVER['PATH_INFO'],1)
                    );
                    $status_code = 404;
                break;
            }
        }
    
}
http_response_code($status_code);
echo json_encode($json_result);
?>