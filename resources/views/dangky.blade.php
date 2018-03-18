@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
            <a href="{{route('trang-chu')}}">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
    
        
        <form  method="post" class="beta-form-checkout">
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
                        <label for="email">Email*</label>
                        <input type="email" id="email"  name="email" >
                        <div class="text-danger">
                                @foreach($errors->get('email') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                        </div>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ Tên*</label>
                        <input type="text" id="your_last_name" name="name" >
                        @if($errors->has('name'))
                            <div class="text-danger">
                                @foreach($errors->get('name') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa Chỉ*</label>
                        <input type="text" id="adress"  name="address" >
                        @if($errors->has('address'))
                            <div class="text-danger">
                                @foreach($errors->get('address') as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                         @endif
                    </div>


                    <div class="form-block">
                        <label for="phone">Số Điện Thoại*</label>
                        <input type="text" id="phone" name="phone" >
                        @if($errors->has('phone'))
                        <div class="text-danger">
                            @foreach($errors->get('phone') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                         @endif
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật Khẩu*</label>
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
                        <label for="phone">Nhập Lại Mật Khẩu*</label>
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
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                </div>
              <div class="col-sm-3"></div>
            </div>
        </form>
    </div> 
</div>
@endsection 