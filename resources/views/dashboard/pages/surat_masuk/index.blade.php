@extends('dashboard.layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Daftar Surat Masuk</h2>
                            </div>
                            <div id="button-datatable"></div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="{{ url('surat_masuk/create') }}" class="btn btn-primary">+ Tambah Surat
                                        Masuk</a>
                                </div>
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>File Surat</th>
                                            {{-- <th>ID Surat</th> --}}
                                            <th>Nomor Surat</th>
                                            <th>Perihal</th>
                                            <th>Instansi</th>
                                            <th>Pengirim</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Upload</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @component('components.pipeline')
                @endcomponent
                @push('js-script')
                    <script>
                        let table = $('#datatable').DataTable({
                            responsive: true,
                            autoWidth: false,
                            paging: true,
                            searching: true,
                            ordering: true,
                            info: true,
                            processing: true,
                            serverSide: true,
                            searchHighlight: true,
                            order: [
                                [7, 'desc']
                            ],
                            pageLength: 10,
                            lengthMenu: [
                                [5, 10, 25, 50, 100],
                                [5, 10, 25, 50, 100]
                            ],
                            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                            ajax: $.fn.dataTable.pipeline({
                                url: '{!! url('get/surat_masuk') !!}',
                                data: function(d) {
                                    // d.filter = $('#filter').val();
                                    // d.status = $('#status').val();
                                    // d.pengusul = $('#pengusul').val();
                                    // d.deleted_data = $('#deleted_data').val();
                                }
                            }),
                            columns: [{
                                    data: 'DT_RowIndex',
                                    name: 'id'
                                },
                                {
                                    sortable: false,
                                    data: 'file_surat',
                                    name: 'file_surat'
                                },
                                // {
                                //     data: 'id',
                                //     name: 'id'
                                // },
                                {
                                    data: 'no_surat',
                                    name: 'no_surat'
                                },
                                {
                                    data: 'perihal',
                                    name: 'perihal'
                                },
                                {
                                    data: 'instansi',
                                    name: 'instansi'
                                },
                                {
                                    data: 'pengirim',
                                    name: 'pengirim'
                                },
                                {
                                    data: 'tanggal_surat',
                                    name: 'tanggal_surat'
                                },
                                {
                                    data: 'created_at',
                                    name: 'created_at'
                                },
                                {
                                    sortable: false,
                                    data: 'aksi',
                                    name: 'aksi'
                                },
                            ],
                            // "footerCallback": function(row, data, start, end, display) {
                            //     // var api = api.json();
                            //     // var rsTot = table.ajax.json();
                            //     var api = this.api(),
                            //         data;
                            //     let total = 0;
                            //     let anggaran = 0;
                            //     for (let i = 0; i < data.length; i++) {
                            //         anggaran = data[i].anggaran;
                            //         anggaran = typeof anggaran === 'string' ? anggaran.replace(/[\Rp.,]/g, '') * 1 :
                            //             typeof anggaran === 'number' ?
                            //             i : 0;
                            //         total += anggaran;
                            //     }


                            //     $(api.column(3).footer()).html(formatter.format(total));
                        });
                    </script>
                @endpush
            </div>
        </section>
    </div>
@endsection
