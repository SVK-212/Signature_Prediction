<?php
$result="";
$op=[];
$op2="";
$setp="";
$tgfiles=[];
$lplimit=1;
for($x=0;$x<$lplimit;$x++){
$setp.='<input type="file" name="f'.$x.'" id="f'.$x.'"><br>';

}
if(isset($_POST['sbm']))
{
$target_dir = "svc/predict/";
$uploadOk = 1;

for($x=0;$x<$lplimit;$x++){
array_push($tgfiles,$target_dir . @basename($_FILES["f".$x]["name"]));
$imageFileType = @strtolower(pathinfo($tgfiles[$x],PATHINFO_EXTENSION));

    $check = @getimagesize($_FILES["f".$x]["tmp_name"]);
    if($check !== false) {
        @move_uploaded_file($_FILES["f".$x]["tmp_name"], $target_dir . "001001_00".$x.".jpg");
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }

    $uploadOk = 1;
}
    exec("predict.py",$op,$result);
    


}
?>
<html>
<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<p><?=$setp?></p>
		<input type="submit" name="sbm">
	</form>
	<br>
	<p><?=join(" ",$op)?></p>
	</body>
</html>