@extends('backend.app')
@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hakkımızda</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form action="" method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">

                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyonumuz </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name"  value="{{$hakkimizda->vizyon}}" class="form-control col-md-7 col-xs-12" name="vizyon">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Misyonumuz </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" value="{{$hakkimizda->misyon}}" class="form-control col-md-7 col-xs-12" name="misyon">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanıtım </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" value="{{$hakkimizda->kisa_yazi}}" class="form-control col-md-7 col-xs-12" type="text" name="kisa_yazi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Açıklama </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12" name="icerik" cols="30" rows="10">
                                            {{$hakkimizda->icerik}}
                                        </textarea>
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
