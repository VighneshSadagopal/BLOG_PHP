<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content{
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            position: absolute;
        }
       button{
           position: relative;
           height: 5%;
           right: 22%;
           top: 70%;
           border: transparent;
           background-color: palevioletred;
           
           padding: 7px 13px;
       }
       button a{
        color: white;
        text-decoration: none;
       }
       h1{
           position: relative;
           height: 10%;
           top: 50%;
           right: 20%;
           font-family: sans-serif;
       }
       img{
           position: relative;
           right: 10%;
       }
    </style>
</head>

<body>
    
    <div class="content">
    
        <img src="images\confused-businessman-cartoon-character_1473-162.jpg" alt="" srcset="">
        <h1>Something Went Wrong<br>
            Page not found.
        </h1>

        <button onclick="goBack();">Go Back</button>
    </div>
    <script>
        function goBack(){
            window.history.back();
        }
    </script>
</body>

</html>