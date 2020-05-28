@extends('admin.frame')

@section('title')
    <title>Prijave sadržaja</title>
@endsection

@section('content')
    <div style="min-height: 400px" class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Sadržaj</h4>
                            @if($errors->any())
                                <span style="color: white;">{{$errors->first()}}</span>
                            @endif
                            <br><br>
                        <table>
                            <tr>
                                <th>Prijavio</th>
                                <th></th>
                                <th colspan="5">Naslov</th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($reportsM as $report)
                                <tr>
                                    <td>{{$report->user->name}}</td>
                                    <td></td>
                                    <td colspan="5">
                                        {{$report->movie->title}}
                                    </td>
                                    <td>
                                        <a href="{{url("/admin/content/checkM/{$report->movie->id}")}}"><button type="submit" data-toggle="tooltip" title="Pogledaj" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($reportsE as $report)
                                <tr>
                                    <td>{{$report->user->name}}</td>
                                    <td></td>
                                    <td colspan="5">
                                        {{$report->episode->title}}
                                    </td>
                                    <td>
                                        <a href="{{url("/admin/content/checkE/{$report->episode->id}")}}"><button type="submit" data-toggle="tooltip" title="Pogledaj" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
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