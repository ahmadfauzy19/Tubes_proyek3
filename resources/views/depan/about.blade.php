<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to Web Personal Profile</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://use.fontawesome.com/releases/v6.1.0/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css">
    <link href="{{ asset('depan') }}/css/about.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('depan') }}/assets1/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('depan') }}/assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('depan') }}/assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('depan') }}/assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('depan') }}/assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('depan') }}/assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('depan') }}/assets1/css/style.css" rel="stylesheet">

</head>

<body>
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
        <ul>
            <li><a href="#about" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>About</span></a></li>
            <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>about</span></a></li>
            <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
            <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
        </nav><!-- .nav-menu -->
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="sideNav">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="images1" href="/cv">
                            <img src="{{ asset('admin') }}/images/faces/back.png" alt="profile" width="60" height="60">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    </header><!-- End Header -->

    <!-- Isi dari Cv -->
    <div class="container" >
        <section id="about" class="about">
            <!-- <div class="profile"> -->
                <div class="profile_container">
                    <div class="profile_profileImg">
                        <img class="images rounded-image" src="{{ asset('storage/' . $data['profile']->gambar) }}" alt="profile" />
                        <a class="downloadBtn" href="./cv.pdf" download="Resume.pdf">Download Resume</a>
                        <a href="{{ route('profile.edit', $data['profile']->id) }}" class="downloadBtn">Edit</a>
                    </div>
                    <div>
                        <h1 class="profile_name">
                            <span class="profile_name_lastName">{{ $data['profile']->nama }}</span>
                        </h1>
                        <p class="profile_title">DESKRIPSI DIRI</p>
                        <p class="description profile_description">
                            {{ $data['profile']->dataDiri }}
                        </p>
                    </div>
                </div>
            <!-- </div> -->
        </section>
    </div>


    <div class="container1">
        <div class="profile">
            <div class="group-1">
                <div class="edu">
                    <h3 class="title">Riwayat Pendidikan</h3>
                    <div class="edu_item">
                        @foreach ($data['riwayatPendidikan'] as $riwayatpd)
                        <div class="item_preTitle">{{ $riwayatpd->thn_mulai }} - {{ $riwayatpd->thn_akhir }}</div>
                        <p class="item_subtitle">{{ $riwayatpd->namaSekolah }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="exp">
                    <h3 class="title">Riwayat Pekerjaan</h3>
                    <div class="exp_item">
                        @foreach ($data['riwayatPekerjaan'] as $riwayatpk)
                        <div class="item_preTitle">{{ $riwayatpk->tgl_mulai }} sd. {{ $riwayatpk->tgl_akhir }}</div>
                        <p class="item_preTitle">{{ $riwayatpk->namaPerusahaan }} - {{ $riwayatpk->domisilPerusahaan }}</p>
                        <p class="item_subtitle">{{ $riwayatpk->jabatan }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="skills">
                    <h3 class="title">Keahlian</h3>
                    <ul class="skills_list description">
                        @foreach ($data['keahlian'] as $keahlian)
                        <li>
                            <!-- <span class="skill-name">{{ $keahlian->namaSkill }}:</span>
                            <span class="skill-percent">{{ $keahlian->tingkatanSkill }}%</span> -->
                            <span class="skill-name">{{ $keahlian->namaSkill }}:</span>
                            <!-- Menambahkan class "skill-bar" untuk diagram garis -->
                            <div class="skill-bar">
                                <div class="skill-level" style="width: {{ $keahlian->tingkatanSkill }}%;"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="group-2">
                <div class="contact">
                    <h3 class="title">Kontak</h3>
                    <div class="contact_info">
                        <p class="description">{{ $data['profile']->kontak }}</p>
                    </div>
                </div>

                <div class="social">
                    <h3 class="title">Alamat</h3>
                    <a href="#" target="_blank" class="social_item">
                        <i class="fab fa-github"></i>
                        <span>{{ $data['profile']->alamat }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>
