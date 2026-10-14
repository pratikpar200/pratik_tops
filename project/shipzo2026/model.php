<?php

class model{

    public $conn="";

    function __construct(){
        $this->conn = new mysqli('localhost','root','','shipzo');
    }

    public function select($tbl){

        $sel="select * from $tbl";
        $run=$this->conn->query($sel);

        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }

        return $arr;
    }

    function insert($tbl,$arr){

        $col_arr=array_keys($arr);
        $col=implode(",",$col_arr);

        $value_arr=array_values($arr);
        $value=implode("','",$value_arr);

        $ins="insert into $tbl ($col) values('$value')";

        $run=$this->conn->query($ins);
        return $run;
    }

    function select_where($tbl,$arr){

        $col_arr=array_keys($arr);
        $value_arr=array_values($arr);

        $i=0;

        $sel="select * from $tbl where 1=1";

        foreach($arr as $w)
        {
            $sel.=" and $col_arr[$i]='$value_arr[$i]'";
            $i++;
        }

        $run=$this->conn->query($sel);
        return $run;
    }

    function update_where($tbl,$arr,$where){

        $col_arr=array_keys($arr);
        $value_arr=array_values($arr);

        $i=0;

        $upd="update $tbl set ";

        foreach($arr as $w)
        {
            $upd.="$col_arr[$i]='$value_arr[$i]',";
            $i++;
        }

        $upd=rtrim($upd,",");

        $where_col=array_keys($where);
        $where_val=array_values($where);

        $j=0;

        $upd.=" where 1=1";

        foreach($where as $w)
        {
            $upd.=" and $where_col[$j]='$where_val[$j]'";
            $j++;
        }

        $run=$this->conn->query($upd);
        return $run;
    }

    function delete_where($tbl,$arr){

        $col_arr=array_keys($arr);
        $value_arr=array_values($arr);

        $i=0;

        $del="delete from $tbl where 1=1";

        foreach($arr as $w)
        {
            $del.=" and $col_arr[$i]='$value_arr[$i]'";
            $i++;
        }

        $run=$this->conn->query($del);
        return $run;
    }

} // <-- class model close

$obj = new model();

?>