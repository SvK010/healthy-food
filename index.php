<?php  
 
 $connect = mysqli_connect("localhost", "root", "", "healthy_food");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'=>$_GET["id"],  
                     'item_name'=>$_POST["hidden_name"],  
                     'item_price'=>$_POST["hidden_price"],  
                     'item_quantity'=>$_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>location.href="#anchor5"</script>';  
           }  
           else  
           {  
                echo '<script>location.href="#anchor5"</script>';
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'=>$_GET["id"],  
                'item_name'=>$_POST["hidden_name"],  
                'item_price'=>$_POST["hidden_price"],  
                'item_quantity'=>$_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                    unset($_SESSION["shopping_cart"][$keys]);  
                    echo '<script>location.href="#anchor5"</script>';
                }  
           }  
      }  
 }  
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
        <title>Healthy Food</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        <link href="css/style.css"  rel="stylesheet" type="text/css">
</head>
    <body>
        <header>
            <div class="container">
                <div class="heading clearfix">
               <nav>
                    <ul id="menu">
                        <li><a href="#anchor1">About us</a></li>
                        <li><a href="#anchor2">Shop</a></li>
                        <li><a href="#anchor3">Our items</a></li>
                        <li><a href="#anchor4">Contact us</a></li>
                        <li><a href="#anchor5">Cart</a></li>
                    </ul>
                </nav>
                </div>
                <div class="titles">
                   <h1>
                       Healthy For <b>Everyone</b>
                    </h1>
                    <div class="titles-first">
                         Organic fruits, vegetables, and lot more to your door
                    </div>
                    
                </div>
                    <div class="button-gradient">                
                     <a class="button" href="#anchor2" >Go shopping</a> 
                </div>   
                    <img src="img/line.png" alt="Img bottom" class="img-bottom">
            </div>                    
        </header>        
        
        <section id="about-farmfood">
           <div id="anchor1">
            <div class="container organic">
                <div class="title">
                    <h2>We are <b>organic farmfood</b></h2>
                    <p class="text-1">About naturix farmfood</p>
                    <p class="text-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quod expedita, totam nam vitae, explicabo saepe maxime optio odit repellendus tenetur vero eligendi architecto similique magnam consequatur quis hic cumque.</p>
                </div>
                <div class="qualities clearfix">
                    <div class="qualities-item">
                        <img src="img/corn_circle.png" width="115" height="115" class="circle">
                        <img src="img/corn.png" class="image">
                        <h3><b>fresh from</b> naturix farm</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut laborum aliquam maiores</p>
                        <a class="button-read" href="#">Read more</a>
                    </div>
                    <div class="qualities-item">
                        <img src="img/mush_circle.png" class="circle">
                        <img src="img/mushroom.png" class="image">
                        <h3><b>100%</b> organic goods</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut laborum aliquam maiores</p>
                        <a class="button-read" href="#">Read more</a>
                    </div>
                    <div class="qualities-item">
                        <img src="img/watermelon_circle.png" class="circle">
                        <img src="img/watermelon.png" class="image">
                        <h3><b>premium</b> quality</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut laborum aliquam maiores</p>
                        <a class="button-read" href="#">Read more</a>
                    </div> 
                    <div class="qualities-item">
                        <img src="img/pumpkin_circle.png" class="circle">
                        <img src="img/pumpkin.png" class="image">
                        <h3><b>100%</b> natural</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut laborum aliquam maiores</p>
                        <a class="button-read" href="#">Read more</a>
                    </div>                
                </div>
                <div class="orange">
                    <img src="img/orange_big.png" alt="Orange" width="600px" height="400px" class="grapefruit">
                </div>
            </div>
            </div>
        </section>        
        
        <section class="organic-goods">
          <div id="anchor2">
           <div class="title">
                   <p class="text-1">Fresh from our farm</p>
                   <h2>naturix <b>organic goods</b></h2>
            </div>
                    
  <div class="category row">
   <div class="catalog">
        <div class="flex">
        <?php
$query = "SELECT * FROM product ORDER BY product_id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
            <div class="block">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">  
                        <p class="catalog-item-image">
                               <img src="<?php echo $row["product_image"]; ?>" class="img-responsive" width="185"/><br />
                        </p>  

                            <h3><span class="catalog-item-title"><?php echo $row["product_name"]; ?>
                           </h3></span> 
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />  
                               <p class="catalog-item-price"><b>$ <?php echo $row["product_price"]; ?></b>
                               </p>                                
                               <input class="button1" type="submit" name="add_to_cart" value="Buy"></input>
                     </form>  
                </div>
                <?php  
                     }  
                }  
                ?>      
    </div>
