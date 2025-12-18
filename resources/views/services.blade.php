<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
   <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
   <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
 
    <title>Document</title>
</head>
<body>
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

}
}
.sub-header{
    height: 40vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)), url("{{asset('image/name.webp')}}");
    background-position: center;
    background-size: cover;
    text-align: center;
    color: #fff;
}
:root{
    --primarycolor:#ff2746;
    --secondarycolor:#f34b7d;
    --Lightcolor:#ffffff;
    --bgcolor-1:#171a1c;
    --bgcolor-2:#22282a;
   --padding: 8%;

}
:root{
    --bg-color:#1f242d;
    --second-bg-color:#323946;
    --text-color:#fff;
    --main-color:#0ef;
}



.Services  h2{
margin-bottom: 5rem;
}
.Services{background-image: url(back4.jpg);
background-repeat: no-repeat;
background-size: cover;}

.serves-content{
  
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap:2rem;
}
.serves-content  .services-box{
    flex: 1 1 10rem;
    background: var(--second-bg-color);
    padding: 3rem 2rem 4rem;
    border-radius: 1rem ;
    text-align: center;
    border: 2px solid var(--bgcolor-2);
    margin-top: 2rem;
    transition: 5s ease;
}
.serves-content  .services-box:hover{
    border-color: var(--primarycolor);
    transform: scale(1.02);
}
.services-box i{
    font-size: 7rem;
    color: var(--Lightcolor);
    margin-top: 50px;
}
.services-box h3{
    font-size: 2.6rem;
}
.services-box p{
    font-size: 1.6rem;
    margin: 1rem 0 3rem;
   margin-bottom: 50px;
}


    </style>
    <section class="sub-header">
        <nav>
          <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="bxl bx-instagram" onclick="hideMenu()"></i>
                <ul>
                    <li class="name1"><a href="#" >الصفحة الرئيسية</a></li>
                    <li class="name2"><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                    <li class="name2"><a href="">خدماتنا</a></li>
                    <li class="name2" ><a href="#">الاسئلة الشائعة</a></li>
                    <li class="name2"><a href="#">من نحن</a></li>
                    
                </ul>
            </div>
            <i class="bxl bx-instagram"onclick="showMenu()"></i>
        </nav>
          <h2 class="heading">Our <span>Services</span></h2>
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
  



    <div class="serves-content">
        <div class="services-box">
            <i class='bxr  bx-code'  ></i> 
            <h3>Wed Development</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                elit. Sed delectus odit iste consequuntur eaque nobis sit? Accusantium, quas
                i harum! Nobis eum autem maiores id. Necessitatibus, quisquam fugit. Adipisci, reiciendis dignissimos.</p>
                       <a href="#" class="btn">Read More</a>
            </div>


             <div class="services-box">
            <i class='bxr  bx-pencil-sparkles'  ></i> 
            <h3>Graphic Design</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                elit. Sed delectus odit iste consequuntur eaque nobis sit? Accusantium, quas
                i harum! Nobis eum autem maiores id. 
                Necessitatibus, quisquam fugit. Adipisci, reiciendis dignissimos.</p>
                       <a href="#" class="btn">Read More</a>
            </div>


             <div class="services-box">
            <i class='bxr  bx-network-chart'  ></i> 
            <h3>Digital Marketing</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                elit. Sed delectus odit iste consequuntur eaque nobis sit? Accusantium, quas
                i harum! Nobis eum autem maiores id. Necessitatibus, quisquam fugit. Adipisci, reiciendis dignissimos.</p>
                       <a href="#" class="btn">Read More</a>
            </div>
    </div>

    
</body>
</html>