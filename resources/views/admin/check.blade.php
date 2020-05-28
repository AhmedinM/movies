@extends('admin.frame')

@section('title')
    <title>Pregled prijavljenog sadržaja</title>
@endsection

@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1 style="color: white">Pregled</h1>
                            </div>
                            <br><br><br>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <video width="450px" height="350px" controls playsinline poster="{{asset('icon/favicon-32x32.png')}}">
                                                    <source src="{{asset("{$content->video}")}}" type="video/mp4">
                                                </video>
                                                <br><br>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <form action="{{url('/admin/content/check/skip')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="check" id="check1" value="{{$check}}">
                                                    <input type="hidden" name="object" id="object1" value="{{$content->id}}">
                                                    <button style="width:150px" type="submit" class="btn btn-custon-four btn-warning">
                                                        <i class="fa fa-exclamation-triangle adminpro-warning-danger" aria-hidden="true"></i> Zanemari</button>
                                                </form>
                                                <br><br><br>
                                                <form action="{{url('/admin/content/check/remove')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="check" id="check2" value="{{$check}}">
                                                    <input type="hidden" name="object" id="object2" value="{{$content->id}}">
                                                    <button style="width:150px" type="submit" class="btn btn-custon-four btn-danger">
                                                        <i class="fa fa-times adminpro-danger-error" aria-hidden="true"></i> Ukloni</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection