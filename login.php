<?php
session_start();
$db=mysqli_connect("localhost", "root", "", "register");

if (isset($_POST['btn'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);

    $sql="SELECT * FROM accounts WHERE username='$username' && password='$password'";
    $result=mysqli_query($db, $sql);

    if (mysqli_num_rows($result)>0){
        header("location: home.html");
    }else{
        echo "<p>Username/Password Combination Is Incorrect...</p>";
    }
}
  
?>
<?php
$db=mysqli_connect("localhost", "root", "", "register");

if (isset($_POST['sbtn'])){
    $susername=filter_input(INPUT_POST,'susername');
    $semail=filter_input(INPUT_POST,'semail');
    $smobile=filter_input(INPUT_POST,'smobile');
    $spassword=filter_input(INPUT_POST,'spassword');
    $spassword2=filter_input(INPUT_POST,'spassword2');

    if(!empty($susername)||!empty($semail)||!empty($smobile)||!empty($spassword)||!empty($spassword2)){
        if($spassword==$spassword2){
            $sql="INSERT INTO accounts(username, email, mobile, password, rpassword) VALUES('$susername', '$semail', '$smobile', '$spassword', '$spassword2') ";
            mysqli_query($db,$sql);
            echo "<p>Your Account Has Been Successfully Created...</p>";
        }else{
            echo "<p>The Two Passwords Must Be Same To Sign up...</p>";
        }
    }else{
        echo "<p>All Fields Should Be Filled To Sign Up...</p>";
    }
}
?>
<html>
<head>
    <title>20IT078 RAKUL R S</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    p{
        font-size: 25px;
        color: white;
    }
    body{
        font-family: sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        perspective: 1000px;
        background: url(https://i.pinimg.com/originals/70/15/06/70150665c0834368cd0293ec94a42372.jpg);
        background-position: center;
        background-size: cover;
    }
    .container,.scontainer{
        width: 70%;
        min-width: 70%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .scontainer{
        display: none;
    }
    .box,.sbox{
        min-height: 70vh;
        width: 70%;
        background: black;
        border-radius: 30px;
        box-shadow: 5px 5px 6px rgba(0,0,0,.5),
                   -5px -5px 6px rgba(0,0,0,.5);
        flex-wrap: wrap;
        display: flex;
        justify-content: center;
        align-items: center;
        transform-style: preserve-3d;
    }
    .sbox{
        height: 630px;
        background: dimgrey;
    }
    .h,.sh{
        color: #fc00FF;
        font-size: 50px;
        position: relative;
        margin-left: 1rem;
        display: flex;
        align-items: center;
    }
    .sh{
        color: #39FF14;
    }
    .form{
        min-width: 50%;
        min-height: 50vh;
        color: white;
    }
    label{
        font-size: 20px;
        font-family: arial;
        line-height: 2;
        font-weight: 500;
        padding-left: 20px;
    }
    input{
        width: 12rem;
        outline: none;
        border: none;
        color: white;
        background: transparent;
        border-bottom: 1px  solid white;
        margin-left: 20px;
        padding-top: 15px;
        font-size: 20px;
    }
    #btn,#sbtn{
        outline: none;
        display: flex;
        align-items: center;
        padding: 5px 80px;
        border-radius: 30px;
        margin-top: 1rem;
        margin-left: 1rem;
        background: linear-gradient(90deg,#00DBDe 0%,#FC00FF  );
        color: white;
        font-size: 20px;
    }
    #sbtn{
        background: linear-gradient(90deg,#39FF14 0%,#fbff00 );
        color: darkblue;
    }
    #gif,#sgif{
        width: 15rem;
        height: 10rem;
        position: relative;
        bottom: -6rem;
        right: 6rem;
        z-index: 2;
    }
    #fashion,#sfashion{
        width: 10rem;
        height: 10rem;
        position: absolute;
        top: 1rem;
        right: 3rem;
    }
    #sfashion{
        top: 3rem;
    }
    h2{
        position: absolute;
        color: white;
        right: 4rem;
        top: 10rem;
        text-align: center;
        text-shadow: 2px 2px 2px black;
        max-width: 200px;
        line-height: 1.2;
        z-index: 5;
    }
    #shead{
        font-size: 35px;
        top: 13rem;
    }
    .path,.spath{
        position: absolute;
        min-height: 100%;
        width: 100%;
        background: linear-gradient(90deg,#00DBDe 0%,#FC00FF  );
        clip-path: circle(350px at right 130px);
        border-radius: 30px;
    }
    .spath{
        clip-path: circle(360px at right 330px);
        background: linear-gradient(90deg,#fbff00 0%,#39FF14  );
    }
    .new,.snew{
        display: block;
        margin-left: 20px;
        color:#00DBDe;
    }
    .snew{
        color: #fbff00;
    }
    #show{
        color:#FC00FF;
        text-decoration: none;
    }
    #sshow{
        color: #39FF14;
        text-decoration: none;
    }
