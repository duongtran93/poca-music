<section class="welcome-area">
    <!-- Welcome Slides -->
    <div class="welcome-slides owl-carousel">

        <!-- Single Welcome Slide -->
        <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('storage/source/img/bg-img/1.jpg') }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Welcome Text -->
                        <div id="carouselExampleSlidesOnly" class="carousel slide mt-5" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/images/slide1.jpg') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/images/slide2.jpg') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/images/slide3.jpg') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/images/slide4.jpg') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/images/slide5.jpg') }}" class="d-block" alt="...">
                                </div>
                            </div>
                        </div>
                        <!-- Welcome Music Area -->
                        <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
                            <div class="poca-music-thumbnail">
                                <img src="{{ asset('storage/images/cothamkhongve.jpeg') }}" style="">
                            </div>
                            <div class="poca-music-content">
                                <span class="music-published-date">26, tháng 12, 2019</span>
                                <h2>Cô Thắm Không Về</h2>
                                <div class="music-meta-data">
                                    <p>By <a href="#" class="music-author">Admin</a> | <a href="#" class="music-catagory">Hướng dẫn</a> | <a href="#" class="music-duration">00:04:06</a></p>
                                </div>
                                <!-- Music Player -->
                                <div class="poca-music-player">
                                    <audio preload="auto" controls>
                                        <source src="{{ asset('storage/songs/co-tham-khong-ve.mp3') }}">
                                    </audio>
                                </div>
                                <!-- Likes, Share & Download -->
                                <div class="likes-share-download d-flex align-items-center justify-content-between">
                                    <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Thích (29)</a>
                                    <div>
                                        <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ (04)</a>
                                        <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Tải xuống (12)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
