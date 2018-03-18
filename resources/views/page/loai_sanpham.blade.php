@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Loại Sản Phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index.html">Home</a> / <span>Loại Sản Phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loaisanpham as $sp)
						<li><a href="{{route('loaisanpham',$sp->id)}}">{{$sp->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản Phẩm Cùng Loại</h4>
						<div class="beta-products-details">
							<p class="pull-left"></p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($sp_theoloai as $loai)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="Source/image/product/{{$loai->image}}" alt="" height="298px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$loai->name}}</p>
										<p class="single-item-price">
											@if($loai->promotion_price == 0)
												<span class="flash-sale">{{$loai->unit_price}}</span>
											@else
												<span class="flash-del">{{$loai->unit_price}}</span>
												<span class="flash-sale">{{$loai->promotion_price}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$loai->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('themgiohang',$loai->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_theoloai->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản Phẩm Khác Loại</h4>
						<div class="beta-products-details">
							<p class="pull-left">438 styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">

							@foreach($sp_khacloai as $l)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="Source/image/product/{{$l->image}}" alt="" height="298px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$l->name}}</p>
											<p class="single-item-price">
												@if($l->promotion_price == 0)
													<span class="flash-sale">{{$l->unit_price}}</span>
												@else
													<span class="flash-del">{{$l->unit_price}}</span>
													<span class="flash-sale">{{$l->promotion_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sl->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('themgiohang',$sl->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						<div class="row">{{$sp_khacloai->links()}}</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div>

@endsection