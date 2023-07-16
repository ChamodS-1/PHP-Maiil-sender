<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap');
    
body{
    font-family: 'Ubuntu', sans-serif;
    color: black;
}

h1 {

    font-size: 4rem;
    color: aliceblue;
    margin-top: 0.5rem;
}

input,
textarea {

    border-radius: 30px;
    background: none;
    display: block;
    color: aliceblue;
    border: 1px solid rgb(255, 255, 255);
    margin-bottom: 10px;
    padding: 0.7rem 1rem;
    width: 80%;
    margin-right: 0;
}

select{
    border-radius: 30px;
    background: none;
    color: aliceblue;
    border: 1px solid rgb(255, 255, 255);
    font-family: inherit;
    font-weight: 500;
    font-size: 1.0rem;
    margin-bottom: 10px;
    padding: 0.7rem 1rem;
    width: 85.5%;
    margin-right: 0;
}

select option{

    color: rgb(0, 0, 0);
    font-family: inherit;
    font-weight: 500;

}

input:active
{

    border: 1px solid rgb(255, 255, 255);
    outline: none;

}

#inser-form{

    display: flex;
    justify-content: space-between;
    background-color: rgb(23,28,31);
    width: 70%;
    gap: 15rem;
    border-radius: 15px;
    margin: 5rem auto;
    padding: 2.5rem 3rem;
    color: aliceblue;
}

input,
textarea,label,button{

    font-family: inherit;
    font-size: 1rem;
}

#form{

    width: 100%;
}

label h3{

    margin: 0.7rem;
}

#form-head{

    width: 50%;
    margin-top: 2rem;

}

#form-head #green{

    background-color: rgb(47,192,120);
    width: fit-content;
    padding: 0.4rem;
    border-radius: 5px;
    
}

#errormsg{
    position: fixed;
    top: 25.7rem;
    left: 14.7rem;
}

#errormsg #red{

background-color: rgb(212, 4, 39);
width: fit-content;
padding: 0.4rem;
border-radius: 5px;
color: white;

}

#errormsg #green{

background-color: rgb(47,192,120);
width: fit-content;
padding: 0.4rem;
border-radius: 5px;
color: white;

}

#form-head #red{

background-color: rgb(212, 4, 39);
width: fit-content;
padding: 0.4rem;
border-radius: 5px;

}

button{

    margin-right: 3rem;
    border-radius: 30px;
    background: none;
    border: 1px solid rgb(255, 255, 255);
    padding: 0.7rem 1rem;
    color: aliceblue;
    margin-top: 30px;
}

button:hover{

    color: rgb(0, 122, 252);
    border: 1px solid rgb(0, 122, 252);
    background-color: rgb(0, 122, 252,0.1);
    cursor: pointer;
    

}

button h3{

    margin: 0;
    ;
}

span{
    color: rgb(255, 255, 0);
    margin: 0;
    font-size: 2.6rem;
}

#mail-topic{
    margin-bottom: 1.5rem;
}

</style>
    <title>PHP Mailer</title> 
</head>
<body>


<div id="inser-form">

    <div id="form-head">
        <h1 id="mail-topic">PHP MAILER</h1>
        
        <h4 id="green">NEW EMAIL</h4>
        <h2>Create.Send Your Mail.</h2>
    </div>

    <div id="form">

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

            <label for="reciever-email">
                <h3>Reciever Email</h3>
            </label>
            <input type="text" name="reciever-email" id="reciever-email">

            <label for="email-subject">
                <h3>Email Subject</h3>
            </label>
            <input type="text" name="email-subject" id="email-subject">

            <label for="post-content">
                <h3>Content</h3>
            </label>
            <textarea name="postcontent" rows="7" id="post-content"></textarea>

            <button type="submit">
                <h3>Send Email</h3>
            </button>

        </form>
    </div>
</div>
</body>
</html>

<?php

$msg="";
$id="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(empty($_POST["reciever-email"]) || empty($_POST["email-subject"]) || empty($_POST["postcontent"])){

        $id="red";
        $msg= "FILL ALL FIELDS";

    }else{
        $resever = $_POST["reciever-email"];
        $subject = $_POST["email-subject"];
        $body=$_POST["postcontent"];
        $sender="From:thebradredd@gmail.com";

        if(mail($resever,$subject,$body,$sender)){

            $id="green";
            $msg= "EMAIL SENT SUCCESSFULLY";
            //echo "Yes";

        }else{
            //echo "No";
            $id="red";
            $msg= "SOMETHING WENT WRONG";
        }
    }

}

?>
        <div id="errormsg">
        <h4 id="<?php echo $id?>"><?php echo $msg ?></h4>
        </div>

