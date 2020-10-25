@extends('layouts.home')

@section('content')
	<style>
		.title-xs {
		    font-size: 0.80rem;
		}
	</style>
    <main class="nk-pages bg-transparent">
        <!-- Start Section -->
        <!-- Banner @s -->
        <div class="header-banner">
            <div class="nk-banner">
                <div class="banner banner-fs banner-single">
                    <div class="banner-wrap mt-auto">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-between">
                                <div class="col-lg-5 order-lg-last " data-animate="fadeInUp" >
                                    <!-- <div class="banner-gfx banner-gfx-re-s5 op-30">
                                        <img src="images/header/gfx-f.png" alt="header">
                                    </div> -->
                                    <div class="abs-center w-100 index-9">
                                        <iframe style="width: 100%; height: 280px;" src="https://www.youtube.com/embed/4_b3c1vjUeo"></iframe>
                                    </div>
                                </div><!-- .col -->
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="banner-caption cpn">
                                        <div class="cpn-head">
                                            <h1 class="title title-xl-2 title-lg title-semibold " >Decentralized Content Management With Blockchain</h1>
                                        </div>
                                        <div class="cpn-text">
                                            <p class="lead-s2 "  >Review Capital provides decentralized content management solutions on its native RECAP blockchain</p>
                                        </div>
                                        <div class="cpn-action">
                                            <ul class="cpn-links "  >
                                                <li><a target="_blank" href="https://coindesknepal.com/" class="btn btn-md btn-management">CoinDesk Nepal</a></li>
                                                <li><a target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem/RIP/blob/master/RequestRECAPIntegration.md" class="btn btn-md btn-management">Request RECAP Integration</a></li>
                                                <li><a target="_blank" href="https://buzzernepal.com/" class="btn btn-md btn-management">Buzzer Nepal</a></li>
                                                <li><a href="{{ route('proposal') }}" class="btn btn-md btn-management">Submit Your Content</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    </div>
                    <div class="nk-ovm shape-u shape-contain shape-left-top"></div>
                </div>
            </div><!-- .nk-banner -->
        </div>
        <section class="section section-feature ov-h">
            <div class="container">
                <div class="section-head section-head-s3  text-center">
                    <h2 class="title "  style="margin-bottom: 0rem;">We bring true press freedom to everyone,</h2>
                    <h2 class="title "  >everywhere through blockchain implementation</h2>
                    <p class=""   style="margin-bottom: 0rem;">News writers,content creators and businesses use REACP to build decentralized contents</p>
             		<p class=""  >so that everyone can access authentic,tamper-proof news and reviews.</p>
                </div>
                <div class="nk-block">
                    <div class="row justify-content-center gutter-vr-30px">
                        <div class="col-lg-4 col-sm-8">
                            <div class="feature text-center ">
                                <div class="feature-icon feature-icon-custom">
                                    <img src="https://placehold.jp/ffe4c4/000/40x40.png" alt="feature" class="rounded-circle">
                                </div>
                                <div class="feature-text">
                                    <h6 class="title title-xs title-xs-s3 tc-default  text-uppercase"  >GOVERNANCE DAO</h6>
                                    <h5 class="title title-md">100% Decentralized</h5>
                                    <p> Evrey proposals and contents are voted by masternodes and automatically published where vaildators assign the authentic score.Completely runs through improvement proposals.</p>
                                    <a target="_blank" href="/faq" class="btn btn-outline-primary btn-learnMore">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-8">
                            <div class="feature text-center "  >
                                <div class="feature-icon feature-icon-custom">
                                    <img src="https://placehold.jp/ffe4c4/000/40x40.png" alt="feature" class="rounded-circle">
                                </div>
                                <div class="feature-text">
                                    <h6 class="title title-xs title-xs-s3 tc-default  text-uppercase"  >PROOF OF WORK - PROOF OF SERVICE </h6>
                                    <h5 class="title title-md">Secure & Rewarding</h5>
                                    <p>We have implemented Secure Proof of Work and Proof of Service to reward all miners,masternodes,content creators, vaildators and community based on work and survice values.</p>
                                    <a target="_blank" href="https://reviewcapital.org/faq" class="btn btn-outline-primary btn-learnMore">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-8">
                            <div class="feature text-center "  >
                                <div class="feature-icon feature-icon-custom">
                                    <img src="https://placehold.jp/ffe4c4/000/40x40.png" alt="feature" class="rounded-circle">
                                </div>
                                <div class="feature-text">
                                    <h6 class="title title-xs title-xs-s3 tc-default  text-uppercase"  >TRANSPARENT AUTHENTIC</h6>
                                    <h5 class="title title-md">100% Reliablility</h5>
                                    <p>We provied 100% reliable contents (news & reviews) accessible to everyone, everywhere. no more paid pr marketed contents</p>
                                    <a target="_blank" href="https://reviewcapital.org/faq" class="btn btn-outline-primary btn-learnMore">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-tokensale ov-h" id="tokens">
            <div class="container">
                <!-- Block @s -->
                <div class="nk-block nk-block-token">
                    <div class="row bg-theme-grad-s2 justify-content-between">
                        <div class="col-lg-8 tc-light bg-theme-custom p-4">
                            <h4 class="title title-sm">Earning Calculator</h4>
                        </div>
                        <div class="col-lg-4 bg-white">
                        </div>
                        <div class="col-lg-8 tc-light p-4">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase active" data-toggle="pill" href="#Mining">Mining</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" data-toggle="pill" href="#Validators">Validators</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" data-toggle="pill" href="#Masternodes">Masternodes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" data-toggle="pill" href="#Writers">Writers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" data-toggle="pill" href="#CoreTeam">Core Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" data-toggle="pill" href="#Leaders">Leaders</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 bg-white">
                        </div>
                        <!-- Tab panes -->
                        <div class="col-12">
                            <div class="tab-content">
                                <div id="Mining" class="container tab-pane active">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">5,702.4 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">171,072 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">2,052,864 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Utilize computing power for X11 hashing</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Validators" class="container tab-pane fade">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">1,520.64 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">45,619.2 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">547,430.4 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Validate the contents of RECAP Applications</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Masternodes" class="container tab-pane fade">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">5,702.4 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">171,072 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">2,052,864 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Setup nodes and get voting power</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Writers" class="container tab-pane fade">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">3,041.28 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">91,238.4 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">1,094,860.8 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Write Contents,Earn Rewards</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="CoreTeam" class="container tab-pane fade">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">760.32 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">22,809.6 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">273,715.2 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Join core team and build RECAP community</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Leaders" class="container tab-pane fade">
                                    <div class="row mr-16">
                                        <div class="col-lg-8 tc-light p-4">
                                            <div class="col-12 table-responsive mt-5">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Daily</td>
                                                            <td class="text-right title-md text-white">380.16 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly</td>
                                                            <td class="text-right title-md text-white">11,404.8 RECAP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Yearly</td>
                                                            <td class="text-right title-md text-white">132,857.6 RECAP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center bg-white">
                                            <div class="text-center "  >
                                                <div class="token-box token-box-s3">
                                                    <h4 class="title title-md">Lead the RECAP community for Blockchain awareness</h4>
                                                    <p>Every work done in RECAP Blockchain is rewarding and profitable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .section-tokensale -->   
        </section>
        <!-- // -->
        <section class="section partner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="title-lg mb-5">Meet Our Partners</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="has-carousel carousel-nav-center" data-items="3" data-navs="true">
                        <div class="item "  >
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6  d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="item  d-flex justify-content-end flex-column"   style="height: 300px;">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-4 d-flex justify-content-center" style="position: relative;top: -60px;">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-4  d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center" style="position: relative;top: -30px;">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="item " >
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="item  d-flex justify-content-end flex-column"  style="height: 300px;">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-4 d-flex justify-content-center" style="position: relative;top: -60px;">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-4  d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center" style="position: relative;top: -30px;">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="item "  >
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <img src="https://placehold.jp/ffe4c4/000/100x100.png" alt="" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section class="bottom-section">
            <div class="nk-banner">
                <div class="banner banner-fs banner-single">
                    <div class="banner-wrap">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-between">
                                <div class="col-lg-5 order-lg-last "  >
                                    <!-- <div class="banner-gfx banner-gfx-re-s5 op-30">
                                        <img src="/images/header/gfx-f.png" alt="header">
                                    </div> -->
                                    <div class="abs-center w-100 index-9">
                                        <img class="img-fluid" src="https://placehold.jp/ffe4c4/000/470x300.png" alt="">
                                    </div>
                                </div><!-- .col -->
                                <div class="col-lg-12 text-center text-lg-center mb-4">
                                	<div class="cpn-head">
                                        <h1 class="title title-xl-2 title-lg title-semibold " >Meet the People Behind Recap</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="banner-caption cpn">
                                        <div class="cpn-head">
                                            <h3 class="title title-xl-2 title-lg title-semibold " >Together We Can Do It.</h3>
                                        </div>
                                        <div class="cpn-text">
                                            <p class="lead-s2 "  >
                                            	REACP is built by everyone. If you're reading this, you're already a part of a community. We have pepole from different skills, different cultures, different countries and different ideas who are together in REACP. Some of the prominent contributors are listed here.
                                            </p>
                                            <a class="mt-4" href="{{ url('/team') }}" target="_blank">View Some of our prominent contributers</a>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    </div>
                </div>
            </div><!-- .nk-banner -->
        </section>
    </main>
@endsection        