@extends('admin.frame')

@section('title')
    <title>Lista administratora</title>
@endsection

@section('content')
    <div style="min-height: 400px" class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Lista</h4>
                            @if($errors->any())
                                <span style="color: white;">{{$errors->first()}}</span>
                            @endif
                        <table>
                            <tr>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->email}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="{{url("/admin/admins/remove/{$admin->id}")}}" method="post">
                                            @csrf
                                            <button data-toggle="tooltip" title="Ukloni" class="pd-setting-ed" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection