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
     git clone https://github.com/mohammedmasud460-boop/okasha.git  *{
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
            z-index: 1;

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


.about-img img{
   width: 200px;
    margin-bottom: 20px;

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

}
}

.about-us{
    width: 100%;
    text-align: center;
    padding: 30px 0px;

}
.about-us h4{
    font-size: 36px;
    margin-bottom: 20px;
    font-weight: 600;
}

.social{
    color: #000;
    margin:0 13px;
    cursor: pointer;
    padding: 18px 0;
font-size: x-large;
}

/* من نحن */
.sub-header{
    height: 40vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)), url("{{asset('image/name.webp')}}");
    background-position: center;
    background-size: cover;
    text-align: center;
    color: #fff;
}


    </style>
</head>
<body>
    
    <section class="sub-header">
        <nav>
          <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="bxl bx-instagram" onclick="hideMenu()"></i>
               <ul>
                    <li class="name1"><a href="#" >الصفحة الرئيسية</a></li>
                    <li class="name2"><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                    <li class="name2"><a href="{{ route('services') }}">خدماتنا</a></li>
                    <li class="name2" ><a href="{{ route('conecte') }}">الاسئلة الشائعة</a></li>
                    <li class="name2"><a href="#">من نحن</a></li>
                    
                </ul>
            </div>
            <i class="bxl bx-instagram"onclick="showMenu()"></i>
        </nav>
      <h1>من نحن</h1>
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
        <section class="about-us">

            <div class="about-img">
      <img src="{{asset('image/logono.png')}}" alt="logo">
    </div>
    <div class="about-content"> 
    <h2 class="heading">About <span>Me</span></h2>
    <h3><span>Full-stack </span>developer.</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint,<br>
         facilis laboriosam quo accusantium quibusdam eum nemo repellendus architecto magni odio,
         nesciunt rerum veniam, pariatur perspiciatis. In laborum dolore laudantium dicta.</p>
         <a href="#" class="name2" >Read More</a>
    </div>
            <div class="social">
                <a href="https://www.facebook.com/index.php/?lang=ar" target="_blank" class="f"> <i class='bxl  bx-facebook-circle'  ></i>  </a>
                <a href="https://www.instagram.com/" target="_blank" class="i"> <i class="bxl bx-instagram"></i> </a>
                <a href="https://web.whatsapp.com/" target="_blank" class="w"> <i class='bxl  bx-whatsapp'  ></i>  </a>
                <a href="https://x.com/?logout=1755700814658" target="_blank" class="t"> <i class='bxl  bx-twitter-x'  ></i>  </a>
            </div>
            </section>
</body>
</html>