<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    
    //Lớp cha
    class Person
    {
        public $name;
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


    //Lớp con
    class Female extends Person
    {
        public $local;
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
    $female->intro();
      echo " <br /> địa chỉ: ";
    echo $female->local;
    echo " <br /> tên ";
    echo $female->name;
    echo "  <br /> tuổi sẽ bị lỗi sau";

     echo $female->age;
    ?>
</body>

</html>