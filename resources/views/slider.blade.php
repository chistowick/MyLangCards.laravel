<!-- Карусель -->
<div class="row no-gutters justify-content-center pb-5 pt-5">
    <div class="col-11 col-md-10 col-lg-9 col-xl-8">
        <div id="carousel-welcome" class="carousel slide rounded shadow-lg" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-welcome" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-welcome" data-slide-to="1"></li>
                <li data-target="#carousel-welcome" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/slider/slide-1.jpg') }}" alt="Первый слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/slider/slide-2.jpg') }}" alt="Второй слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/slider/slide-3.jpg') }}" alt="Третий слайд">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-welcome" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-welcome" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>