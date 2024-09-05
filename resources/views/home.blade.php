@extends("loyaut")
@section("title", "Principal")
@section("content")

<div class="container">
    <div class="swiper">
        <div class="swiper-wrapper" data-swiper-preload="false">
            <div class="swiper-slide" data-swiper-autoplay="4000"><img src="{{asset("Images/D1.png")}}" alt=""></div>
            <div class="swiper-slide" data-swiper-autoplay="4000"><img src="{{asset("Images/D2.png")}}" alt=""></div>
            <div class="swiper-slide" data-swiper-autoplay="4000"><img src="{{asset("Images/D3.png")}}" alt=""></div>
            <div class="swiper-slide" data-swiper-autoplay="4000"><img src="{{asset("Images/D4.png")}}" alt=""></div>
            <div class="swiper-slide" data-swiper-autoplay="4000"><img src="{{asset("Images/D5.png")}}" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<div class="background"></div>

<br>

<div class="bike-catalog">
    <h2>Catalog</h2>
    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Biciclete de oraș</h3>
          <a href="{{route("biciclete")}}"><img src="https://cdn.galleries.smcloud.net/t/galleries/gf-qnN8-C15e-na9K_cukrzyca-a-sport-jaki-wysylek-fizyczny-jest-wskazany-przy-cukrzycy-1920x1080-nocrop.jpg" alt=""></a>
        </div>
    </div>

    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Biciclete de munte</h3>
            <a href="{{route("biciclete")}}"><img src="https://media.gq-magazin.de/photos/6332c61293c428d557786ca2/3:2/w_3000,h_2000,c_limit/GettyImages-Mountainbike3.jpg" alt=""></a>
        </div>
    </div>

    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Biciclete Electrice</h3>
            <a href="{{route("biciclete")}}"><img src="https://habrastorage.org/files/fb0/ae0/f37/fb0ae0f376d34bc4901800b267aebce1.jpg" alt=""></a>
        </div>
    </div>

    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Biciclete Hibrid</h3>
            <a href="{{route("biciclete")}}"> <img src="https://www.mtbcult.it/wp-content/uploads/2015/09/ROSE_IRMO_KEIZER_385.jpg" alt=""></a>
        </div>
    </div>

    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Accesorii</h3>
           <a href="{{route("accesorii")}}"> <img src="https://images.singletracks.com/blog/wp-content/uploads/2016/02/27-bk-160110-chumba-stella-review-0310.jpg" alt=""></a>
        </div>
    </div>

    <div class="img-catalog">
        <div class="title-catalog">
            <h3>Micro Vehicule</h3>
           <a href="{{route("trotinete")}}"><img src="https://fr.shopping.rakuten.com/photo/1226419155.jpg" alt=""></a>
        </div>
    </div>
</div>




<div class="oferte-div">
    <h2>Oferte de vânzare</h2>
</div>
<div class="bike-sale">
    <div class="img-sale">
        <div class="title-sale">
            <img src="https://assets.zeg.de/1050x700/km119-iakw50.png" alt="">
            <h3>Kettler TRAVELLER 27G</h3>
                <p>23000 MDL</p>
                <h4>20000 MDL</h4>
            <h4 class="stock">Este in stoc</h4>

        </div>
    </div>
    <div class="img-sale">
        <div class="title-sale">
            <img src="https://avatars.mds.yandex.net/get-mpic/4331935/img_id4334118778695745133.jpeg/orig" alt="">
            <h3>Bulls Sharptail</h3>
            <p>20000 MDL</p>
            <h4>15000 MDL</h4>
        <h4 class="stock">Este in stoc</h4>

        </div>
    </div>

    <div class="img-sale">
        <div class="title-sale">
            <img src="https://cloudinary.pondigital.solutions/pon-digital-solutions/image/upload/q_auto,f_auto,e_trim/dmp.pon.bike/6000_EJ3yRgtM9W276PfA.png?v1" alt="">
            <h3>Focus Jarifa 6.7 </h3>
            <p>27000 MDL</p>
            <h4>23000 MDL</h4>
        <h4 class="stock">Este in stoc</h4>
        </div>
    </div>
</div>


    <div class="background3">
        <img src="{{asset("Images/D8.jpg")}}" alt="">
        <div class="text-back2">
<a href="{{route("location")}}"><button class="btn">Caută locația</button></a>
        </div>
        </div>






<div class="despre">
    <h2>Despre BikeLand</h2>
    </div>


<div class="background2">
<img src="{{asset("Images/D7.png")}}" alt="">
<div class="text-back">
<p>La Bike Land, pasiunea noastră pentru biciclete ne motivează să oferim cele mai bune produse și servicii clienților noștri. Fie că ești un ciclist pasionat, un navetist de zi cu zi sau cineva care caută o nouă aventură pe două roți, la noi vei găsi bicicleta perfectă pentru nevoile tale.</p>

</div>
</div>


<div class="background2">
    <p>De la biciclete de oraș elegante și practice până la mountain bikes robuste și modele electrice moderne, avem tot ce îți trebuie pentru a face fiecare plimbare o experiență plăcută și sigură. Pe lângă o gamă variată de biciclete, oferim și o selecție de accesorii, echipamente de protecție și servicii de întreținere de înaltă calitate. La Bike Land, calitatea, performanța și satisfacția clientului sunt prioritățile noastre principale.</p>
    <div class="text-back">
    <img src="{{asset("Images/Back.jpg")}}" alt="">

    </div>
    </div>





<script src="{{asset("Sliders/slider.js")}}"></script>

@endsection
