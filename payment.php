
<?php


$db=mysqli_connect("localhost", "root", "", "shipping");

if (isset($_POST['btn'])){
    $name=filter_input(INPUT_POST,'firstname');
    $email=filter_input(INPUT_POST,'email');
    $mobile=filter_input(INPUT_POST,'mobile');
    $address=filter_input(INPUT_POST,'address');
    $city=filter_input(INPUT_POST,'city');
    $state=filter_input(INPUT_POST,'state');
    $zip=filter_input(INPUT_POST,'zip');
    $stotal=filter_input(INPUT_POST,'stotal');
    $sproduct=filter_input(INPUT_POST,'sproduct');
  

    if(!empty($name)||!empty($email)||!empty($mobile)||!empty($address)||!empty($city)||!empty($state)||!empty($zip)){
        if(!empty($name)){
            if(!empty($email)){
                if(!empty($mobile)){
                    if(!empty($address)){
                        if(!empty($city)){
                            if(!empty($state)){
                                if(!empty($zip)){
                                    $sql="INSERT INTO details(name, email, mobile, address, pin, city, state, product, cost) VALUES('$name', '$email', '$mobile', '$address', '$zip', '$city', '$state', '$sproduct', '$stotal') ";
                                    mysqli_query($db,$sql);
                                    echo "<h1>$name, Your <span>$sproduct</span> Is Started Flying To Your Home...</h1>";
                                    echo "<h2>Drones Are On The Way...</h2>";
                                    echo "<a href='home.html'>Click Me To Continue Your Fashion Hunts...</a>";
                                    echo "<body style='background-image:url(https://cdn2.vectorstock.com/i/1000x1000/75/21/drones-delivery-logo-vector-13837521.jpg)'>";
                                }else{
                                    echo "<p>*Enter </span>Pin Code</span>...</P>";
                                }
                            }else{
                                echo "<p>*Enter The <span>State</span>...</P>";
                            }
                        }else{
                            echo "<p>*Enter The <span>City</span>...</p>";
                        }
                    }else{
                        echo "<p>*Enter The <span>Address</span>...</p>";
                    }
                }else{
                    echo "<p>*Enter The <span>Mobile Number</span>...</p>";
                }
            }else{
                echo "<p>*Enter The <span>Email Id</span>...<?p>";
            }
        }else{
            echo "<p>*Enter The <span>Name</span>...</p>";
        }
    }else{
        echo "<p>*All Field Are <span>Mandatory</span>, Kindly Fill The Required Details...</p>";
    }
}
?>
<style>
    *{
        text-align: center;
    }
body{
    background: linear-gradient(90deg,#00f260 0%,#0575e6);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
p{
    font-size: 35px;
    padding-top: 200px;
    color: red;
}
h1{
    margin-top: 100px;
    color: white;
}
h2{
    padding-top: 180px;
    color: yellow;
}
span{
    font-weight: bold;
    font-size: 55px;
    background: transparent;
}
a{
    background: transparent;
    font-size: 40px;
    text-decoration: none;
}
</style>