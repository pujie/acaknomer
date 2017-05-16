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
        for($c=1;$c<=160;$c++){
            $randomkey = array_rand($alldata);
            //$key = array_search($randomkey,$alldata);
            //array_splice($alldata,$randomkey,1);
            echo $c ."=". $alldata[$randomkey]  ;
            unset($alldata[$randomkey]);
            echo "  (count ".count($alldata). ") , key = " . $randomkey . "<br />";
        }
    }
    function test(){
        $this->load->helper("common");
        echo add_trailing_zero("3");
    }
}