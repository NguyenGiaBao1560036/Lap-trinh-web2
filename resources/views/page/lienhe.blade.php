@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Contacts</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>Contacts</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="beta-map">
	
	<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.791941897627!2d106.69936631418233!3d10.750512262612656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f74991c6d4d%3A0xff598079053c11fb!2zODc1IFRy4bqnbiBYdcOibiBTb-G6oW4sIFTDom4gSMawbmcsIFF14bqtbiA3LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1521102153539" ></iframe></div>
</div>
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.791941897627!2d106.69936631418233!3d10.750512262612656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f74991c6d4d%3A0xff598079053c11fb!2zODc1IFRy4bqnbiBYdcOibiBTb-G6oW4sIFTDom4gSMawbmcsIFF14bqtbiA3LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1521102153539" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
<div class="container">
	<div id="content" class="space-top-none">
		
		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Mẫu Liên hệ</h2>
				<div class="space20">&nbsp;</div>
				<p>Để liên hệ cho chúng tôi mời bạn nhập đầy đủ thông tin theo yêu cầu</p>
				<div class="space20">&nbsp;</div>
				@if(Session::has('message'))
					<div class="alert alert-danger">
						{{Session::get('message')}}
					</div>
                @endif
				<form method="post" class="contact-form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
					<div class="form-block">
						<input name="name" type="text" placeholder="Nhập họ tên" >
					</div>
					@if($errors->has('name'))
                        <div class="text-danger">
                            @foreach($errors->get('name') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
					<div class="form-block">
						<input name="email" type="email" placeholder="Nhập email">
					</div>
					@if($errors->has('email'))
                        <div class="text-danger">
                            @foreach($errors->get('email') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                     @endif
					<div class="form-block">
						<input name="chude" type="text" placeholder="Nhập chủ đề">
					</div>
					@if($errors->has('chude'))
                        <div class="text-danger">
                            @foreach($errors->get('chude') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
					<div class="form-block">
						<textarea name="noidung" placeholder="Nhập nội dung"></textarea>
					</div>
					@if($errors->has('noidung'))
                        <div class="text-danger">
                            @foreach($errors->get('noidung') as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
					<div class="form-block">
						<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<h2>Contact Information</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Address</h6>
				<p>
					Suite 127 / 267 – 277 Brussel St,<br>
					62 Croydon, NYC <br>
					Newyork
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Business Enquiries</h6>
				<p>
					Doloremque laudantium, totam rem aperiam, <br>
					inventore veritatio beatae. <br>
					<a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Employment</h6>
				<p>
					We’re always looking for talented persons to <br>
					join our team. <br>
					<a href="hr@betadesign.com">hr@betadesign.com</a>
				</p>
			</div>
		</div>
	</div> <!-- #content -->
</div> 
@endsection