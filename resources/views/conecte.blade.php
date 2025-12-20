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
/* contact */
.map{
    width: 80%;
    margin: auto;
    padding: 80px 0;
}

.map iframe{
    width: 100%;
   
}
.contactus{
width: 80%;
margin: auto;

}

.contact{
    flex-basis: 48%;
    margin-bottom: 30px;

}
.contact div{
    display: flex;
    align-items: center;
    margin-bottom: 40px;
}

.contact div i{
    font-size: 40px;
    color: #14e3faff;
    margin-right: 20px;
}
.contact div p{
    padding:0;

}
.contact div h5{
    font-size: 20px;
    margin-bottom: 10px;
    color: #14e3faff;
    font-weight: 400;
}

.contact form input,
.contact form textarea{
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
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
                    <li class="name2" ><a href="#">الاسئلة الشائعة</a></li>
                    <li class="name2"><a href="{{ route('about') }}">من نحن</a></li>
                    
                </ul>
            </div>
            <i class="bxl bx-instagram"onclick="showMenu()">zz</i>
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
        <section class="map">
        <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d302031.4651109162!2d39.46125092568561!3d21.40529958738623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sar!2ssa!4v1766015657119!5m2!1sar!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<section class="contactus">
    <div class="row">
        <div class="contact">
         <div class="">
             <i class='bxr  bx-network-chart'  ></i> 
            <span>
                <h5>vddvd , dvdvdve</h5>
                <p>cfrfrf , rfrfrf r ,rfr</p>
            </span>
         </div>
          <div class="">
           <i class='bxr  bx-network-chart'  ></i> 
            <span>
                <h5>vddvd , dvdvdve</h5>
                <p>cfrfrf , rfrfrf r ,rfr</p>
            </span>
         </div>
          <div class="">
          <i class='bxr  bx-network-chart'  ></i> 
            <span>
                <h5>vddvd , dvdvdve</h5>
                <p>cfrfrf , rfrfrf r ,rfr</p>
            </span>
         </div>
        </div>
        <div class="contact">
            <form action="">
                <input type="text" placeholder="الاسم الكامل" required>
                <input type="email" placeholder="البريد الالكتروني" required>
                <input type="text" placeholder="الموضوع" required>
                <textarea rows="8" placeholder="اكتب رسالتك هنا..." required></textarea>
                <button type="submit" class="hero-btn red-btn">ارسال الرسالة</button>
            </form>
        </div>
    </div>
</section>

            </body>
</html>