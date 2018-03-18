@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">{{$sanpham->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="Source/image/product/{{$sanpham->image}}" alt="" height="300px">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
							<p class="single-item-price">
								@if($sanpham->promotion_price == 0)
									<span class="flash-sale">{{$sanpham->unit_price}}</span>
								@else
									<span class="flash-del">{{$sanpham->unit_price}}</span>
									<span class="flash-sale">{{$sanpham->promotion_price}}</span>
								@endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<p>Số Lượng:</p>
						<div class="single-item-options">
							<select class="wc-select" name="số lượng">
								<option>Size</option>
								<option value="XS">1</option>
								<option value="S">2</option>
								<option value="M">3</option>
								<option value="L">4</option>
								<option value="XL">5</option>
							</select>
						
							<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô Tả</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{{$sanpham->description}}</p>
						
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản Phẩm Cùng Loại</h4>

					<div class="row">
						@foreach($sanpham_tt as $sp)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sp->id)}}"><img src="Source/image/product/{{$sp->image}}" alt="" height="298px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp->name}}</p>
										<p class="single-item-price">
											@if($sp->promotion_price == 0)
												<span class="flash-sale">{{$sp->unit_price}}</span>
											@else
												<span class="flash-del">{{$sp->unit_price}}</span>
												<span class="flash-sale">{{$sp->promotion_price}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('themgiohang',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">{{$sanpham_tt->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					
					<h3 class="widget-title">Sản Phẩm Mới</h3>
						@foreach($new_product as $sp)
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$sp->id)}}"><img src="Source/image/product/{{$sp->image}}" alt=""></a>
									<div class="media-body">
										{{$sp->name}}
										<span class="beta-sales-price">
										@if($sp->promotion_price == 0)
												<span class="flash-sale">{{$sp->unit_price}}</span>
										@else
												<span class="flash-sale">{{$sp->promotion_price}}</span>
										@endif
										</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
				</div>
				 <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản Phẩm Khuyến Mãi</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
						@foreach($sale as $l)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('chitietsanpham',$l->id)}}"><img src="Source/image/product/{{$l->image}}" alt=""></a>
								<div class="media-body">
									{{$l->name}}
									<span class="beta-sales-price">
										@if($l->promotion_price == 0)
													<span class="flash-sale">{{$l->unit_price}}</span>
										@else
												<span class="flash-sale">{{$l->promotion_price}}</span>
										@endif
									</span>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> 
@endsection