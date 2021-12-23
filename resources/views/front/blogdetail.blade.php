@extends('front.leyouts.master')
@section('content')

    <!-- Content-->
    <div class="wil-content">

        <!-- Section -->
        <section class="awe-section">
            <div class="container">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="page-title pb-40">
                                <h2 class="page-title__title"> {!! $article->title !!}</h2>
                                <div class="post-detail__meta"><span class="date">{!! $article->created_at->diffForHumans() !!}</span><span class="author"><a href="#">{!! $article->getCategory->name !!}</a></span></div>
                                <div class="page-title__divider"></div>
                            </div><!-- End / page-title -->
                        </div>

                        <div class="col-md-6">
                            <div>
                                <!--
                                <img class="img-responsive" width="600" height="300" src="{!! $article->image !!}" alt="">
                                -->
                        </div>
                        </div>
                    </div>

        </section>
        <!-- End / Section -->


        <!-- Section -->
        <section class="awe-section bg-gray">
            <div class="container">

                <!--  -->
                <div>
                    <div class="post-detail__media"><img src="https://images.pexels.com/photos/395132/pexels-photo-395132.jpeg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb" alt=""/></div>
                    <div class="post-detail__entry row">
                        <div class="col-md-8">
                            <h5></h5>
                            <p>{!! $article->content !!}</p>


                    </div>


        </section>
        <!-- End / Section -->

    </div>
    <!-- End / Content-->


@endsection
