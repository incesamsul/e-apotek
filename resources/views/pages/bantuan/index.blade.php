@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header">
              <h4>Bantuan</h4>
            </div>
            <div class="card-body" >
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <div class="media-body">
                      <div class="float-right"><div class="font-weight-600 text-muted text-small">--</div></div>
                      <div class="media-title">Jenis Profile</div>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body">
                      <div class="float-right"><div class="font-weight-600 text-muted text-small">03-09-2090</div></div>
                      <div class="media-title">Tanggal Dibuat</div>
                  </div>
                </li>
              </ul>
          </div>
          </div>
        </div>
      </div>



  </section>
@endsection
@section('script')
<script>
    $('#liBantuan').addClass('active');
</script>
@endsection
