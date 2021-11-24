<?php

class ApiView{

    public function response($comentarios, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($comentarios);
    }
    
    private function _requestStatus($code){
        $status = array(
            200 => "OK",
            401 => "Unautorized",
            403 => "Forbidden",
            404 => "Not found",
            500 => "Internal Server Error",
            501 => "Internal Error in Tasks web"
          );
          return (isset($status[$code]))? $status[$code] : $status[500];
    }
}
