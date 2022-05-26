<?php

   
   // include 'abbyy_php_example.php';
    @$name=$_FILES['file']['name'];
    @$size=$_FILES['file']['size'];
    @$type=$_FILES['file']['type'];
    @$tmp_name=$_FILES['file']['tmp_name'];
    @$count= strpos($name,'.')+1;
    $extensation=strtolower(substr($name,$count));
    //echo $size;
    $max_size=1190569;
    //echo $name;
    if(isset($name))
    {
        
        if(!empty($name))
        {
            if($type=='image/jpeg' ||$type=='image/png'||$type=='image/jpg')
            {
                if($extensation=='jpeg'||$extensation=='jpg'||$extensation=='png')
                {
                    if($size<($max_size))
                    {
                        
                        $location="images/";
                        if(move_uploaded_file($tmp_name,$location.$name))
                        {
                            //echo "Your File is UPloaded";
                            //include 'ocr2.php';
                            try
                            {
                            include 'ocr.php';
                            ORCArabic($name);
                            }
                             catch(exception $x)
                              {
                                echo "<script>  alert('you must connect to the enternet') </script>";
                              }
                           
                        }
                        else
                        {
                            echo "yupr file is not Uploaded";
                            
                        }
                    }
                    else
                    {
                        echo 'Max Size must be 1MB';
                    }
                } 
                else
                {
                    echo "Image must be at extention .png or .jpg or .jpeg ";
                }
            }
            else
            {
                echo 'This File not image';
            }
            
        }
        
    }
	
?>
<style type="text/css">
body
{
    background-color: lubna;
   

}

#up
{
  text-align: center;
  background-color: e3e3e3;
  width: 500px;
  height: 200px;
  position: absolute;
  left: 30%;
  top: 20%;
  -moz-border-radius: 1em;
  -webKit-border-radius:6px;
}
#check
{
  background-color: #ccc;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:6px;
    color: #fff;
    font-family: 'Oswald';
    font-size: 20px;
    text-decoration: none;
    cursor: pointer;
    border:none;
   position:absolute;
   top: 50%;
   left: 30%
}
#check:hover {
    border: none;
    background:red;
    box-shadow: 0px 0px 1px #777;
}
#browse
{
 
  cursor: pointer;
	display: inline;
  
  position: absolute;
  top: 30%;
  left: 30%;
  font-size: 15px;
  
}
h2
{
  font-size: 25px;
  color: red;
}
h1{
  text-align: center;
  font-size: 50px;
  color: mediumaquamarine;
}
#dr
{
    position: absolute;
  top: 60%;
  left: 40%;
  font-size: 30PX;
  font-family: 'Oswald';
  color: magenta;
}




</style>
<body>

<h1>Arabic OCR </h1>
<div id="up">
<form method="POST" action="index.php" enctype="multipart/form-data" >
<b><h2>Select Image to: </h2> </b><br />
<input type="file" name="file" id="browse" /><br />
<input  type="submit" name="sub" value="Check OCR Arabic" id="check"/>
</div>
<div id="dr">


</div>


</form>
</body>
