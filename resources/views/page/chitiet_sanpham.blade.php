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
						<img src="Source/image/product/{{$sanpham->image}}" alt="">
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
						
							<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
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
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="product.html"><img src="assets/dest/images/products/4.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span>$34.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="product.html"><img src="assets/dest/images/products/5.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span>$34.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

								<div class="single-item-header">
									<a href="#"><img src="assets/dest/images/products/6.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span class="flash-del">$34.55</span>
										<span class="flash-sale">$33.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> 
@endsection