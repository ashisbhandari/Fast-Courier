<html>
    <head>
        <title>form</title>
<style>
    body{
        background-color: rgb(212, 212, 212);
    }
.first{
    text-align: center;
    background-color: rgb(255, 255, 255);
    width: 30%;
    margin-left: 35%;
    border: 1px solid rgb(255, 255, 255);
}
h1{
   
    color: rgb(0, 0, 0);
    text-align: center;
}
label{
    font-size: 15px;
    color: rgb(12, 12, 12);
    font-family: arial;
}
.second{
    margin-left: 10px;
}
span{
    font-size: 20px;
    color: rgb(0, 0, 0);
    font-family: arial;
}
.rrr{
   width:80%;
    height: 50px;
    border: 2px solid rgb(32, 15, 12);
    border-radius: 10px;
}
textarea{
    border: 2px solid rgb(51, 48, 48);
}
button{
    background-color:wheat;
    width:98%;
    font-size: 20px;
    padding: 20px;
    border: 3px solid white;
    border-radius: 30px;

    cursor: pointer;
    
}
button:hover{
    background-color: rgb(179, 168, 167);

}
input[type="radio"]
{
    box-shadow: 0 0 10px rgb(36, 26, 24);
}
input::placeholder{
    font-size: 15px; 
}
input{
    margin: 5px;
}
.a1{
 
     text-align: center;
}
#ac{
    color: red;
}
</style>
    </head>
    <body>
        <div class="a1">
            <i><h1 > Fast Courier & Cargo<br>Birtamode, 023-534177 </h1></i>
        <div class="first">
            <h1> Create a new login ID </h1>
            <hr>
            <div class="second">
            <form action="signupdb.php" method="post">
               <label>Enter Company name</label><br>
                <input type="text" class="rrr" name="name" placeholder="Enter Company name" required><br>
                <label>Enter email ID</label><br>
                <input type="email" class="rrr" name="email" placeholder="something123@gmail.com"><br>
                <label>Enter Company Address</label><br>
                <input type="text" class="rrr" name="address" placeholder="Enter Company Address" required><br>
                <label>create your password</label><br>
                <input type="password" class="rrr" name="password" placeholder="Enter password" id="password" required><br>
                <label> write about yourself</label><br>
                <textarea name="about" id="" class="form-control" cols="45" rows="4" ></textarea><br>
                <br>
           
            <button>Signup </button>
           
           <a href="login.php"><h3 id="ac">Already have Account?</h3></a>
        </form>
        </div>
    </div>

</div>
    </body>
</html>