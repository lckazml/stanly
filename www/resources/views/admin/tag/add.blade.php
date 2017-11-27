
@extends('layouts.admin')

@section('title', '标签添加')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>标签添加</span>
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
            <form class="mws-form" action="{{url('/tag')}}" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标签名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="name" value="{{old('name')}}">
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