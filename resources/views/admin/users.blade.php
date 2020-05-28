@extends('admin.frame')

@section('title')
    <title>Lista korisnika</title>
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
                                <th>Slika</th>
                                <th>Ime</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td><img src="{{asset("{$user->picture}")}}" alt="Slika" /></td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if (count($user->premium)<=0)
                                            <button class="pd-setting">Registrovani</button>
                                        @else
                                            <button class="ds-setting">Premium</button>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="{{url("/admin/users/remove/{$user->id}")}}" method="post">
                                            @csrf
                                            <button data-toggle="tooltip" title="Ukloni" class="pd-setting-ed" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            <div class="custom-pagination">
								<ul class="pagination">
									{{$users->links()}}
								</ul>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection