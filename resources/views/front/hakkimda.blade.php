@extends('front.leyouts.master');
@section('content')



        <!-- fullscreenmenu__module -->
        <div class="fullscreenmenu__module" trigger="#fs-button">

            <!-- overlay-menu -->
            <nav class="overlay-menu">

                <!--  -->
                <ul class="wil-menu-list">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="current-menu-item"><a href="about.html">About</a>
                    </li>
                    <li><a href="work.html">Work</a>
                    </li>
                    <li><a href="blog.html">Blog</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul><!--  -->

            </nav><!-- End / overlay-menu -->

        </div><!-- End / fullscreenmenu__module -->

    </header><!-- End / header -->

    <!-- Content-->
    <div class="wil-content">

        <!-- Section -->
        <section class="awe-section">
            <div class="container">

                <!-- page-title -->
                <div class="page-title pb-40">
                    <h2 class="page-title__title">Hakkımda</h2>
                    <p class="page-title__text"></p>
                    <div class="page-title__divider"></div>
                </div><!-- End / page-title -->

            </div>
        </section>
        <!-- End / Section -->


        <!-- Section -->
        <section class="awe-section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5 "><img src="{{asset('front')}}/assets/img/me.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">

                        <!--  -->
                        <div class="mt-30">
                            <h2 class="about__title">Mehmet Emin Adıgüzel</h2>
                            <p class="about__subtitle">Merhaba ben Emin</p>
                            <p class="about__text">İstanbul Kültür üniversitesi Bilgisayar Programcılığı mezunuyum,stajım da dahil 6-7 ay gibi çalışma tecrübem oldu. Şu an php laravel ile ilgileniyorum, daha önce PHP Codeigniter, Flutter, İonic Angular, Python Django ile çalıştım</p>



                    </div>
                </div>
            </div>
        </section>
        <!-- End / Section -->

    </div>
    <!-- End / Content-->


@endsection
