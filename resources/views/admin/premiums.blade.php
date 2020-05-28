@extends('admin.frame')

@section('title')
    <title>Lista premium korisnika</title>
@endsection

@section('content')
    <div style="min-height: 400px" class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Premium</h4>
                        @if($errors->any())
                            <span style="color: white;">{{$errors->first()}}</span>
                        @endif
                        <table>
                            <tr>
                                <th>Slika</th>
                                <th>Ime</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($premiums as $premium)
                                <tr>
                                    <td><img src="{{asset("{$premium->user->picture}")}}" alt="Slika" /></td>
                                    <td>{{$premium->user->name}}</td>
                                    <td>
                                        <button class="ds-setting">Premium</button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="{{url("/admin/premiums/remove/{$premium->id}")}}" method="post">
                                            @csrf
                                            <button data-toggle="tooltip" title="Ukloni premium" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <div class="custom-pagination">
								<ul class="pagination">
									{{$premiums->links()}}
								</ul>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection