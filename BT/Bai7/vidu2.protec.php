<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    class Person
    {
        protected $name;
        protected $age;

        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        function set_name($name)
        {
            $this->name = $name;
        }

        function get_name()
        {
            return $this->name;
        }

        function set_age($age)
        {
            $this->age = $age;
        }

        function get_age()
        {
            return $this->age;
        }
    }

    class Female extends Person
    {
        protected $local;
        public function __construct($name, $age, $local)
        {
            $this->name = $name;
            $this->age = $age;
            $this->local = $local;
        }

        public function intro()
        {
            echo "Tên: {$this->name} <br> Tuổi: {$this->age} <br> Địa chỉ: {$this->local}";
        }
    }

    //Gọi đối tượng từ bên ngoài
    $female = new female("Lan", "30", "Ha Noi");
   // echo $female->intro();
    //Lệnh gọi kiểm tra lớp cha 
    $female->name;
    
    //Lệnh gọi kiểm tra lớp con
   // $female->local;


    ?>
</body>

</html>