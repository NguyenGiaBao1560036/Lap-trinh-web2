@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
    
     

        <form  action = "chinh-sua/{{$nguoidung->id}}" method="post" class="beta-form-checkout">
        {{csrf_field()}}  
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}} -->
            <div class="row">
                <div class="col-sm-3">
                @if(Session::has('thanhcong'))
                    <div class="text-danger">{{Session::get('thanhcong')}}</div>
                @endif
                </div>
               
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" value="{{$nguoidung->email}}" name="email" >
                        <div class="text-danger">
                            @foreach($errors->get('email') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                        
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" value="{{$nguoidung->full_name}}" name="name" >
                        @if($errors->has('name'))
                            <div class="text-danger">
                                @foreach($errors->get('name') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" value="{{$nguoidung->address}}" name="address" >
                        @if($errors->has('address'))
                            <div class="text-danger">
                                @foreach($errors->get('address') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" value="{{$nguoidung->phone}}" name="phone" >
                        @if($errors->has('phone'))
                            <div class="text-danger">
                                @foreach($errors->get('phone') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" id="password" name="password" >
                        @if($errors->has('password'))
                            <div class="text-danger">
                                @foreach($errors->get('password') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="password" id="password" name="confirm_password" >
                        @if($errors->has('confirm_password'))
                            <div class="text-danger">
                                @foreach($errors->get('confirm_password') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> 
</div>
@endsection