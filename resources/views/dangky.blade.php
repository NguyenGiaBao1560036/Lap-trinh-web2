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
    
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form  method="post" class="beta-form-checkout">
        {{csrf_field()}}  
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}} -->
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email"  name="email" >
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" name="name" >
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" value="Street Address" name="adress" >
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" name="phone" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" id="password" name="password" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="password" id="password" name="confirm_password" >
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