</div>   
</div>  
</div> 



       <section>
           <div id="anchor3">
            <div class="flex1">
    <div class="itm itm1">
       <a href="#">
        <img src="img/berry_red.png" class="img-itm">
        <img src="img/berry.png" class="inner-img">
        <hr>
           <p>organic <b>fruits</b></p>
           <p class="i-span"><i>23 items</i></p>
       </a>
    </div>
    <div class="itm itm2">
        <a href="#">
        <img src="img/tomato_green.png" class="img-itm">
        <img src="img/tomato.png" class="inner-img">        
        <hr>
            <p>organic <b>fruits</b></p>
            <p class="i-span"><i>23 items</i></p>
       </a>
    </div>
    <div class="itm itm3">
        <a href="#">
        <img src="img/orange_bread.png" class="img-itm">
        <img src="img/bread.png" class="inner-img" width="40" height="45">
        <hr>
            <p>organic <b>fruits</b></p>
            <p class="i-span"><i>23 items</i></p>
       </a>
    </div>
    <div class="itm4 txt">
       <div class="title">
        <p class="text-1">fresh from our farm</p>
           <p class="text2">220+ <b>fruits, vegetables</b> & <b>lot more</b></p>
        <p class="text3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita officia illum, adipisci sint quaerat iste nulla! Culpa, saepe deleniti eveniet ipsam dicta voluptatem cupiditate velit, corrupti, dolor totam expedita quasi.</p>
        </div>
    </div>
</div>
       <div class="flex1">
    <div class="itm5 txt">
       <div class="title">
        <p class="text-1">fresh from our farm</p>        
        <p class="text2">115+ <b>organic juices</b> and <b>organic tea</b></p>
        <p class="text3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, doloribus magni reiciendis! Illo quo enim, voluptatum dicta nobis facilis suscipit sunt ipsa veritatis modi similique, eaque excepturi nisi fuga iure!</p>
        </div>
    </div>
    <div class="itm itm6">
        <a href="#">
        <img src="img/blue_juice.png" class="img-itm">
        <img src="img/juice.png" class="inner-img" width="25" height="35">
        <hr>
            <p>organic <b>fruits</b></p>
            <p class="i-span"><i>23 items</i></p>
       </a>
    </div> 
    <div class="itm itm7">
        <a href="#">
        <img src="img/blue_drinks.png" class="img-itm">
        <img src="img/drinks.png" class="inner-img" width="" height="">
        <hr>
            <p>organic <b>fruits</b></p>
            <p class="i-span"><i>23 items</i></p>
       </a>
    </div>
    <div class="itm itm8">
        <a href="#">
        <img src="img/violet_tea.png" class="img-itm">
        <img src="img/tea.png" class="inner-img" width="35" height="">
        <hr>
            <p>organic <b>fruits</b></p>
            <p class="i-span"><i>23 items</i></p>
       </a>
    </div>
</div>
           </div>
        </section>
       
    <div id="anchor4">         
        <footer class="main-footer">
                <div class="footer-contacts">
                    <img src="img/leaves.png" width="15" height="25">
                    <h3>Logo <b>Here</b></h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur <br>
                    adipisicing elit. Magni perspiciatis <br>
                        neque optio nobis suscipit </p>
                    <div class="icon geolocation"></div>
                <p class="location"> 100 highland ave, California, United States</p>
                    <div class="icon email"></div>
                <p class="location"> contact@naturix.com</p>
                    <div class="icon site"></div>
                <a href="#" class="location">www.website.com</a>
                </div>
            <div class="footer-information">
                <p>naturix <b>information</b></p>
                <hr>
                <ul>
                    <li>about our shop</li>
                    <li>top sellers</li>
                    <li>our blog</li>
                    <li>new products</li>
                    <li>secure shopping</li>
                </ul>
            </div>
            <div class="footer-photos">
                <p>photo <b>instagram</b></p>
                <hr>
                <div class="footer-photo">
                 <img src="img/inst1.png" class="photo p-1">
                 <img src="img/inst2.png" class="photo p-2">
                 <img src="img/inst3.png" class="photo p-3">
                 <img src="img/inst4.png" class="photo p-4">
                 <img src="img/inst5.png" class="photo p-5">
                 <img src="img/inst6.png" class="photo p-6">
                </div>
            </div>
        </footer>   
        </div>
        
        <div id="button-up">
    <img src="img/gototop.png" width="70" height="70">
</div>
        
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="index.js"></script>   
        <script src="jquery-3.0.0.min.js"></script>  
                       
    </body>
</html>