<?php

class Dao
{
    private $con;

    function __construct($user, $pass, $db)
    {
        $host = "localhost"; 
        $port = 3307; 
        $this->con = mysqli_connect($host, $user, $pass, $db, $port);

        if (!$this->con) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

    public function query($sql)
    {
        $rs = mysqli_query($this->con, $sql);
        return $rs;
    }

    function table($sql, $header)
    {
        $rs = $this->query($sql);
        $fieldinfo = mysqli_fetch_fields($rs);
        $str = "<table border='1' cellpadding='5' cellspacing='0'><tr>";

        foreach ($fieldinfo as $val) {
            $name = $val->name;
            $str .= "<th>" . $name . "</th>";
        }
        $str .= "</tr>";

        while ($r = mysqli_fetch_array($rs)) {
            $str .= "<tr>";
            foreach ($fieldinfo as $val) {
                $name = $val->name;
                $str .= "<td>" . $r[$name] . "</td>";
            }
            $str .= "</tr>";
        }

        $str .= "</table>";

        echo "<h3>{$header}</h3>";
        echo $str;
    }
}
?>
