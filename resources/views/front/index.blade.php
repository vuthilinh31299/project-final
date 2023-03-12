@extends('front.layout.index')
@section('content')

<?php $user = Auth::user();?>
<div class="fui-row-full">
        <div >
            @include('front.layout.header')
            <header class="intro-header mb-0">
                <div class="site-wrapper site-home-page">
                    <img class="lazy" src="front_asset/v2/images/home-bg-1.jpg" alt="Justgola">
                </div>
                <div class="site-wrapper-inner">
                    <div class="cover-container">
                        <div class="col-lg-12">
                            <div class="site-heading align-center mt-20">
                                <h1>Plan your trip</h1>
                                <span class="subheading">Justgola helps you plan your trip easily and travel with confidence.</span>
                                <a href="#" class="btn btn-info mixpanel-obj" data-action="click hover" data-params="" data-mx-name="Button How it works" id="show-push">How it works</a>
                            </div>
                        </div>
                        <form id="" name="" method="POST" action="{{route('front.provider.search')}}">
                            {{ csrf_field() }}

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center bg-create-plan">
                                <div class="create-plan">
                                    <div class="btn-group" role="group">
                                        <div class="btn-group" id="filter-destination-plan" role="group">
                                            <select name="city" id="inputcity" class="form-control" required="required" style=" height:42px; margin-top: 2px;">
                                                <option value="DANANG">ĐÀ NẴNG</option>
                                                <option value="HOIAN">HỘI AN</option>
                                                <option value="HUE">HUẾ</option>
                                            </select>
                                        </div>
                                        <div class="btn-group mixpanel-obj" role="group" style="width:200px;color:black">
                                            <div class="form-group">
                                                <input type="date" name="day_start" style=" height:38px; margin-top:20px; padding: 19px;">
                                            </div>
                                        </div>
                                        <div class="btn-group"  role="group">
                                            <div class="form-group">
                                                <select name="day" id="inputcity" class="form-control search-data" required="required">
                                                    <option value="1">1day</option>
                                                    <option value="2">2day</option>
                                                    <option value="3">3day</option>s
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group" id="filter-budget-plan" role="group">
                                            <div class="form-group">
                                                <select name="total_price" id="inputcity" class="form-control search-data" required="required">
                                                    <option value="1000000">1tr</option>
                                                    <option value="5000000">5tr</option>
                                                    <option value="15000000">15tr</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if($user)
                                            <button type="submit" class="btn btn-primary pull-right mixpanel-obj  search-data">CREATE AN ITINERARY</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </header>
           
    
            <section class="container">
                <div class="row">
                    <div class="text-center">
                        <h2 class="post-title">Top destinations</h2>
                        <p class="post-subtitle">Now, there are 77 attractive destinations in Asia.</p>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="grid-destination">
                            <div class="col-lg-8 col-md-12 row-mn">
                                <div class="grid-item">
                                    <a href="tripplanner/bagan.html">
                                        <img data-src="/media/a/00/00/479_lg_1.jpeg" title="Photo by Francisco Anzola" alt="Photo by Francisco Anzola">
                                    </a>
                                    <div class="grid-intro">
                                        <a href="tripplanner/bagan.html" title="">
                                            <h2>Bagan</h2>
                                        </a>
                                        <p><a href="guide/index.html#country/MM">Myanmar</a></p>
                                    </div>
                                    <div class="grid-terminal text-center">
                                        <div class="grid-avatar">
                                            <a href="u/tranthutuyen1991/index.html">
                                                <img data-src="/media/u/00/fe/1041751_md_2.jpeg" class="img-circle avatar" title="Trần Tuyến" alt="Trần Tuyến">
                                            </a>
                                        </div>
                                        <p>It is home to the largest and densest concentration of Buddhist temples</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 row-mn ">
                                <div class="city-item">
                                    <a href="tripplanner/bali.html">
                                        <div class="city-img">
                                            <img data-src="/media/a/00/00/1043_md_1.jpeg" alt="Photo by yeowatzup">
                                        </div>
                                        <div class="city-intro">
                                            <a href="tripplanner/bali.html" data-pjax>
                                                <h3 class="city-title">Bali</h3>
                                            </a>
                                            <h4 class="city-name"><a data-pjax href="guide/index.html#country/ID">Indonesia</a></h4>
                                            <div class="city-descr">
                                                <div class="city-detail">
                                                    <p class="pull-right">
                                                        <span>
                                                            <a href="u/brunaalm98/index.html">
                                                                <img data-src="/media/u/00/ff/1044837_md_1.jpeg" class="img-circle avatar" title="Bruna Almeida" alt="Bruna Almeida">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/omella-f/index.html">
                                                                <img data-src="/media/u/00/fe/1044129_md_1.jpeg" class="img-circle avatar" title="Omella Foo" alt="Omella Foo">
                                                            </a>
                                                            </span>
                                                        <span>
                                                            <a href="u/sarthaksharma007/index.html">
                                                                <img data-src="/media/u/00/fe/1043464_md_1.jpeg" class="img-circle avatar" title="Sarthak Sharma" alt="Sarthak Sharma">
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="sprite calendar-color"></span>2
                                                        <span class="sprite location"></span>1167
                                                    </p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-body text-center">
                                                        <p>It&#39;s known for its forested volcanic mountains, iconic rice paddies, beaches and coral reefs.</p>
                                                    </div>
                                                </div>
                                                <a href="place/indonesia/bali.html" data-pjax class="btn btn-info btn-explore">Explore more</a>
                                                <a href="tripplanner/bali.html" data-pjax class="btn btn-default btn-trip">New trip</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 row-mn ">
                                <div class="city-item">
                                    <a href="tripplanner/bangkok.html">
                                        <div class="city-img">
                                            <img data-src="/media/a/00/00/1746_md_1.jpeg" alt="Photo by Godot13">
                                        </div>
                                        <div class="city-intro">
                                            <a href="tripplanner/bangkok.html" data-pjax>
                                                <h3 class="city-title">Bangkok</h3>
                                            </a>
                                            <h4 class="city-name"><a data-pjax href="guide/index.html#country/TH">Thailand</a></h4>
                                            <div class="city-descr">
                                                <div class="city-detail">
                                                    <p class="pull-right">
                                                        <span>
                                                            <a href="u/amit4iitjee/index.html">
                                                                <img data-src="/media/u/00/fe/1044408_md_1.jpeg" class="    img-circle avatar" title="Amit Kumar" alt="Amit Kumar">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/v_ta_rahmi/index.html">
                                                                <img data-src="/media/u/00/fe/1043987_md_1.jpeg" class="img-circle avatar" title="Vita Rahmi Nurfitriana" alt="Vita Rahmi Nurfitriana">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/freyasmithcarrington/index.html">
                                                                <img data-src="/media/u/00/fe/1043822_md_2.jpeg" class="img-circle avatar" title="Freya Smith-Carrington" alt="Freya Smith-Carrington">
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="sprite calendar-color"></span>2
                                                        <span class="sprite location"></span>1203
                                                    </p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-body text-center">
                                                        <p>Is known for its ornate shrines and vibrant street life.</p>
                                                    </div>
                                                </div>
                                                <a href="place/thailand/bangkok.html" data-pjax class="btn btn-info btn-explore">Explore more</a>
                                                <a href="tripplanner/bangkok.html" data-pjax class="btn btn-default btn-trip">New trip</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 row-mn ">
                                <div class="city-item">
                                    <a href="tripplanner/beijing.html">
                                        <div class="city-img">
                                            <img data-src="/media/a/00/00/2494_md_1.jpeg" alt="Photo by faungg&#39;s photo">
                                        </div>
                                        <div class="city-intro">
                                            <a href="tripplanner/beijing.html" data-pjax>
                                                <h3 class="city-title">Beijing</h3>
                                            </a>
                                            <h4 class="city-name"><a data-pjax href="guide/index.html#country/CN">China</a></h4>
                                            <div class="city-descr">
                                                <div class="city-detail">
                                                    <p class="pull-right">
                                                        <span>
                                                            <a href="u/fujikanashiro/index.html">
                                                                <img data-src="/media/u/00/fe/1043918_md_1.jpeg" class="img-circle avatar" title="Fuji Pastor" alt="Fuji Pastor">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/error2c/index.html">
                                                                <img data-src="/media/u/00/fe/1043701_md_1.jpeg" class="img-circle avatar" title="Doni Atmadikaria" alt="Doni Atmadikaria">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/gobsenares.pru/index.html">
                                                                <img data-src="/media/u/00/fe/1043674_md_1.jpeg" class="img-circle avatar" title="Gretchen Obsenares" alt="Gretchen Obsenares">
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="sprite calendar-color"></span>4
                                                        <span class="sprite location"></span>503
                                                    </p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-body text-center">
                                                        <p>Beijing is known as much for its modern architecture as its ancient sites</p>
                                                    </div>
                                                </div>
                                                <a href="place/china/beijing.html" data-pjax class="btn btn-info btn-explore">Explore more</a>
                                                <a href="tripplanner/beijing.html" data-pjax class="btn btn-default btn-trip">New trip</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 row-mn ">
                                <div class="city-item">
                                    <a href="tripplanner/bintan-island.html">
                                        <div class="city-img">
                                            <img data-src="/media/a/00/0a/43543_md_1.jpeg" alt="Photo by Hometeamns">
                                        </div>
                                        <div class="city-intro">
                                            <a href="tripplanner/bintan-island.html" data-pjax>
                                                <h3 class="city-title">Bintan Island</h3>
                                            </a>
                                            <h4 class="city-name"><a data-pjax href="guide/index.html#country/ID">Indonesia</a></h4>
                                            <div class="city-descr">
                                                <div class="city-detail">
                                                    <p class="pull-right">
                                                        <span>
                                                            <a href="u/bsutharshan87sl/index.html">
                                                                <img data-src="/media/u/00/fe/1044459_md_1.jpeg" class="img-circle avatar" title="Sutharshan Balasuriyan" alt="Sutharshan Balasuriyan">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/cristpgomobar/index.html">
                                                                <img data-src="/media/u/00/fc/1036282_md_1.jpeg" class="img-circle avatar" title="Cristine Gomobar" alt="Cristine Gomobar">
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a href="u/daonguyentuduy123/index.html">
                                                                <img data-src="/media/u/00/fc/1033839_md_1.jpeg" class="img-circle avatar" title="Duy Dao" alt="Duy Dao">
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="sprite calendar-color"></span>2
                                                        <span class="sprite location"></span>209
                                                    </p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-body text-center">
                                                        <p>Is also a nice way to escape the bustle of Singapore.</p>
                                                    </div>
                                                </div>
                                                <a href="tripplanner/bintan-island.html" data-pjax class="btn btn-default btn-trip">New trip</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="right mt-0 mb-20 text-right width-full">
                                <a class="btn btn-icon" data-pjax href="guide/index.html">Explore Asia<span class="sprite arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="text-center">
                        <h2 class="post-title">Travel blog</h2>
                        <p class="post-subtitle">Stories and tips of planning trip to Asia</p>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="grid-comunity">
                            <div class="col-sm-6 col-md-3 col-lg-3 row-mn">
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-green-light br-green-light">
                                        <a href="blog/category/things-to-do.html">
                                            <h3 class="panel-title">Things to do</h3>
                                        </a>
                                    </div>
                                    <div class="panel-body img-panel hover">
                                        <a href="blog/zanzibar-international-film-festival_1-404.html" class="blog-image">
                                            <img data-src="/media/a/00/20/132151_md_1.jpeg" title="Photo by Zanzibar" alt="Photo by Zanzibar" class="img-crop">
                                        </a>
                                        <ul class="blog-footer list-inline">
                                            <li class="blog-footer-avatar">
                                                <a href="u/zanzibar/index.html">
                                                    <img data-src="/media/u/00/fa/1025835_md_1.jpeg" class="img-circle avatar" title="zanzibar" alt="zanzibar">
                                                </a>
                                            </li>
                                            <li class="blog-footer-body">
                                                <a href="u/zanzibar/index.html">
                                                    <strong>Zanzibar</strong>
                                                    <p>Nov 16, 16:24</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer panel-footer-200">
                                        <a href='blog/zanzibar-international-film-festival_1-404.html'>
                                            <h4>Zanzibar International Film Festival </h4>
                                        </a>
                                        The East African response to Cannes, ZIFF draws in film makers from Africa and further ...
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 row-mn">
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-orange br-orange">
                                        <a href="blog/category/travel.html">
                                            <h3 class="panel-title">Travel</h3>
                                        </a>
                                    </div>
                                    <div class="panel-body img-panel-half hover">
                                        <a href="blog/sibu-international-lantern-food-festival_1-403.html" class="blog-image">
                                            <img data-src="/media/a/00/20/131724_md_1.jpeg" title="Photo by Sarawak" alt="Photo by Sarawak" class="img-crop">
                                        </a>
                                        <ul class="blog-footer list-inline">
                                            <li class="blog-footer-avatar">
                                                <a href="u/sarawak/index.html">
                                                    <img data-src="/front_asset/images/avatar-default.png" class="img-circle avatar" title="sarawak" alt="sarawak">
                                                </a>
                                            </li>
                                            <li class="blog-footer-body">
                                                <a href="u/sarawak/index.html">
                                                    <strong>Sarawak</strong>
                                                    <p>Oct 10, 14:23</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer panel-footer-100">
                                        <a href='blog/sibu-international-lantern-food-festival_1-403.html'>
                                            <h4>Sibu International Lantern &amp; Food Festival </h4>
                                        </a>
                                        Bright and colourful lantern displays turn Sibu Town ...
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 row-mn">
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-blue br-blue">
                                        <a href="blog/category/travel-idea.html">
                                            <h3 class="panel-title">Travel Idea</h3>
                                        </a>
                                    </div>
                                    <div class="panel-body img-panel hover">
                                        <a href="blog/discover-the-majestic-home-of-kong-2-ha-long-ninh-binh-quang-binh-391.html" class="blog-image">
                                            <img data-src="/media/a/00/1a/108280_md_1.jpeg" title="Photo by meracushotels" alt="Photo by meracushotels" class="img-crop">
                                        </a>
                                        <ul class="blog-footer list-inline">
                                            <li class="blog-footer-avatar">
                                                <a href="u/maria/index.html">
                                                    <img data-src="/media/u/00/f4/1000320_md_5.jpeg" class="img-circle avatar" title="maria" alt="maria">
                                                </a>
                                            </li>
                                            <li class="blog-footer-body">
                                                <a href="u/maria/index.html">
                                                    <strong>Rosy</strong>
                                                    <p>Nov 12, 08:43</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer panel-footer-200">
                                        <a href='blog/discover-the-majestic-home-of-kong-2-ha-long-ninh-binh-quang-binh-391.html'>
                                            <h4>DISCOVER THE MAJESTIC HOME OF KONG 2: HA LONG – NINH BINH- QUANG BINH </h4>
                                        </a>
                                        When it comes to Vietnam, people think about Sai Gon, Ha Noi, fascinating destinations, ...
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 row-mn hidden-xs">
                                <div class="panel panel-primary panel-no-footer">
                                    <div class="panel-heading bg-blue-light br-blue-light">
                                        <a href="blog/category/promotion.html">
                                            <h3 class="panel-title">Promotion</h3>
                                        </a>
                                    </div>
                                    <div class="panel-body img-panel-full hover">
                                        <a href="blog/mercure-banahills-french-village-uu-dai-tron-goi-hap-dan-amazing-french-village-390.html" class="blog-image">
                                            <img data-src="/media/a/00/1a/107313_md_1.jpeg" title="Photo by danangvi" alt="Photo by danangvi" class="img-crop">
                                        </a>
                                        <ul class="blog-footer list-inline">
                                            <li class="blog-footer-avatar">
                                                <a href="u/danangfantasticity_vi/index.html">
                                                    <img data-src="/media/u/00/f6/1008799_md_5.jpeg" class="img-circle avatar" title="danangfantasticity_vi" alt="danangfantasticity_vi">
                                                </a>
                                            </li>
                                            <li class="blog-footer-body">
                                                <a href="u/danangfantasticity_vi/index.html">
                                                    <strong>Danang FantastiCity</strong>
                                                    <p>Mar 16, 09:38</p>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="panel-footer">
                                            <a href='blog/mercure-banahills-french-village-uu-dai-tron-goi-hap-dan-amazing-french-village-390.html'>
                                                <h4>MERCURE Banahills French Village – Ưu đãi trọn gói hấp dẫn AMAZING FRENCH VILLAGE </h4>
                                            </a>
                                            MERCURE Banahills French Village – Ưu đãi trọn gói hấp dẫn AMAZING FRENCH VILLAGE
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="right mt-0 mb-20 text-right width-full">
                                <a type="button" class="btn btn-icon" href="blog/index.html">View Travel blog<span class="sprite arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>
<script type="text/javascript">
    
</script>
@endsection

