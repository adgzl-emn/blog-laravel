@extends('front.leyouts.master');
@section('content')

    <!-- Content-->
    <div class="wil-content">

        <!-- Section -->
        <section class="awe-section">
            <div class="container">

                <!-- page-title -->
                <div class="page-title pb-40">
                    <h2 class="page-title__title">{!! $category->name !!}</h2>
                    <p class="page-title__text">İçerik Sayısı: {{count($articles)}} </p>
                    <div class="page-title__divider"></div>
                </div><!-- End / page-title -->

            </div>
        </section>
        <!-- End / Section -->


        <!-- Section -->
        <section class="awe-section bg-gray">
            <div class="container">
                <div class="grid-css grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
                    <div class="grid__inner">
                        <div class="grid-sizer"></div>

                        @foreach($articles as $article)
                            <div class="grid-item">
                                <div class="grid-item__inner">
                                    <div class="grid-item__content-wrapper">


                                        <div class="post">
                                            <div class="post__media"><a href="{{route('detail',$article->slug)}}"><img src="{{$article->image}}" alt=""/></a></div>
                                            <div class="post__body">
                                                <div class="post__meta"><span class="date">{{$article->created_at->diffForHumans()}}</span><span class="author"><a href="#">Kategori : {{$article->getCategory->name}}</a></span></div>
                                                <h2 class="post__title"><a href="blog-detail.html"></a>{{$article->title}}</h2>
                                                <p class="post__text">{{Str::limit($article->content,75)}}</p>
                                                <a class="md-btn md-btn--outline-primary" href="{{route('detail',$article->slug)}}">devamını oku
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="awe-text-center mt-50">
                    <a class="md-btn md-btn--outline-primary " href="#">Load more
                    </a>
                </div>
            </div>
        </section>
        <!-- End / Section -->

    </div>
    <!-- End / Content-->
@endsection
