@extends('admin.frame')

@section('title')
    <title>Admin Panel</title>
@endsection

@section('content')
    <div class="income-order-visit-user-area">
        <div class="container-fluid">
            <div style="color: white;"><h4>Statistika</h4></div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['users']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Broj korisnika</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['premiums']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Broj premium naloga</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['views']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Ukupan broj pregleda</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['mostViews']->title}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Najviše pregleda:</p>
                                <span class="income-percentange bg-green"><span class="counter">{{$data['mostViews']->views}}</span></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['bestRate']->title}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Najbolje ocijenjeno:</p>
                                <span class="income-percentange bg-green"><span class="counter">{{$data['bestRate']->rate}}</span></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['comments']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Ukupno komentara</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['reviews']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Ukupno recenzija </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['userComm']->name}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Najviše komentara:</p>
                                <span class="income-percentange bg-green"><span class="counter">{{$data['userComm']->comm}}</span></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['userRev']->name}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Najviše recenzija:</p>
                                <span class="income-percentange bg-green"><span class="counter">{{$data['userRev']->rev}}</span></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['reports']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Broj prijava</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['rate']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Prosječna ocjena</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30">
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-nalika-rate">
                                    <h3><span class="counter">{{$data['admins']}}</span></h3>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Broj administratora</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection