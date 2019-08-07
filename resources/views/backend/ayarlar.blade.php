@extends('backend.app')
@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>General Elements</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">

                        {{csrf_field()}}

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#genel_ayarlar" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Genel Ayarlar</a>
                            </li>
                            <li role="presentation" class=""><a href="#iletisim_ayarlari" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">İletişim Ayarları</a>
                            </li>
                            <li role="presentation" class=""><a href="#sosyal_medya" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sosyal Medya</a>
                            </li>
                            <li role="presentation" class=""><a href="#google_api" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Google API</a>
                            </li>
                            <li role="presentation" class=""><a href="#mail_ayarlari" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Mail Ayarları</a>
                            </li>
                        </ul>

                        <div id="myTabContent" class="tab-content">

                            <div role="tabpanel" class="tab-pane fade active in" id="genel_ayarlar" aria-labelledby="home-tab">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mevcut Logo </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img src="/uploads/img/{{$ayarlar->logo}}" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Logo </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" class="form-control col-md-7 col-xs-12" name="logo">
                                        <input type="hidden" name="eski_logo" value="{{$ayarlar->logo}}">
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->title}}" class="form-control col-md-7 col-xs-12" name="title">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Site Anahtar Kelimeler </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" value="{{$ayarlar->keywords}}"  class="form-control col-md-7 col-xs-12" name="keywords">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Site Açıklaması </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->description}}" class="form-control col-md-7 col-xs-12" type="text" name="description">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Site Adresi </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->url}}" class="form-control col-md-7 col-xs-12" type="text" name="url">
                                        </div>
                                    </div>

                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="iletisim_ayarlari" aria-labelledby="profile-tab">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-Posta </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->mail}}" class="form-control col-md-7 col-xs-12" name="mail">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->tel}}" class="form-control col-md-7 col-xs-12" name="tel">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">GSM </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" value="{{$ayarlar->gsm}}" class="form-control col-md-7 col-xs-12" name="gsm">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Faks </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->faks}}" class="form-control col-md-7 col-xs-12" type="text" name="faks">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Adres </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->adres}}" class="form-control col-md-7 col-xs-12" type="text" name="adres">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">İl </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->il}}" class="form-control col-md-7 col-xs-12" type="text" name="il">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">İlçe </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->ilce}}" class="form-control col-md-7 col-xs-12" type="text" name="ilce">
                                        </div>
                                    </div>

                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="sosyal_medya" aria-labelledby="profile-tab">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->facebook}}" class="form-control col-md-7 col-xs-12" name="facebook">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Twitter </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" value="{{$ayarlar->twitter}}" class="form-control col-md-7 col-xs-12" name="twitter">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Instagram </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->instagram}}" class="form-control col-md-7 col-xs-12" type="text" name="instagram">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Youtube </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->youtube}}" class="form-control col-md-7 col-xs-12" type="text" name="youtube">
                                        </div>
                                    </div>

                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="google_api" aria-labelledby="profile-tab">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Hesabi </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->google}}" class="form-control col-md-7 col-xs-12" name="google">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Google Recapctha </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" value="{{$ayarlar->recapctha}}" class="form-control col-md-7 col-xs-12" name="recapctha">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Google Maps </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->maps}}" class="form-control col-md-7 col-xs-12" type="text" name="maps">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Google Analystic </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->analystic}}" class="form-control col-md-7 col-xs-12" type="text" name="analystic">
                                        </div>
                                    </div>

                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="mail_ayarlari" aria-labelledby="profile-tab">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Adi </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" value="{{$ayarlar->smtp_user}}" class="form-control col-md-7 col-xs-12" name="smtp_user">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifre </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" id="last-name" value="{{$ayarlar->smtp_password}}" class="form-control col-md-7 col-xs-12" name="smtp_password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Host </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->smtp_host}}" class="form-control col-md-7 col-xs-12" type="text" name="smtp_host">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Port </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" value="{{$ayarlar->smtp_port}}" class="form-control col-md-7 col-xs-12" type="text" name="smtp_port">
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
    @endsection

@section('js')

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function (){
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {

                },
                success:function (response) {
                    //if (response.durum == 'OK'){
                        swal(
                            response.baslik,
                            response.icerik,
                            response.durum
                        )
                    //}
                    //else {

                    //}
                }
            });
        });
    </script>

    @endsection

@section('css')

    <link href="/css/sweetalert2.min.css" rel="stylesheet">

    @endsection
