<?php
    class Person{
        /*здоровье персонажа не может превышать 100 единиц*/
        private $name;
        private $lastname;
        private $age;
        private $hp = 100;
        private $mother;
        private $father;


        public function __construct($name, $lastname, $age, $mother=null, $father=null){
            $this->name = $name;
            $this->lastname = $lastname;
            $this->age = $age;
            $this->mother = $mother;
            $this->father = $father;
        }


        public function getMother(){
            return $this->mother;
        }

        public function getFather(){
            return $this->father;
        }

        public function getName(){
            return $this->name;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function getAge(){
            return $this->age;
        }

        public function getHP(){
            return $this->hp;
        }

        public function sayHI(){
            return 'Привет, меня зовут '.$this->name." у меня ".$this->hp." здоровья";
        }

        public function setHP($value){
            if($this->hp + $value > 100){
                $this->hp = 100;
            }else{
                $this->hp += $value;
            }
        }

        public function info(){
            $result = 'Меня зовут: '.$this->name."<br>";
            if($this->getMother() != null) {
                $result .= 'Мою маму зовут: ' . $this->getMother()->getName()."<br>";
                if($this->getMother()->getFather() != null){
                    $result .= 'Моего дедушку по маминой линии зовут: ' . $this->getMother()->getFather()->getName()."<br>";
                }
                if($this->getMother()->getMother() != null){
                    $result .= 'Мою бабушку по маминой линии зовут: ' . $this->getMother()->getMother()->getName()."<br>";
                }
            }
            if($this->getFather() != null){
                $result .= 'Моего папу зовут: ' . $this->getFather()->getName()."<br>";
                if($this->getFather()->getFather() != null){
                    $result .= 'Моего дедушку по папиной линии зовут: ' . $this->getFather()->getFather()->getName()."<br>";
                }
                if($this->getFather()->getMother() != null){
                    $result .= 'Мою бабушку по папиной линии зовут: ' . $this->getFather()->getMother()->getName()."<br>";
                }
            }

            return $result;

        }

    }

//    $medKit = 50;

    $person7 = new Person('Stephen', 'Curry', 74 );
    $person6 = new Person('Liza', 'Curry', 70);
    $person5 = new Person('Angela', 'Igoreva', 69);
    $person4 = new Person('Igor', 'Igorev', 77);
    $person3 = new Person('Ivan', 'Ivanov', 42, $person6, $person7);
    $person2 = new Person('Olga', 'Ivanova', 39, $person5, $person4);
    $person1 = new Person('Alex', 'Ivanov', 16, $person2, $person3);

//    echo $person1->getMother()->getName()."<br>";

    echo $person1->info()."<br>";
    echo $person2->info()."<br>";
    echo $person3->info()."<br>";



    /*echo $person1->getHP()."<br>";
    $person1->setHP(-30);
    echo $person1->getHP()."<br>";
    $person1->setHP($medKit);
    echo $person1->getHP()."<br>";*/

