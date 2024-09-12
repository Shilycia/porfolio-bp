<?php 

//A. this is a inheritance in php all function in Parents will be include in Mychild class

// class Parents{
//     function jeniskendaraan(): string{
//         $kendaraan = readline(prompt: "data kendaraan apa yang ingin anda ambil?");
//         return $kendaraan;
//     }
// }

// class Mychild extends Parents{

//     function garasi($jenis): array{
//         if($jenis == "darat"){
//             return ['mobil', 'motor', 'bis', 'kereta'];
//         }
//         elseif($jenis == "udara"){
//             return ["pesawat", "helicopter"];
//         }
//         elseif($jenis == "laut"){
//             return ["kapal", "kapal selam"];
//         }
//         else{
//             return ["jenis kendaraan tidak ada"];
//         }
//     }
// }

// $execute = new Mychild;
// $jenis = $execute ->jeniskendaraan();
// $data = $execute -> garasi(jenis: $jenis);

// foreach($data as $kendaraan){
//     echo $kendaraan . "\n";
// }

//B. this is a override in php return move will be change in child class

// class kendaraan{
//     function move(): string{
//         return "move";
//     }
// }

// class kereta extends kendaraan{
//     function move(): string{
//         $kendaraan = "train go to next station";
//         return $kendaraan;
//     }
// }

// $execute = new kereta;
// echo $execute ->move();

// C. overloading error -> ?

// class parents{
//     public function add($a, $b): int{
//         return $a + $b;
//     }

//     public function add($a, $b, $c): int{
//         return $a + $b + $c;
//     }
// }

// $execute = new parents;

// $execute -> add(2, 4);
// $execute -> add(2, 4, 6);

// D. Abstract Method This method forces each derived child class to have a function that has an abstract method, otherwise the program will not allow creating objects with that class. If you want to pass it to another class, you can also use the abstract method on classes that don't want to implement the existing abstract function.

// abstract class MyParentClass
// {
//   abstract public function anAbstractMethod();

//   public function aNoneAbstractMethod()
//   {
//     echo "I have my own implementation." . "\n";
//   }
// }

// class MyChildClass extends MyParentClass
// {
//   public function anAbstractMethod()
//   {
//     echo "I have to provide the implementation of the abstract method I inherited from the parent class." . "\n";
//   }
// }

// abstract class MyChild2 extends MyParentClass{

// }

// $obj = new MyChildClass();
// $obj->anAbstractMethod();
// $obj->aNoneAbstractMethod();