</style>
<body>
    <div class="container" id="container">
        <div class="box" id="login">
            <div class="path"></div>
            
            <div class="form" id="form">
                <h1 class="h">Login</h1><br><br>
                <form action="login.php" method="post">
                <label>Username</label><br><br>
                <input name="username" type="text" required ><br><br>
                <label>Password</label><br><br>
                <input name="password" type="password" required maxlength="8"><br><br>
                <button name="btn" id="btn" type="submit">Login</button><br>
                </form>
                <span class="new">New User? <a href="#" id="show" onclick="sign()"><b>Sign Up</b></a> </span>
            </div>
            <img src="https://static.wixstatic.com/media/5ca4dc_10afde8ec51e4373a23a28e199902a43~mv2.gif" id="gif">
            <img src="https://freepngimg.com/thumb/fashion/59317-woman-beauty-hairdresser-wall-parlour-decal-barbershop-thumb.png" id="fashion">
            <h2 id="head">MEDIKIT &nbsp;</h2>
            
        </div>
    </div>

    <div class="scontainer" id="scontainer">
        <div class="sbox" id="login">
            <div class="spath"></div>
            
            <div class="form" id="sform">
                <h1 class="sh">Sign Up</h1><br><br>
                <form action="login.php" method="post">
                <label>Name</label><br>
                <input type="text" name="susername" ><br>
                <label>Email Id</label><br>
                <input type="email" name="semail" ><br>
                <label>Mobile No</label><br>
                <input type="number" name="smobile" ><br>
                <label>Password</label><br>
                <input type="password" name="spassword" ><br>
                <label>Reenter Password</label><br>
                <input type="password" name="spassword2" ><br>
                <button name="sbtn" id="sbtn" type="submit">Sign Up</button><br>
                </form>
                <span class="snew">Existing User? <a href="#" id="sshow" onclick="signin()"><b>Login</b></a> </span>
            </div>
            <img src="https://cdn.dribbble.com/users/435189/screenshots/5502657/09_shopper.gif" id="sgif">
            <img src="https://freepngimg.com/thumb/fashion/59317-woman-beauty-hairdresser-wall-parlour-decal-barbershop-thumb.png" id="sfashion">
            <h2 id="shead">MEDIKIT &nbsp; </h2>
            
        </div>
    </div>
</body>
<script>
    const box=document.querySelector('.box');
    const container=document.querySelector('.container');
    const head=document.querySelector('#head');
    const gif=document.querySelector('#gif');
    const fashion=document.querySelector('#fashion');
    const form=document.querySelector('#form');
    const sbox=document.querySelector('.sbox');
    const scontainer=document.querySelector('.scontainer');
    const shead=document.querySelector('#shead');
    const sgif=document.querySelector('#sgif');
    const sfashion=document.querySelector('#sfashion');
    const sform=document.querySelector('#sform');
    var first = document.getElementById('container');
    var second = document.getElementById('scontainer');


   

    container.addEventListener("mouseenter",(e)=>{
        box.style.transition=".1s";
        head.style.transform="translateZ(120px)";
        gif.style.transform="translateZ(150px)";
        fashion.style.transform="translateZ(130px)";
        form.style.transform="translateZ(100px)";
        head.style.color="#CDB7B5"
        head.style.right="7rem"
        form.style.color="#FFFF00"
    })

    container.addEventListener("mouseleave",(e)=>{
        box.style.transition=".1s";
        box.style.transform="rotateY(0deg) rotateX(0deg)";
        head.style.transform="translateZ(0px)";
        gif.style.transform="translateZ(0px)";
        fashion.style.transform="translateZ(0px)";
        form.style.transform="translateZ(0px)";
        head.style.color="white"
        head.style.right="4rem"
        form.style.color="white"
    })

  

    scontainer.addEventListener("mouseenter",(e)=>{
        sbox.style.transition=".1s";
        shead.style.transform="translateZ(120px)";
        sgif.style.transform="translateZ(150px)";
        sfashion.style.transform="translateZ(130px)";
        sform.style.transform="translateZ(100px)";
        shead.style.color="black"
        sform.style.color="#FFFF00"
    })

    scontainer.addEventListener("mouseleave",(e)=>{
        sbox.style.transition=".1s";
        sbox.style.transform="rotateY(0deg) rotateX(0deg)";
        shead.style.transform="translateZ(0px)";
        sgif.style.transform="translateZ(0px)";
        sfashion.style.transform="translateZ(0px)";
        sform.style.transform="translateZ(0px)";
        shead.style.color="white"
        sform.style.color="white"
    })

   
    function sign(){
        first.style.display="none"
        second.style.display="flex"
        document.body.style.backgroundImage="url('https://img.wallpapersafari.com/desktop/1920/1080/59/68/LSaKnh.jpg')"
    }
    function signin(){
        first.style.display="flex"
        second.style.display="none"
        document.body.style.backgroundImage="url('https://i.pinimg.com/originals/70/15/06/70150665c0834368cd0293ec94a42372.jpg')"
    }

</script>
</html>
