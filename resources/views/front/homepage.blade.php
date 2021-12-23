@extends('front.leyouts.master')
@section('content')


    <!-- Content-->
    <div class="wil-content">

        <!-- Section -->
        <section class="awe-section">
            <div class="container">

                <!-- page-title -->
                <div class="page-title">
                    <h2 class="page-title__title">Hello, my name is Emin<br>I

                        <!-- typing__module -->
                        <div class="typing__module">
                            <div class="typed-strings"><span>'m a Back-end developer</span><span> do creative</span><span>love to get lost in code</span>
                            </div><span class="typed"></span>
                        </div><!-- End / typing__module -->

                    </h2>
                    <p class="page-title__text"></p>
                    <div class="page-title__divider"></div>
                </div><!-- End / page-title -->

            </div>
        </section>



        <!-- Section -->
        <section class="awe-section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 ">

                        <!-- title -->
                        <div class="title">
                            <h2 class="title__title">Yazılarım</h2>
                        </div><!-- End / title -->

                    </div>
                </div>
                <div class="grid-css grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
                    <div class="grid__inner">
                        <div class="grid-sizer"></div>

                        @foreach($articles as $article)

                        <div class="grid-item">
                            <div class="grid-item__inner">
                                <div class="grid-item__content-wrapper">

                                    <!-- work -->
                                    <div class="work"><a href="{{route('detail',$article->slug)}}">

                                            <!-- hoverbox ef-zoom-in -->
                                            <div class="hoverbox ef-zoom-in light">

                                                <!-- hb_front -->
                                                <div class="hb_front"><img src="{{$article->image}}"  alt=""/>
                                                </div><!-- End / hb_front -->


                                                <!-- hb_back -->
                                                <div class="hb_back">
                                                    <h2 class="work__title">{{$article->title}}</h2><span class="work__text">{{Str::limit($article->content,20)}}</span>
                                                </div><!-- End / hb_back -->

                                            </div><!-- End / hoverbox ef-zoom-in -->
                                        </a>
                                    </div><!-- End / work -->

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="awe-text-center mt-50">
                    <a class="md-btn md-btn--outline-primary" href="{{route('yazilar')}}">all work
                    </a>
                </div>
            </div>
        </section>
        <!-- End / Section -->

    </div>
    <!-- End / Content-->






@endsection
