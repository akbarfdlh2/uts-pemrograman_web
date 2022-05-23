@extends('layouts.app')

@section('title', 'Dashboard - Universitas Esa Unggul')

@section('breadcrumb', 'Dashboard')

@section('section-subheader')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Universitas Esa Unggul</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item">
                  <a href="#">
                    <i class="fas fa-home"></i>
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Aplication</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Dashboards</li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Beasiswa</h5>
                    <span class="h2 font-weight-bold mb-0">500</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-archive-2"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-success mr-2">
                    <i class="fa fa-arrow-up"></i> 
                    30% 
                  </span>
                  <span class="text-nowrap">Since last month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
    
    
@section('section-content')

@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection