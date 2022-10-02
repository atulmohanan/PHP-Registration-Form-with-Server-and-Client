<?php
class ArrayValue implements JsonSerializable {
    public function __construct(array $array) {
        $this->array = $array;
    }

    public function jsonSerialize() {
        return $this->array;
    }
}

$array = ['uname' => '', 'fname' => '', 'email' =>'', 'dob' =>''];
echo json_encode(new ArrayValue($array), JSON_PRETTY_PRINT);
?>
<?php
$uname= $fname= $email= $dob= null;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname=test_input($_POST("uname"));
    $fname=test_input($_POST("fname"));
    $email=test_input($_POST("email"));
    $dob=test_input($_POST("dob"));
}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>