<?php
error_reporting(E_ALL - E_WARNING);
header('Content-type: application/json');
$status_code = 404;
$json_result = array(
    'status' => 'error',
    'message' => 'Layanan tidak ditemukan'
);

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['PATH_INFO'])){
    if($_GET['n1']!=null && $_GET['n2']!=null && is_numeric($_GET['n1'])&& is_numeric($_GET['n2'])){
        $n1 = $_GET['n1'];
        $n2 = $_GET['n2'];
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
                    'result' => $n1/$n2
                );
                $status_code = 200;
            break;
            case '/divide':
                $json_result = array (
                    'status' => 'ok',
                    'result' => $n1/$n2
                );
                $status_code = 200;
            break;
            case '/power':
                $json_result = array (
                    'status' => 'ok',
                    'result' => 'Layanan Power Belum Diimplementasi'
                );
                $status_code = 501;
            break;
        }
    }
    else if($_GET['n1']==null || $_GET['n2']==null || !is_numeric($_GET['n1'])|| !is_numeric($_GET['n2'])){
        $status_code = 400;
        $json_result = array(
            'status' => 'error',
            'message' => 'n1 & n2 harus disisi dan harus angka'
        );
    }
}
http_response_code($status_code);
echo json_encode($json_result);