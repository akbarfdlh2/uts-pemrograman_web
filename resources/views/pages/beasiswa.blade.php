@extends('layouts.app')

@section('title', 'Master Data Beasiswa - Universitas Esa Unggul')

@section('breadcrumb', 'Master Data Beasiswa')

@section('section-subheader')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Master Data Beasiswa</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Aplication</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Data Beasiswa</li>
                    </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a class="btn btn-sm btn-neutral" id="createNewBeasiswa">Create New Data Beasiswa</a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('section-content')
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Data Beasiswa</h3>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="data_table-beasiswa">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tahap</th>
                    <th>Periode</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Kuota Beasiswa</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modalBeasiswa" tabindex="-1" role="dialog" aria-labelledby="modalBeasiswa" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modalHeadingBeasiswa"></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="formBeasiswa">
                <input type="hidden" id="id_beasiswa" name="id_beasiswa">
                <div class="form-group">
                    <label class="form-control-label" for="nama">Nama Beasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Beasiswa" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="description">Description Beasiswa</label>
                    <textarea type="text" rows="5" class="form-control" id="description" name="description" placeholder="Type description product here..."></textarea>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-control-label" for="tahap">Tahap</label>
                        <input type="number" class="form-control" id="tahap" name="tahap" placeholder="Tahap Beasiswa" required>
                    </div>
                    <div class="form-group col">
                        <label class="form-control-label" for="periode">Periode</label>
                        <input type="number" class="form-control" id="periode" name="periode" placeholder="Periode" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>
                    <div class="form-group col">
                        <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-control-label" for="kuota_beasiswa">Kuota Beasiswa</label>
                        <input type="number" class="form-control" id="kuota_beasiswa" name="kuota_beasiswa" placeholder="Kuota Beasiswa" required>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveBtnBeasiswa">Save changes</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var table_beasiswa = $('#data_table-beasiswa').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                dom:"Bfrtip",
                buttons:[
                    {
                        text: '<i class="ni ni-lg ni-ungroup"></i> Copy',
                        extend: 'copy',
                        className: 'btn btn-default btn-sm m-1 width-140 ',
                        exportOptions: {
                            columns: [ 0, 1, 4, 5, 6 ]
                        }
                    }, {
                        text: '<i class="fa fa-lg fa-print"></i> Print',
                        extend: 'print',
                        className: 'btn btn-default btn-sm m-1 width-140',
                        exportOptions: {
                            columns: [ 0, 1, 4, 5, 6 ]
                        }
                    }
                ],
                language: {
                    paginate: {
                        previous:"<i class='fas fa-angle-left'>",
                        next:"<i class='fas fa-angle-right'>"
                    }
                },
                ajax: {
                    url: "{{ route('beasiswa-loadData') }}"
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tahap',
                        name: 'tahap'
                    },
                    {
                        data: 'periode',
                        name: 'periode'
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai'
                    },
                    {
                        data: 'tanggal_selesai',
                        name: 'tanggal_selesai'
                    },
                    {
                        data: 'kuota_beasiswa',
                        name: 'kuota_beasiswa'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewBeasiswa').click(function () {
                $('#saveBtnBeasiswa').val("create");
                $('#id_beasiswa').val('');
                $('#formBeasiswa').trigger("reset");
                $('#modalHeadingBeasiswa').html("Create New Beasiswa");
                $('#modalBeasiswa').modal('show');
            });

            $('#saveBtnBeasiswa').click(function (e) {
                if ($("#formBeasiswa")[0].checkValidity()) {
                    e.preventDefault();
                    $(this).html("Saving <svg width='20' viewBox='-2 -2 42 42' xmlns='http://www.w3.org/2000/svg' stroke='white' class='w-4 h-4 ml-2'><g fill='none' fill-rule='evenodd'><g transform='translate(1 1)' stroke-width='4'><circle stroke-opacity='.5' cx='18' cy='18' r='18'></circle><path d='M36 18c0-9.94-8.06-18-18-18'><animateTransform attributeName='transform' type='rotate' from='0 18 18' to='360 18 18' dur='1s' repeatCount='indefinite'></animateTransform></path></g></g></svg>");
                    document.getElementById("saveBtnBeasiswa").disabled = true;

                    $.ajax({
                        data: $('#formBeasiswa').serialize(),
                        url: ($(this).val() == 'create') ? "{{ route('beasiswa-store') }}" : "{{ route('beasiswa-update') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            document.getElementById("saveBtnBeasiswa").disabled = false;
                            $('#formBeasiswa').trigger("reset");
                            $('#modalBeasiswa').modal('hide');
                            $('#saveBtnBeasiswa').html('Save Data');
                            table_beasiswa.draw();
                            ToastTopEnd.fire({
                                type: 'success',
                                title: data.success
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    document.getElementById("saveBtnBeasiswa").disabled = false;
                    $("#formBeasiswa")[0].reportValidity();
                }
                
            });

            $('body').on('click', '.editBeasiswa', function () {

                var id_beasiswa = $(this).data('id');

                $.ajax({
                    url: "{{ route('beasiswa-edit') }}",
                    type: "GET",
                    data: {
                        id_beasiswa: id_beasiswa
                    },
                    success: function (data) {
                        $('#modalHeadingBeasiswa').html("Edit Beasiswa");
                        $('#saveBtnBeasiswa').val('update');
                        $('#modalBeasiswa').modal('show');

                        $('#id_beasiswa').val(data.id);
                        $('#nama').val(data.nama);
                        $('#description').val(data.description);
                        $('#tahap').val(data.tahap);
                        $('#periode').val(data.periode);
                        $('#tanggal_mulai').val(data.tanggal_mulai);
                        $('#tanggal_selesai').val(data.tanggal_selesai);
                        $('#kuota_beasiswa').val(data.kuota_beasiswa);
                    }
                });
            });

            $('body').on('click', '.deleteBeasiswa', function () {

                var id_beasiswa = $(this).data("id");

                Swal.fire({
                    title: 'Question!',
                    text: 'Are You sure want to delete ?',
                    type: 'question',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'YES',
                    cancelButtonText: 'CANCEL',
                    confirmButtonColor: '#F5365C'
                }).then((result) => {
                    if (result.value == true) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('beasiswa-delete') }}",
                            data: {
                                id_beasiswa: id_beasiswa
                            },
                            success: function (data) {
                                table_beasiswa.draw();
                                Swal.fire('Delete!', data.success, 'success');
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection