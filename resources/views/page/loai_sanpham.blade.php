@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index.html">Home</a> / <span>Sản phẩm</span>
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
						<li><a href="#">Typography</a></li>
						<li><a href="#">Buttons</a></li>
						<li><a href="#">Dividers</a></li>
						<li><a href="#">Columns</a></li>
						<li><a href="#">Icon box</a></li>
						<li><a href="#">Notifications</a></li>
						<li><a href="#">Progress bars and Skill meter</a></li>
						<li><a href="#">Tabs</a></li>
						<li><a href="#">Testimonial</a></li>
						<li><a href="#">Video</a></li>
						<li><a href="#">Social icons</a></li>
						<li><a href="#">Carousel sliders</a></li>
						<li><a href="#">Custom List</a></li>
						<li><a href="#">Image frames &amp; gallery</a></li>
						<li><a href="#">Google Maps</a></li>
						<li><a href="#">Accordion and Toggles</a></li>
						<li class="is-active"><a href="#">Custom callout box</a></li>
						<li><a href="#">Page section</a></li>
						<li><a href="#">Mini callout box</a></li>
						<li><a href="#">Content box</a></li>
						<li><a href="#">Computer sliders</a></li>
						<li><a href="#">Pricing &amp; Data tables</a></li>
						<li><a href="#">Process Builders</a></li>
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
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
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
											<a href="product.html"><img src="Source/image/product/{{$l->image}}" alt=""></a>
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
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
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