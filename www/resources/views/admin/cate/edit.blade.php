@extends('layouts.admin')

@section('title', '分类添加')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>分类添加</span>
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
        <form class="mws-form" action="{{url('/cate/'.$info->id)}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="name" value="{{$info['name']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">父级分类</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid">
                            <option value="0">请选择</option>
                            @foreach($cates as $k=>$v)
                            <option value="{{$v->id}}"  @if($v->id == $info['pid']) selected @endif>{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <input type="submit" value="修改" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>      
</div>

@endsection