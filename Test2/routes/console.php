<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');





//command-1;
Artisan::command('command1',function() {
    echo "welcome to php"."\n";
    echo "command is running successfully";
});





//command-2;
Artisan::command('command2',function() {
    $text1="kumar";
    $text2="is a smart boy"." ";
    $a=10.5;
    $b=4;
    $c=$a+$b;
    echo "$text1 $text2";
    echo "$c";
});






//command-3;
Artisan::command('command3',function() {
    $names=array("kumar","kiran","shankar","varun","narendra");
foreach($names as $name){
    echo "Students : $name"."\n";
    }
});





//command-4;
Artisan::command('command4',function() {
    $age="kiran";
    if($age=="kiran"){
        echo "Eligible for vote";
    }
        else{
        echo "Not eligible for vote";
    }
});



//command-5;
Artisan::command('command5',function() {
    $names=array("kiran","kumar","shankar");
    //adding new element to the array
    $names[4]="varun";
    //removing array element
    unset($names[1]);//removing kumar name
    var_dump($names);//printing purpose
    foreach($names as $name) {
    echo "Name : $name";
    }
});





//command-6;
Artisan::command('command6',function(){
    $sum=0;
    $numbers=array(1,2,3,4,5);
    foreach($numbers as $num)
    {
        $sum=$sum+$num;
    }
     echo " Total sum : $sum";
});



//command-7;
Artisan::command('command7',function() {
    $values=[10,20,30,40,50];
    $areas=array_map(function($value) {
         return $value * $value; 
        },$values);
    
    print_r($areas);
    
    // foreach( $values as $value){
    //     echo $value*$value ."\n";
    // }
});






//command-8;
Artisan::command('command8',function() {
   
    $html['title']='PHP Associate Arrays';
    $html['description']='Learn how to use associate arrays in php';
    print_r($html);
    echo "$html[description]";
 });





 
 //command-9;
 Artisan::command('command9',function() {
    class Employee{
        public $empname;
        public $empid;
        public $empsal;
        public $empjob;
        public function __construct($ename,$eid,$esal,$ejob){
            $this->empname=$ename;
            $this->empid=$eid;
            $this->empsal=$esal;
            $this->empjob=$ejob;
        }
    } 
    $emp[] =new Employee("kumar",1002,2000,"software tester");
    $emp[] =new Employee("om",1001,30000,"software developer");
    foreach($emp as $e)
    // print_r($emp);
    echo ("Employee name   : ".$e->empname."\n".
         "Employee id     : ".$e->empid."\n".
         "Employee salary : ".$e->empsal."\n".
         "Employee job    : ".$e->empjob."\n");
 });



 

 //command-10;
 Artisan::command('command10',function() {
    $role="developer";
    $message="";
    switch($role){
        case "admin":
            $message="welocme admin";
            break;
        case "editor":
            $message="thanq editor";
            break;
        case "author":
            $message="This is a author case expression";
            break;
        case "subscriber":
            $message="welcome to my youtube channel";
            break;
        default:
            $message="This is a default message";
    }
        echo $message;
 });







 //command-11;
 Artisan::command("command11",function() {
     $names=array("kumar","kiran","shankar","varun","narendra");
     echo "My friends are : ".$names[0]." ".$names[1].",".$names[2].",".$names[3]." and ".$names[4];
     });








 //command-12;
 Artisan::command('command12',function(){
    $names=array("Fabio","Klevi","John");
    $arrayLength=count($names);
    for($i=0;$i<$arrayLength;$i++){
        echo $names[$i];
    }
    // foreach($names as $name)
    // print_r($name);
    print_r(  $arrayLength);
    
 });






//command-13;
Artisan::command("command13",function() {
    $numbers=[1,2,3,4,5,6,7,8,9,10];
    $even_numbers=array_filter(
    $numbers,
    function($number){
      return $number%2==0;
    }
);
print_r($even_numbers);
});





//command-14;
Artisan::command("command14",function() {
    $numbers=[10,20,30,40,50];
function display($a,$b){
    return $a-$b;
}
print_r(array_reduce($numbers,"display"));
});
 




//command-15;
Artisan::command('command15',function() {
    class Employees{
        public $empname;
        public $empid;
        public $empsal;
        public $empjob;
        public function __construct($ename,$eid,$esal,$ejob){
            $this->empname=$ename;
            $this->empid=$eid;
            $this->empsal=$esal;
            $this->empjob=$ejob;
        }
    }
    $emp[] =new Employees("kumar",1002,20000,"software tester");
    $emp[] =new Employees("om",1001,25000,"Business analyst");
    $emp[] =new Employees("varun",1003,40000,"software developer");
    echo "Employees salary less than 3000";
    print_r(array_filter($emp,
    function($Emphh)
    {
        return $Emphh->empsal<30000;
    }
));
});
