@extends('front.leyouts.master')
@section('content')



    <!-- Content-->
    <div class="wil-content">

        <!-- Section -->
        <section class="awe-section">
            <div class="container">

                <!-- page-title -->
                <div class="page-title pb-40">
                    <h2 class="page-title__title">İletişim</h2>
                    <p class="page-title__text">Her türlü geri bildirim, soru ve daha fazlası için mesaj gönderebilirsiniz.</p>
                    <div class="page-title__divider"></div>
                </div><!-- End / page-title -->

            </div>
        </section>
        <!-- End / Section -->


        <!-- Section -->
        <section class="awe-section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 ">

                        <!-- contact -->
                        <div class="contact">
                            <div class="contact__icon"><i class="pe-7s-note"></i></div>
                            <h3 class="contact__title">İstanbul</h3>

                        </div><!-- End / contact -->


                        <!-- contact -->


                        <!-- contact -->
                        <div class="contact">
                            <div class="contact__icon"><i class="pe-7s-voicemail"></i></div>
                            <h3 class="contact__title">e-mail</h3>
                            <div class="contact__text">adgzlemn51@gmail.com</div>
                        </div><!-- End / contact -->

                    </div>
                    <div class="col-md-7 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">
                        <div class="form-wrapper">

                            <!-- form-item -->
                            <form method="post" action="{{route('iletisim.create')}}">
                                @csrf
                            <div class="form-item form-item--half">
                                <input class="form-control" type="text" name="name" placeholder="Adınız" required/>
                            </div><!-- End / form-item -->


                            <!-- form-item -->
                            <div class="form-item form-item--half">
                                <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                            </div><!-- End / form-item -->


                            <!-- form-item -->
                            <div class="form-item">
                                <input class="form-control" type="text" name="title" placeholder="Başlık" required/>
                            </div><!-- End / form-item -->


                            <!-- form-item -->
                            <div class="form-item">
                                <textarea name="icerik" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Mesajınız" required></textarea>
                            </div><!-- End / form-item -->


                            <!-- form-item -->
                            <div class="form-item">
                                <button class="md-btn md-btn--primary md-btn--lg " type="submit">Send message
                                </button>
                            </div><!-- End / form-item -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End / Section -->

    </div>
    <!-- End / Content-->



@endsection
