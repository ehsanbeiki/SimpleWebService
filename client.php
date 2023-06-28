<!DOCTYPE html>
<html>

<head>
    <title>User Interface</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="Style/css/client.css" />


</head>

<body>
<div class="Content">
            <form class="Form" action="" method="post">

                <label for="">عدد اول را وارد کنید:</label><br>
                <input type="text" name="num1"  required> <br><br>

                <label for="">عدد دوم را وارد کنید:</label><br>
                <input type="text" name="num2"  required> <br><br>
                
                <button class="clickBtn" type="submit"   name="submit">محاسبه</button>
                
                <?php 
                if (isset($_POST['submit']))
                {
                    $num1=$_POST['num1'];
                    $num2=$_POST['num2'];
                    $url="http://localhost/EAI/API/".$num1.','.$num2;
                    $client = curl_init($url);
                    curl_setopt($client,CURLOPT_RETURNTRANSFER,TRUE);

                    $reply = curl_exec($client);
                    $result = json_decode($reply);

                // echo $reply;
                
                    $Output=$result->Output;

                    echo '<label for="">حاصل ضرب</label><br>';
                    echo '<input type="" id="output" value="'. $Output .'" readonly> <br>';
                    
                    echo '<label for="">پاسخ وب سرویس</label><br>';
                    echo '<p class="WebService" >'.$reply.'</p><br>';                    
            
                }

                ?>

            </form>
        </div>

</body>

