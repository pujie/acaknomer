<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        echo "hey";
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
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $arr = array();
        for($c=1;$c<=160;$c++){
            $randomkey = array_rand($alldata);
            $arr[$c] = $alldata[$randomkey]  ;
            unset($alldata[$randomkey]);
        }
        $data = array("numbers"=>$arr);
        $this->load->view("hiburan",$data);
    }
    function getutama(){
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $randomkey = array_rand($alldata);
        $out = $alldata[$randomkey]  ;
        unset($alldata[$randomkey]);
        $data = array("number"=>$out);
        $this->load->view("utama",$data);
    }    
    function test(){
        $this->load->helper("common");
        echo add_trailing_zero("3");
    }
}