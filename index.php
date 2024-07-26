<?php
include 'config.php'; // Mengimpor file konfigurasi database
session_start(); // Memulai sesi PHP

$sql = "SELECT * FROM produk"; // Query SQL untuk mengambil semua data produk dari tabel 'produk'
$result = $conn->query($sql); // Eksekusi query dan menyimpan hasilnya dalam variabel $result
?>

</html>



<!DOCTYPE html>
<html lang="en">

<</head> 
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Daifuku Mochi</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="CSS/bootstrap.css" rel="stylesheet" />

</head>

<body id="page-top">
<!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-white text-bg-dark text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav me-auto">
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a>
          </li>
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="produk.php">Product</a>
          </li>
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="contact.html">Contact Us</a>
          </li>
        </ul>
        <a class="text-secondary mx-auto" href="#page-top" style="font-size: 1.5rem; font-weight: bold; text-decoration: none; display: flex; align-items: center;">
    <img src="img/logo.png" alt="Logo" style="width: 50px; height: auto; margin-right: 10px;">
    Daifuku Mochi
</a>


        <ul class="navbar-nav ms-auto">
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">My Order</a>
          </li>
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.php">Login</a>
          </li>
          <li class=" mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded mb-1" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Masthead-->
  <header class="masthead bg-primary text-white text-center vh-100 position-relative">
    <div class="container d-flex align-items-center justify-content-center flex-column h-100">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5 w-100 h-100 position-absolute top-0 start-0" src="https://t3.ftcdn.net/jpg/00/99/38/84/360_F_99388471_uX5hXVCioiJkP0HAvWnknecRz79oW7eH.jpg" alt="..." style="object-fit: cover;" />
      <!-- Overlay untuk gambar lebih gelap -->
      <div class="w-100 h-100 position-absolute top-0 start-0 bg-dark" style="opacity: 0.6;"></div>
      <!-- Overlay untuk tulisan biar tetap di tengah -->
      <div class="position-relative z-index-1 text-center">
        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0 ">Mochi Ala Japan</h1>
        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
      </div>
    </div>
  </header>




  <!-- Portfolio Section-->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Product</h2>
      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Product items -->
      <div class="row justify-content-center">
        <!-- PHP loop to generate product cards -->
        <?php while ($row = $result->fetch_assoc()) : ?>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="portfolio-item mx-auto">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <h2><?php echo $row['nama_produk']; ?></h2>
                  <a href="detail produk/detail_product.php?id=<?php echo $row['id']; ?>" class="btn btn-light">Detail Produk</a>
                  <a href="tambah_keranjang.php?id=<?php echo $row['id']; ?>" class="btn btn-light"><i class="fas fa-cart-plus"></i></a>
                </div>
              </div>
              <img class="img-fluid border" src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>" />
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <!-- About Section-->
  <!-- About Section-->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
      <!-- About Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-white">Rasakan Kekuatan Mochi</h2>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- About Section Content-->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <p class="lead text-center"> Mochi kami dibuat dengan penuh cinta dan tawa, memberikan sentuhan
            manis dalam setiap gigitan yang membuat Anda tersenyum dan mungkin tertawa terbahak-bahak!</p>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer-->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <!-- Footer Location-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">
            Kp. Cipanawar rt01/rw09 no.78, Kelurahan Cipageran
            Kecamatan Cimahi Utara, Provinsi Jawa Barat, 40511
          </p>
        </div>
        <!-- Footer Social Icons-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Our Social</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#!">

            <i class="fa-brands fa-instagram"></i></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="#!">

            <i class="fa-brands fa-tiktok"></i></a>

        </div>
        <!-- Footer About Text-->
        <div class="col-lg-4 ">
          <h4 class="text-uppercase mb-4">Contact Us</h4>
          <p class="lead mb-0 d-flex justify-content-center">
            <a href="https://wa.me/6289637217339" target="_blank" class=" mb-4">Chat on WhatsApp</a>
          <div>
            <svg height="36px" version="1.1" viewBox="0 0 100 72" width=50px xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title />
              <desc />
              <defs>
                <rect height="71.4285714" id="path-1" rx="6.63157895" width="100" x="0" y="0" />
              </defs>
              <g fill="none" fill-rule="evenodd" id="Content" stroke="none" stroke-width="1">
                <g id="Indonesian-Bank-Icons" transform="translate(-210.000000, -623.000000)">
                  <g id="BCA" transform="translate(210.000000, 623.000000)">
                    <mask fill="white" id="mask-2">
                      <use xlink:href="#path-1" />
                    </mask>
                    <use fill="#0060AF" id="Background" xlink:href="#path-1" />
                    <g id="BCA-Logo" mask="url(#mask-2)">
                      <g transform="translate(8.571429, 24.285714)">
                        <path d="M11.9960847,18.4732972 L11.6285061,18.4748151 C11.6071138,17.0575702 10.801339,15.8382972 9.81430508,15.2001467 C9.00876029,14.6788712 7.8954431,14.3093814 5.98946247,13.8652997 C4.20677482,13.4517921 3.72717433,11.6895599 4.2635908,10.3646875 C4.84187167,8.94310587 5.91953511,8.44893495 7.20514044,8.34376913 C9.063046,8.13408801 12.0039056,10.8237309 11.9820533,14.636588 C12.0071259,14.9523023 11.9960847,17.514662 11.9960847,18.4732972 Z M11.1994189,18.4747717 L10.8150484,18.4732538 C10.6052663,17.5146186 9.28745763,17.0228329 8.45453995,17.1923992 C7.97171913,17.2891084 6.96490315,17.4807921 6.16855932,17.4506518 C4.86455206,17.4055497 3.9985109,16.2541467 3.89960048,15.5557156 C3.81449153,14.9518253 3.90236077,13.9188151 4.38610169,13.459338 C4.56897094,13.8448737 5.15967312,14.147361 5.72438257,14.2835344 C7.55123487,14.7204605 8.68364407,15.0593763 9.52714286,15.5754477 C10.478063,16.159389 11.2056295,17.2459579 11.1994189,18.4747717 Z M12.6696416,2.40131505 L12.5603801,2.40131505 C14.7693027,2.40131505 16.6782736,3.77584311 16.6697627,6.15432526 C16.6660823,8.1544273 14.9613729,9.22516709 14.3469782,9.98995026 C13.4264213,11.1424375 12.910477,12.4545166 12.8773535,14.5424375 C12.8522809,16.1270804 12.8743632,17.8684962 12.8826441,18.4767232 L12.3947627,18.4767232 C12.3857918,17.8953839 12.387862,16.255014 12.3473777,14.5938278 C12.2958523,12.5065574 11.7978499,11.1424375 10.877753,9.98995026 C10.2686489,9.22516709 8.5623293,8.1544273 8.55542857,6.15432526 C8.54875787,3.77584311 10.4584189,2.40131505 12.6696416,2.40131505 Z M13.2307627,18.4732972 C13.2307627,17.514662 13.2192615,14.9523023 13.2438741,14.636588 C13.2222518,10.8237309 16.1612712,8.13408801 18.0207869,8.34376913 C19.3063923,8.44893495 20.3826755,8.94310587 20.9627966,10.3646875 C21.498523,11.6895599 21.0163923,13.4517921 19.2360048,13.8652997 C17.3286441,14.3093814 16.216937,14.6788712 15.409322,15.2001467 C14.4234383,15.8382972 13.6740194,17.0575702 13.6510169,18.4748151 L13.2307627,18.4732972 Z M14.0268765,18.4747717 C14.0199758,17.2459579 14.7473123,16.159389 15.6954722,15.5754477 C16.5426513,15.0593763 17.6762107,14.7204605 19.5014528,14.2835344 C20.0673123,14.147361 20.6573245,13.8448737 20.8369734,13.459338 C21.3230145,13.9188151 21.4108838,14.9518253 21.3255448,15.5557156 C21.2247942,16.2541467 20.3608232,17.4055497 19.0591162,17.4506518 C18.2632324,17.4807921 17.2508959,17.2891084 16.7701453,17.1923992 C15.9404479,17.0228329 14.6189588,17.5146186 14.4082567,18.4732538 L14.0268765,18.4747717 Z" fill="#FFFFFF" id="Combined-Shape" />
                        <g fill="none" id="Logo-Group-BCA" stroke-width="1" transform="translate(0.000000, 0.200140)">
                          <path d="M12.7570278,24.0688776 C9.39568402,24.0688776 5.94164044,23.2884821 2.49196731,21.7450383 L2.4073184,21.7057908 L2.36683414,21.624477 C0.818771186,18.5440944 -0.000115012107,15.175102 -0.000115012107,11.87875 C-0.000115012107,8.58716837 0.785187651,5.36215561 2.3341707,2.28589286 L2.37695521,2.20414541 L2.46321429,2.1633801 C5.65434019,0.738329082 9.08699153,0.0166964286 12.6696186,0.0166964286 C16.0065799,0.0166964286 19.5708051,0.820076531 22.9747034,2.34443878 L23.0618826,2.38108418 L23.1023668,2.46434949 C24.6798729,5.60154337 25.5118705,8.9698852 25.5118705,12.2118112 C25.5118705,15.440727 24.7129964,18.6687755 23.1334201,21.8040179 L23.0920157,21.886199 L23.0041465,21.9243622 C19.8615557,23.3266454 16.3180327,24.0688776 12.7570278,24.0688776 M2.81124092,21.3226403 C6.16223366,22.8088393 9.5047155,23.5590944 12.7570278,23.5590944 C16.2055508,23.5590944 19.6349818,22.8485204 22.6880932,21.5015306 C24.2046429,18.4634311 24.9733838,15.3366454 24.9733838,12.2118112 C24.9733838,9.07396684 24.1710593,5.81035714 22.6533596,2.76531888 C19.3499818,1.30145408 15.9000787,0.525178571 12.6696186,0.525178571 C9.20131356,0.525178571 5.87677361,1.21862245 2.78225787,2.58686224 C1.2967615,5.56836735 0.540671913,8.69276786 0.540671913,11.87875 C0.540671913,15.0703699 1.3262046,18.3354974 2.81124092,21.3226403" fill="#FFFFFF" id="Fill-3" />
                        </g>
                        <path d="M14.7088523,22.4417781 L14.4261525,20.4956684 L15.1090944,20.3980918 C15.2751719,20.3768418 15.4775932,20.4041633 15.5585617,20.5021735 C15.6480412,20.6047372 15.675414,20.6895204 15.6926659,20.8239592 C15.7186586,20.9904898 15.6675932,21.1826071 15.4688523,21.278449 L15.4688523,21.2843036 C15.6905956,21.2843036 15.8246998,21.4345714 15.8638039,21.6882704 C15.8693245,21.7420459 15.8863462,21.8712806 15.8693245,21.9792653 C15.8242397,22.2362168 15.6618426,22.3190485 15.3871937,22.3552602 L14.7088523,22.4417781 Z M15.1484286,22.0935383 C15.2293971,22.0824796 15.3115157,22.0783597 15.3756925,22.0397628 C15.4741429,21.9792653 15.4651719,21.8500306 15.4513705,21.7537551 C15.4173269,21.542773 15.3589007,21.4623265 15.1212857,21.4955026 L14.97177,21.5171862 L15.06654,22.1041633 L15.1484286,22.0935383 Z M15.0055835,21.1940995 C15.0959831,21.1804388 15.2183559,21.1700306 15.2694213,21.0891505 C15.2963341,21.0351582 15.3303777,20.9922245 15.3078354,20.8720969 C15.2800024,20.729852 15.2300872,20.6413827 15.0380169,20.6756429 L14.8592881,20.7027474 L14.9299056,21.2014719 L15.0055835,21.1940995 Z" fill="#FFFFFF" id="Fill-14" />
                        <path d="M17.6672857,21.2714235 C17.6725763,21.3076352 17.6787869,21.3479668 17.6810872,21.3841786 C17.736293,21.7389235 17.6672857,22.0329541 17.2440412,22.1138342 C16.6181453,22.2272398 16.4983027,21.8610026 16.3883511,21.3479668 L16.3296949,21.070199 C16.2434358,20.5794974 16.2064019,20.2078393 16.8164262,20.0931327 C17.1603123,20.0341531 17.3875763,20.1631709 17.4821162,20.485824 C17.4968378,20.5339617 17.5152397,20.581449 17.5221404,20.6300204 L17.147891,20.7028776 C17.1046465,20.581449 17.0473705,20.3648291 16.8789927,20.3830434 C16.5767409,20.4175204 16.6765714,20.7718316 16.7076247,20.920148 L16.8201065,21.4529158 C16.8539201,21.6140255 16.9210872,21.8714107 17.1826247,21.8217551 C17.394937,21.7816403 17.3022373,21.4698291 17.2833753,21.3418954" fill="#FFFFFF" id="Fill-16" />
                        <path d="M18.2678329,21.8603087 L18.1385593,19.8463291 L18.6411622,19.701699 L19.6953632,21.4533061 L19.2994915,21.564977 L19.0496852,21.1198112 L18.610109,21.2442755 L18.6669249,21.7503724 L18.2678329,21.8603087 Z M18.5733051,20.9190204 L18.8909685,20.8322857 L18.4691041,20.0174133 L18.5733051,20.9190204 Z" fill="#FFFFFF" id="Fill-18" />
                        <path d="M5.84843462,20.3375727 C6.00577119,19.8629171 6.146546,19.5131594 6.74713923,19.6684145 C7.06848305,19.7531977 7.26768402,19.8865523 7.25825303,20.2384783 C7.25664286,20.3167564 7.22926998,20.3967691 7.21132809,20.473963 L6.83753874,20.3768202 C6.8865339,20.1823176 6.91758717,20.0281467 6.66364044,19.9544222 C6.37012954,19.8785293 6.29859201,20.2141926 6.25810775,20.3590395 L6.10606174,20.8868202 C6.05775666,21.0435931 5.99979056,21.302713 6.25810775,21.3697156 C6.47157022,21.4237079 6.60084383,21.2263865 6.67813196,20.9379936 L6.41682446,20.8725089 L6.50722397,20.5672028 L7.12207869,20.7534656 L6.83017797,21.7710804 L6.54724818,21.6986569 L6.61096489,21.4835548 L6.60291404,21.4835548 C6.47249031,21.6596263 6.31377361,21.6780574 6.17460896,21.6526875 C5.55975424,21.4961314 5.62393099,21.1173176 5.77068644,20.6112207" fill="#FFFFFF" id="Fill-20" />
                        <path d="M8.13687651,21.1970918 L7.95170702,22.0249745 L7.53490315,21.9401913 L7.9790799,20.0070918 L8.6896247,20.158227 C9.10550847,20.2430102 9.23110169,20.4173469 9.1722155,20.7768622 C9.13863196,20.983074 9.03075061,21.2051148 8.76737288,21.1871173 L8.76461259,21.1838648 C8.98727603,21.2571556 9.00613801,21.3631888 8.96726392,21.5459821 C8.95047215,21.6240434 8.83476998,22.0963138 8.91458838,22.1726403 L8.91734867,22.2307526 L8.48605327,22.1245026 C8.46811138,21.99375 8.52929782,21.7582653 8.55345036,21.6277296 C8.57760291,21.5123724 8.616477,21.3497449 8.49226392,21.2888138 C8.3951937,21.2398087 8.35884988,21.2421939 8.24889831,21.2185587 L8.13687651,21.1970918 Z M8.207954,20.8976403 L8.48858354,20.9689796 C8.65903148,20.992398 8.75380145,20.9091327 8.78738499,20.7148469 C8.81774818,20.536824 8.77841404,20.4674362 8.62544794,20.4329592 L8.32457627,20.3752806 L8.207954,20.8976403 Z" fill="#FFFFFF" id="Fill-22" />
                        <path d="M10.8103559,20.4387921 L11.2225593,20.4838941 L11.0449806,21.8430268 C10.9587215,22.2738814 10.782063,22.4620957 10.27923,22.4033329 C9.76765617,22.3421849 9.64620339,22.1227462 9.67702663,21.6884222 L9.85598547,20.3305906 L10.2714092,20.3752589 L10.0931404,21.7027334 C10.0740484,21.8469298 10.0388547,22.060514 10.3107433,22.0865344 C10.5520387,22.1038814 10.6067845,21.952963 10.6341574,21.7656161" fill="#FFFFFF" id="Fill-24" />
                        <path d="M11.6768801,22.4775778 L11.8010932,20.534287 L12.5928366,20.5665957 C12.967316,20.5841594 13.0650763,20.8721186 13.0535751,21.1470676 C13.0425339,21.3142487 12.9873281,21.5009452 12.8327518,21.6022079 C12.7060085,21.6882921 12.5429213,21.7086747 12.3920254,21.701736 L12.1339383,21.6882921 L12.0824128,22.5027309 L11.6768801,22.4775778 Z M12.1454395,21.3918763 L12.3552215,21.4029349 C12.5256695,21.4087895 12.6386114,21.3452564 12.6533329,21.109338 C12.6618438,20.8829605 12.5707542,20.8443635 12.349931,20.8352564 L12.1838535,20.8298355 L12.1454395,21.3918763 Z" fill="#FFFFFF" id="Fill-26" />
                        <path d="M67.5341199,4.2794898 L64.3864685,9.66528061 C63.1983935,8.75565051 61.7478608,8.08649235 59.8968559,8.08649235 C55.5165048,8.08649235 53.7370375,11.164273 53.7370375,13.3324235 C53.7370375,14.9420026 54.8549552,17.3163648 58.7524855,17.3163648 C60.3886477,17.3163648 62.7141925,16.2436735 63.383563,15.7553571 L60.2706453,22.0037245 C58.7867591,22.2827934 58.2991077,22.4558291 57.0431755,22.4924745 C50.0670012,22.6887117 47.2482845,18.6488265 47.2501247,14.5211224 C47.2549552,9.06399235 52.4015169,2.42748724 60.9338051,2.42748724 C61.4564201,2.42748724 62.0958874,2.59813776 62.642655,2.78700255 L63.1954031,2.12066327" fill="#FFFFFF" id="Fill-28" />
                        <path d="M80.521954,2.28973087 L81.4132978,21.8637997 L74.7798596,21.8637997 L74.7761792,18.5069503 L70.252753,18.5069503 L68.7642663,21.8637997 L61.5700291,21.8637997 L69.0913608,7.88628699 L67.3953923,7.87587883 L70.6175714,2.28973087 L80.521954,2.28973087 Z M74.7329346,8.27789413 L72.1757554,13.9713763 L74.8102228,13.9713763 L74.7329346,8.27789413 Z" fill="#FFFFFF" id="Fill-30" />
                        <path d="M43.0623729,2.28973087 C46.3473487,2.30707781 48.2036441,3.98799617 48.2036441,6.41591709 C48.2036441,8.65453954 46.245908,10.6357768 44.0967918,11.6603304 C46.3093947,12.4272819 46.5007748,14.3094247 46.5007748,15.6408023 C46.5007748,18.8580089 43.0766344,21.8637997 38.6254358,21.8637997 L28.917724,21.8637997 L32.7043826,8.08100638 L31.1489588,8.07254974 L34.3285835,2.28973087 C34.3285835,2.28973087 40.3911017,2.27238393 43.0623729,2.28973087 L43.0623729,2.28973087 Z M39.8395036,10.2259554 C40.5189952,10.2259554 41.7188015,10.0637615 42.018753,8.82410587 C42.3474576,7.47820026 41.2214891,7.44198852 40.6813923,7.44198852 L38.7514891,7.4341824 L38.0784383,10.2259554 L39.8395036,10.2259554 Z M37.1109564,13.6849349 L36.2223729,16.9019247 L38.4950121,16.9019247 C39.3888862,16.9019247 40.6073245,16.4834298 40.9058959,15.4365421 C41.2007869,14.3868355 40.3490073,13.6849349 39.4583535,13.6849349 L37.1109564,13.6849349 Z" fill="#FFFFFF" id="Fill-32" />
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          </p>
        </div>
      </div>
    </div>
  </footer>





  <!-- Bootstrap core JS-->
  <scri pt src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></scri>
  <!-- Core theme JS-->
  <script src="js/script.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>