@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog</h3>
                </div>

                <div class="row">
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Başlık</th>
                                                                <th>Yazar</th>
                                                                <th>Kategorisi</th>
                                                                <th>Hit</th>
                                                                <th>Yorum Sayisi</th>
                                                                <th>Ekleme Tarihi</th>
                                                                <th>Düzenleme Tarihi</th>
                                                                <th>Sil</th>
                                                                <th>Düzenle</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($bloglar as $blog)
                                                            <tr>
                                                                <td>{{$blog->baslik}}</td>
                                                                <td>{{$blog->yazar}}</td>
                                                                <td>{{$blog->kategori}}</td>
                                                                <td>{{$blog->hit}}</td>
                                                                <td></td>
                                                                <td>{{$blog->created_at}}</td>
                                                                <td>{{$blog->updated_at}}</td>
                                                                <td>
                                                                    <form action="" method="post" id="form" name="form">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="slug" value="{{$blog->slug}}" >
                                                                        <input type="submit" onclick="deleteRow(this)" class="btn btn-danger" value="Sil">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="blog/blog-duzenle/{{$blog->slug}}" class="btn btn-primary">Düzenle</a>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
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

    <script src="/backend//vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend//vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/backend//vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/backend//vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/backend//vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/backend//vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/backend//vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/backend//vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/backend//vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/backend//vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backend//vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/backend//vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="/backend//vendors/jszip/dist/jszip.min.js"></script>
    <script src="/backend//vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/backend//vendors/pdfmake/build/vfs_fonts.js"></script>

    <script>
        function deleteRow(r) {
            var i = r.parentNode.parentNode.parentNode.rowIndex;
            document.getElementById("datatable-buttons").deleteRow(i);
        }
        $(document).ready(function (){
            $('form').ajaxForm({
                success:function (response) {
                    swal(
                        response.baslik,
                        response.icerik,
                        response.durum
                    )
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                    { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>

    @endsection

@section('css')

    <link href="/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="/css/sweetalert2.min.css" rel="stylesheet">

    @endsection
