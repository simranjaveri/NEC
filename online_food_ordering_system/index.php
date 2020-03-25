<?php
session_start();


include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
 





$query=mysqli_query($con,"select  tblvendor.fld_name,tblvendor.fldvendor_id,tblvendor.fld_email,
tblvendor.fld_mob,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode 
from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id;");
while($row=mysqli_fetch_array($query))
{
	$arr[]=$row['food_id'];
	shuffle($arr);
}

//print_r($arr);

 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }
 
 if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }
 $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
if(isset($message))
 {
	 
	 if(mysqli_query($con,"insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$nm','$em','$ph','$txt')"))
     {
		 echo "<script> alert('We will be Connecting You shortly')</script>";
	 }
	 else
	 {
		 echo "failed";
	 }
 }

?>
<html>
  <head>
     <title>Home</title>
	 <!--bootstrap files-->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	 
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
     
	 
	 
	 
	 <script>
	 //search product function
            $(document).ready(function(){
	
	             $("#search_text").keypress(function()
	                      {
	                       load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch2.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#result').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_text').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         $('#result').html(data);			
		                              }
	                                });
	                              });
	                            });
								
								//hotel search
								$(document).ready(function(){
	
	                            $("#search_hotel").keypress(function()
	                         {
	                         load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#resulthotel').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_hotel').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         load_data();			
		                              }
	                                });
	                              });
	                            });
</script>
<style>
//body{
     background-image:url("img/main_spice2.jpg");
	 background-repeat: no-repeat;
	 background-attachment: fixed;
	  background-position: center;
}
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}


</style>
  </head>
  
    
	<body>
	




<div id="result" style="position:fixed;top:300; right:500;z-index: 3000;width:350px;background:white;"></div>
<div id="resulthotel" style=" margin:0px auto; position:fixed; top:150px;right:750px; background:white;  z-index: 3000;"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;"><img src="/online_food_ordering_system/img/krishna.png" height="90" width="130"></span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"><?php echo $cresult['fld_name']; ?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        
		<li class="nav-item"><!--hotel search-->
		     <a href="#" class="nav-link"><form method="post"></form></a>
		  </li>
          <li class="nav-item">
		     <a href="#" class="nav-link"><form method="post"></form></a>
		  </li>
		  <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">Share Happy Seeder</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="form/index.php?msg=you must be login first"><span style="color:red; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
			
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			<a href="form/cart.php"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		
      </ul>
	  
    </div>
	
</nav>
<!--menu ends-->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/farmer.jpg" alt="Los Angeles"  height="750" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Greener Farmes</h3>
        <p>Air pollution levels are required to be reduced</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/banner1.jpg" alt="Chicago" height="750" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Say no to stubble burning</h3>
        <p>Call us to pickup your stubble for disposal in an environemnt friendly way.</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/seed.jpg" alt="New York" height="750" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Happy Seeder</h3>
        <p>Share machines and search for the nearest machine.</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>



<!--slider ends-->







<!--container 1 starts-->

<br><br>
<div class="container-fluid">
  <div class="row">
    
    <div class="col-sm-6">
	<div class="container-fluid">
	 <img src="img/stubble.jpg" height="300px" width="100%">
	</div>
	 <div class="container">
	 <p style="font-family: 'Lobster', cursive; font-weight:light;  font-size:25px;">क्या किसानों को अभी भी चूल्हा जलाना चाहिए? यहाँ इस पुरानी प्रथा का एक 'हैप्पी' समाधान है
किसानों के पास अब नए बीज बोने से पहले फसलों को जलाने का एक प्रभावी और पर्यावरण के अनुकूल विकल्प है। एफ आर्मर्स जानबूझकर गेहूं के बाद बने हुए मल को जला देते हैं, और अन्य अनाज काटा गया है। यह कटाई के बाद छोड़े गए अवशेषों से छुटकारा पाने के लिए किया जाता है, जबकि खेतों से खरपतवार की सफाई भी की जाती है। हालांकि, भले ही यह आर्थिक रूप से सस्ता अभ्यास है, लेकिन यह पर्यावरण के लिए उच्च कीमत पर आता है।

हर साल हजारों हेक्टेयर खेतों को जलाने से जबरदस्त वायु प्रदूषण होता है। यह अपशिष्ट पदार्थों को कार्बनिक पदार्थ भी डालता है। हैप्पी सीडर एक ऐसी प्रणाली है जिसमें किसानों को स्टब जलाने की आवश्यकता नहीं होती है, लेकिन अगली फसल के लिए कार्बनिक पदार्थों का इष्टतम उपयोग होता है।</p>
	 </div>
	
	</div>
	
    <div class="col-sm-6">
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	<?php
	   $food_id=$arr[0];
	  $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,
	  tblvendor.fld_phone,tblvendor.fld_address,tblvendor.fldvendor_id,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	  tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		   $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
	  <div class="container-fluid">
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		      <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		      <div class="col-sm-5">
		                     <a href="search.php?vendor_id=<?php echo $res['fldvendor_id']; ?>"><span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;">
		 <?php echo $res['fld_name']; ?></span></a>
        </div>
		 <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
		 <form method="post">
		 <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit" name="addtocart" value="<?php echo $res['food_id'];?>")" ><span style="color:green;" <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		 <form>
		 </div>
		 
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="col-sm-6">
</bu>
		 <span><li><?php echo "Receive Rs. ".$res['cost']; ?>&nbsp;for 1 Acre</li></span>
		 <span><li>Pickup within 45 Minutes</li></span>
		 </div>
		 <div class="col-sm-6" style="padding:20px;">
		 <h3><?php echo"(" .$res['foodname'].")"?></h3>
		 </div>
		 </div>
		 
	  </div>
	
	
	<?php
	  }
	?>
	</div>
	
	</div>
	
	</div>
    
  </div>
</div>




<!--container 1 ends-->






<!--container 2 starts-->

<div class="container-fluid">
     <div class="row"><!--main row-->
          <div class="col-sm-6"><!--main row 2 left-->
	           <br><br><br><br><br>
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;"><!--product container-->
	                  <?php
	                        $food_id=$arr[1];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,
	                        tblvendor.fld_phone,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid"><!--product row container 1-->
	                                               <div class="row" style="padding:10px; ">
		                            <!--hotel logo-->  <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		                                               <div class="col-sm-5">
		                            <!--hotelname-->        <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <!--ruppee-->      <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <!--add to cart-->    <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid"><!--product row container 2-->
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <!--food Image-->     <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid"><!--product row container 3-->
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                                  
		                                <!--cost-->            <span><li><?php echo "Receive Rs. ".$res['cost']; ?>&nbsp;for 1 Acre</li></span>
		                                <!--deliverytime-->    <span><li>Pickup within 45mins</li></span>
		                                                 </div>
		                            <!--deliverytime-->  <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
		 
	                                             </div>
	
	
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
	   <!--main row 2 left main ends-->
	   
	   
	   <!--main row 2 left right starts-->
	   <div class="col-sm-6">
	        
	        <div class="container">
	        <!--paragraph content--> 
	             <p style="font-family: 'Lobster', cursive; font-weight:light; font-size:25px;"></p>
	        </div>
	  </div>
	   <!--main row 2 left right ends-->
    
  </div><!--main row 2 ends-->
</div>

<!--container 2 ends-->

<!--footer primary-->
	     
		    <?php
			include("footer.php");
			?>
			 			 
		  
          

	</body>
</html>