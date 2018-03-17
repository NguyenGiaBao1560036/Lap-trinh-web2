@extends('master')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
            {{csrf_field()}} 
				<div class="row">
					<div class="col-sm-3">
                        @if(Session::has('flag'))
                            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                        @endif
                    </div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
                            <input type="email" id="email" name="email">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    @foreach($errors->get('email') as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                             @endif
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
                            <input type="password" id="password" name="password">
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    @foreach($errors->get('password') as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                             @endif
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection