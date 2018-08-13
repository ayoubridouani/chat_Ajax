<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $file = fopen("database.txt", "r");
    $user1 = "";
    $user2 = "";
    while(!feof($file)){
        $line =  fgets($file);
        if(!empty($line)){
            $lines = explode("#", $line);
            if(!empty($lines[1])){
                if(empty($user1)) {
                    $user1 = $lines[0];
                }
                $temp = $lines[0];
                if($temp != $user1){
                    $user2=$temp;
                }
                if($user1==$lines[0]){
                    $output = "<div style='max-width: 350px;max-height: 1000px;background-color: #524a4a;border-radius: 4px;float: right;clear: both;margin: 12px 20px 0px 0px;padding: 10px;'>" . "<span style='color:red'>" . $lines[0] . "</span>" . " : ". $lines[1] . "</div>";
                    echo $output;
                }
                if($user2==$lines[0]){
                    $output = "<div style='float: left;max-width: 350px;max-height: 1000px;background-color: #7d7d7d;border-radius: 4px;clear: both;margin: 12px 20px 0px 20px;padding: 10px;'>" . "<span style='color:red'>" . $lines[0] . "</span>" . " : ". $lines[1] . "</div>";
                    echo $output;
                }
            }
        }
    }
    fclose($file);
}



