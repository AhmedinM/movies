@extends('admin.frame')

@section('title')
    <title>Unos sezone</title>
@endsection

@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1 style="color: white">Unos sezone</h1>
                            </div>
                        </div>
                        @if($errors->any())
                            <span style="color: white;">{{$errors->first()}}</span>
                        @endif
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{url('admin/add-season/form')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label for="number" style="color: white" class="login2 pull-right pull-right-pro">Broj:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input required name="number" id="number" style="color: white" type="number" class="form-control" placeholder="Redni broj sezone..."/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label for="serie" style="color: white" class="login2 pull-right pull-right-pro">Serija:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select required style="color: white" class="form-control custom-select-value" name="serie" id="serie">
                                                                    @foreach ($series as $s)
                                                                        <option value="{{$s->id}}">{{$s->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    {{--<button class="btn btn-white" type="submit">Cancel</button>--}}
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Sačuvaj</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    <br><br><br><br><br>
@endsection