@extends('admin.frame')

@section('title')
    <title>Prijavljeni komentari</title>
@endsection

@section('content')
    <div style="min-height: 400px" class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Korisnici</h4>
                            @if($errors->any())
                                <span style="color: white;">{{$errors->first()}}</span>
                            @endif
                        <table>
                            <tr>
                                <th>Prijavio</th>
                                <th>Prijavljeni korisnik</th>
                                <th colspan="5">Komentar</th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($reportsM as $report)
                                <tr>
                                    <td>{{$report->user->name}}</td>
                                    <td>{{$report->comment->user->name}}</td>
                                    <td colspan="5">
                                        {{$report->comment->text}}
                                    </td>
                                    <td>
                                        <form action="{{url("/admin/comments/skipM/{$report->id}")}}" method="post">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="Zanemari" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <form action="{{url("/admin/comments/removeM/{$report->comment->id}")}}" method="post">
                                            @csrf
                                            <button data-toggle="tooltip" title="Ukloni" class="pd-setting-ed" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($reportsS as $report)
                                <tr>
                                    <td>{{$report->user->name}}</td>
                                    <td>{{$report->subcomment->user->name}}</td>
                                    <td colspan="5">
                                        {{$report->subcomment->text}}
                                    </td>
                                    <td>
                                        <form action="{{url("/admin/comments/skipS/{$report->id}")}}" method="post">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="Zanemari" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <form action="{{url("/admin/comments/removeS/{$report->subcomment->id}")}}" method="post">
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