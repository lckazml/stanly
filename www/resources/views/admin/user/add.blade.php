@extends('layouts.admin')

@section('title', '用户添加')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>用户添加</span>
    </div>
    @if (count($errors) > 0)
	<div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="{{url('/user/insert')}}" method="post" enctype="multipart/form-data">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{old('username')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="email" value="{{old('email')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="password">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="repassword">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">头像</label>
    				<div class="mws-form-item">
    					<input type="file" class="small" name="profile">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">个人介绍</label>
    				<div class="mws-form-item">
    					<textarea rows="" cols="" class="small" name="intro"></textarea>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}
    			<input type="submit" value="添加" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>
</div>

@endsection