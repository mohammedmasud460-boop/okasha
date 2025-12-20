<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
   <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>منصة شهادتي</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            
        }
        .header{
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)), url("{{asset('image/name.webp')}}");
            background-position: center;
            background-size: cover;
            position: relative;
        }

        nav{
            display: flex;
            padding: 2% 6%;
            justify-content: space-between;
            align-items: center;

        }
         nav img{
            width: 150px;
         }
         .nav-links{
            flex: 1;
            text-align: center;
         }
            .nav-links ul li{
                list-style: none;
                display: inline-block;
                padding: 8px 30px;
                position: relative;
                margin-bottom: 15px;
            }
            .nav-links ul{
                justify-content: center;
            }
            .nav-links ul li a{
                color: #fff;
                text-decoration: none;
                font-size: 18px;
                font-weight: bold;
            }
            .text-box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
            color: #fff;

            }
            .text-box h1{
                font-size: 50px;
                margin-bottom: 20px;
            }

            .text-box p{
                font-size: 20px;
                margin-bottom: 30px;
            }   
            .hero-btn{
                display: inline-block;
                text-decoration: none;
                color: #fff;
                border: 2px solid #fff;
                padding: 10px 30px;
                font-size: 18px;
                border-radius: 25px;
                transition: all 0.3s ease;
            }
            .hero-btn{
                background-color: #14e3faff;
                color: #ffffffff;
            }
            .name1{
              border: 2px solid #fff;
                border-radius: 15px;
                transition: all 0.3s ease;
    
}

.name1:hover{
   background-color: #14e3faff;
                color: #000;

}
.name2:hover{
      border: 2px solid #fff;
                border-radius: 15px;
                transition: all 0.3s ease;
   background-color: #14e3faff;
                color: #000;

}
nav .bxl{
    display: none;
}
@media (max-width: 700px){
    .text-box h1{
        font-size: 30px;
    }
    .text-box p{
        font-size: 16px;
    }
    .nav-links ul li{
        display: block;
    }
    .nav-links{
        position: absolute;
        background: #000;
        height: 100vh;
        width: 200px;
        top: 0;
        left: -200px;
        text-align: right;
        transition: 2s all ease;
        z-index: 2;
    }
    nav .bxl{
    display: block;
    color: #fff;
    font-size: 30px;
    cursor: pointer;

}
    .nav-links ul{
        padding:15px ;
}

nav img{
    width: 120px;

}}


    </style>
</head>
<body>
    <section class="header">
        <nav>
          <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="bxl bx-instagram" onclick="hideMenu()"></i>
                <ul>
                    <li class="name1"><a href="#" >الصفحة الرئيسية</a></li>
                    <li class="name2"><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                    <li class="name2"><a href="{{ route('services') }}">خدماتنا</a></li>
                    <li class="name2" ><a href="conecte">الاسئلة الشائعة</a></li>
                    <li class="name2"><a href="{{ route('about') }}">من نحن</a></li>
                    
                </ul>
            </div>
            <i class="bxl bx-instagram"onclick="showMenu()">cc</i>
        </nav>
        <div class="text-box">
            <h1>مرحبا بكم في منصة شهادتي</h1>
            <p>منصة شهادتي هي منصة الكترونية تهدف الى تسهيل عملية اصدار الشهادات التعليمية والاكاديمية بأكثر من قالب</p>
            <a href="{{ route('register') }}" class="hero-btn">انضم الينا</a>

        </div>
        
    </section>

    <script>
        var navLinks = document.getElementById("navLinks")

        function showMenu(){
            navLinks.style.left = "0";
        }
             function hideMenu(){
            navLinks.style.left = "-200px";
        }
        </script>
</body>
</html>