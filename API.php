<?php
header("Content_Type:Application/Json");
require "./API_Implement.php";
if(isset($_GET['num1']) && isset($_GET['num2']))
{
    $num1=$_GET['num1'];
    $num2=$_GET['num2'];
    if(is_numeric($num1) && is_numeric($num2) )
    {
        $answer= Calculate_mul($num1,$num2);
        response(200,"GET, Successful multiplication", $answer);
    }
    else
    {
        response(200,"GET, failed multiplication,Invalid Input", Null);
    }


}

else if(isset($_POST['num1']) && isset($_POST['num2']))
{
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    if(is_numeric($num1) && is_numeric($num2) )
    {
        $answer= Calculate_mul($num1,$num2);
        response(200,"POST, Successful multiplication", $answer);
    }
    else
    {
        response(200,"POST, failed multiplication,Invalid Input", Null);
    }


}
else
{
    response(200,"failed multiplication", Null);
}
function response($status,$message,$Output)
{
    header("HTTP/1.1 ".$status);

    $reply['status']=$status;
    $reply['message']=$message;
    $reply['Output']=$Output;

    $json_reply = json_encode($reply);
    echo $json_reply;
}

?>
