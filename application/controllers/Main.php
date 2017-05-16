<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->resetarray();
        $this->load->view("main");
    }
    function savearray($arr){
        $sess = $_SESSION['remain'] = $arr;
    }
    function getarray(){
        if(isset($_SESSION['remain']))
        {return $_SESSION['remain'];}
        else
        {
            $this->load->model("data");
            $alldata = $this->data->numbers();
            $_SESSION["remain"] = $alldata;            
            return $_SESSION["remain"];
        }
    }
    function resetarray(){
        session_start();
        unset($_SESSION["remain"]);
    }
    function numbers(){
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $randomval = array_rand($alldata);
        echo $randomval . "<br />";
        foreach($alldata as $key=>$val){
            echo $key . "=>". $val . "<br />";
        }
    }
    function gethiburan(){
        session_start();
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $arr = array();
        for($c=1;$c<=160;$c++){
            $randomkey = array_rand($alldata);
            $arr[$c] = $alldata[$randomkey]  ;
            unset($alldata[$randomkey]);
        }
        $this->savearray($alldata);
        $data = array("numbers"=>$arr,"sesscount"=>count($_SESSION['remain']));
        $this->load->view("hiburan",$data);
    }
    function getutama(){
        session_start();
        $alldata = $this->getarray();
        $randomkey = array_rand($alldata);
        if(count($alldata)>0){
            $out = $alldata[$randomkey]  ;
            unset($alldata[$randomkey]);
            $this->savearray($alldata);
            $data = array("number"=>$out,"sesscount"=>count($_SESSION['remain']));
            $this->load->view("utama",$data);
        }else{
            $this->load->view("datahabis");
        }
    }
}