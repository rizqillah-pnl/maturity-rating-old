<style>
    .customSwalBtn {
        border: 0;
        border-radius: 3px;
        box-shadow: none;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        font-weight: 500;
        margin: 30px 5px 0px 5px;
        padding: 10px 32px;
    }

    .SwalBtn1 {
        background-color: rgb(6, 158, 57);
        border-left-color: rgb(10, 180, 53);
        border-right-color: rgb(10, 182, 47);
    }

    .SwalBtn1:hover {
        background-color: rgb(5, 121, 44);
        border-left-color: rgb(6, 151, 42);
        border-right-color: rgb(8, 143, 37);
    }

    .SwalBtn2 {
        background-color: rgb(27, 124, 189);
        border-left-color: rgb(27, 125, 189);
        border-right-color: rgb(27, 125, 189);
    }

    .SwalBtn2:hover {
        background-color: rgb(17, 90, 138);
        border-left-color: rgb(16, 92, 143);
        border-right-color: rgb(13, 92, 145);
    }

    .SwalBtn3 {
        background-color: rgb(212, 44, 44);
        border-left-color: rgb(214, 34, 34);
        border-right-color: rgb(224, 35, 35);
    }

    .SwalBtn3:hover {
        background-color: rgb(175, 30, 30);
        border-left-color: rgb(173, 29, 29);
        border-right-color: rgb(173, 24, 24);
    }

    .error-message {
        color: #fff;
        background: #ec0d0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
    }

    .error-message br+br {
        margin-top: 25px;
    }
</style>

@php
    $path = Request::path();
    $path = substr($path, 0, strpos($path, '/'));
    $path = str_replace($path . '/', '', Request::path());
@endphp


<div class="d-flex justify-content-end">

    <div class="btn-group">
        @if ($model->deleted_at)
            <form action="{{ 'restore/' . $path . '/' . $model->id }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success"
                    onclick="return confirm('Anda yakin akan mengembalikan data tersebut!')" title="Kembalikan Data">
                    <i class="bi bi-recycle text-white"></i>
                </button>
            </form>
        @endif
        <a href="{{ $path . '/' . $model->id . '/edit' }}" class="btn btn-warning" title="Edit Data">
            <i class="bi bi-pencil text-white"></i>
        </a>
        <button type="button" class="btn btn-info" data-bs-toggle="modal"
            data-bs-target="#detailsurat{{ $model->id }}" title="Detail Kegiatan">
            <i class="bi bi-info-circle text-white"></i>
        </button>
        @if (!$model->deleted_at)
            <form action="{{ $path . '/' . $model->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" title="Hapus Data"
                    onclick="return confirm('Anda yakin akan menghapus data tersebut!')">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        @endif
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="detailsurat{{ $model->id }}" tabindex="-1"
    aria-labelledby="detailsurat{{ $model->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="detailsurath1{{ $model->id }}Label">Detail Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td scope="col">ID Surat</td>
                            <td class="fw-semibold">{{ $model->id }}</td>
                        </tr>
                        <tr>
                            <td scope="col">File Surat</td>
                            <td class="fw-semibold"><a href="{{ url('storage/' . $model->file_surat) }}"
                                    target="_blank">{{ str_replace($path . '/' . $model->id . '/', '', $model->file_surat) }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col">Nomor Surat</td>
                            <td class="fw-semibold">{{ $model->no_surat }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Perihal</td>
                            <td class="fw-semibold">{{ $model->perihal }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Instansi Pengirim</td>
                            <td class="fw-semibold">{{ $model->instansi }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Nama Pengirim</td>
                            <td class="fw-semibold">{{ $model->pengirim }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Pengentri</td>
                            <td class="fw-semibold">{{ $model->user->nama }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Surat</td>
                            <td class="fw-semibold">{{ date('F d-m-Y', strtotime($model->tanggal_surat)) }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Upload</td>
                            <td class="fw-semibold">{{ date('d-m-Y H:i:s', strtotime($model->created_at)) }}</td>
                        </tr>
                    </table>
                </div>
                <span style="font-size: 13px"><span class="text-danger">*</span>Baca Tulisan Bercetak Tebal</span>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
