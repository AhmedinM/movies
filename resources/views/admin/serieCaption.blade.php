@extends('admin.frame')

@section('title')
    <title>Unos prevoda za epizodu</title>
@endsection

@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1 style="color: white">Unos prevoda za epizodu</h1>
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
                                            <form action="{{url('admin/add-serieCaption/form')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label for="title" style="color: white" class="login2 pull-right pull-right-pro">Naslov:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input required name="title" id="title" style="color: white" type="text" class="form-control" placeholder="Naslov prevoda..."/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label for="short" style="color: white" class="login2 pull-right pull-right-pro">Skraćeno:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input required name="short" id="short" style="color: white" type="text" class="form-control" placeholder="Skraćenica naslova..."/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                            <label style="color: white" class="login2 pull-right pull-right-pro">Fajl:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                <div class="input append-small-btn">
                                                                    <div class="file-button">
                                                                        Odaberi
                                                                        <input required name="file" id="file" type="file" onchange="document.getElementById('append-small-btn2').value = this.value;">
                                                                    </div>
                                                                    <input style="color: black" type="text" id="append-small-btn2" placeholder="Odaberi fajl...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label for="episode" style="color: white" class="login2 pull-right pull-right-pro">Epizoda:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select required style="color: white" class="form-control custom-select-value" name="episode" id="episode">
                                                                    @foreach ($episodes as $e)
                                                                        <option value="{{$e->id}}">{{$e->serie->title}}: {{$e->title}}</option>
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
@endsection