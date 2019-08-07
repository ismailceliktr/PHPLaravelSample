@extends('frontend.app')
@section('icerik')
<div role="main" class="main">

    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Hakkımızda</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Hakkımızda</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-10">
                <p class="lead">
                    {{$hakkimizda->kisa_yazi}}
                </p>
            </div>
            <div class="col-md-2">
                <a href="/iletisim" class="btn btn-lg btn-primary push-top">Bize Ulaşın</a>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-8">
                <h3><strong>Biz</strong> Kimiz?</h3>
                {{$hakkimizda->icerik}}
            </div>
            <div class="col-md-4">
                <div class="featured-box featured-box-secundary">
                    <div class="box-content">
                        <h4>Örnek Galeri</h4>
                        <ul class="thumbnail-gallery flickr-feed" data-plugin-flickr data-plugin-options='{"qstrings": { "id": "93691989@N03" }, "limit": 6}'></ul>
                    </div>
                </div>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-12">
                <h3 class="push-top"><strong>Vizyonumuz</strong></h3>
            </div>
        </div>

        <div class="featured-box">
            <div class="box-content">
                {{$hakkimizda->vizyon}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="push-top"><strong>Misyonumuz</strong></h3>
            </div>
        </div>

        <div class="featured-box">
            <div class="box-content">
                {{$hakkimizda->misyon}}
            </div>
        </div>

    </div>

</div>

    @endsection

@section('js')

    @endsection

@section('css')

    @endsection
