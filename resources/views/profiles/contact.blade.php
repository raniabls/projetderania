<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
body{
    font-family: 'Playfair Display', serif;
    display: grid;
    background-color: #f4f4f4;
    align-content: center;
    min-height: 100vh;
}
body {
        background: linear-gradient(90deg, rgb(128, 108, 108),  rgb(199, 199, 158));
    }
body h1 {
    margin-left:150px;
}
section{
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 90vh;
    width: 85vw;
    margin: 0 auto;
}
.content{
    background: #fff;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.content h2{
    text-transform: uppercase;
    font-size: 36px;
    letter-spacing: 6px;
    opacity: 0.9;
}
.content span{
    height: 0.5px;
    width: 80px;
    background: #777;
    margin: 30px 0;
}
.content p{
    padding-bottom: 15px;
    font-weight: 300;
    opacity: 0.7;
    width: 60%;
    text-align: center;
    margin: 0 auto;
    line-height: 1.7;
}

.vertical-line{
    height: 30px;
    width: 0.5px;
    background: #777;
    margin: 0 auto;
}
.icons{
    display: flex;
    padding: 15px 0;
}
.icons li{
    display: block;
    padding: 5px;
    margin: 5px;
}
.icons li i{
    font-size: 26px;
    opacity: 0.8;
}
.icons li i:hover{
    color: #06d6a0;
}


/*****************/

@media(max-width: 992px){
    section{
        grid-template-columns: 1fr;
        width: 100%;
    }
    .content{
        height: 100vh;
    }
    .content h2{
        font-size: 20px;
        margin-top: 50px;
    }
    .content span{
        margin: 20px 0;
    }
    .content p{
        font-size: 14px;
    }
    .icons li i{
        font-size: 15px;
    }
}
</style>
<body>
    <h1>Contactez-nous</h1>
    <h3></h3>
        <section>
            <div class = "image">
                <!-- image here -->
            </div>

            <div class = "content">
                <h2>About Us</h2>
                <span><!-- line here --></span>

                <p></p>

                <!-- <ul class = "links">
                    <li><a href = "#">work</a></li>

                    <div class = "vertical-line"></div>

                    <li><a href = "#">service</a></li>

                    <div class = "vertical-line"></div>
                    
                    <li><a href = "#">contact</a></li>
                </ul> -->

                <ul class = "icons">
                    <li>
                        <i class = "fa fa-twitter"></i>
                    </li>
                    <br>
                    <li>
                        <i class = "fa fa-facebook"></i>
                    </li>
                    <br>
                    <li>
                        <i class = "fa fa-github">github: https://github.com/raniabls/projetderaniaetasmaa</i>
                    </li>
                    <li>
                        <i class = "fa fa-pinterest"></i>
                    </li>
                </ul>
            </div>
        </section>
</body>
</html>