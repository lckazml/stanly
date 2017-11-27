@extends('layouts.admin')

@section('title', '文章修改')

@section('content')
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>文章修改</span>
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
    	<form class="mws-form" action="{{url('/article/'.$info->id)}}" method="post" enctype="multipart/form-data">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="title" value="{{$info->title}}">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">分类</label>
                    <div class="mws-form-item">
                        <select class="small" name="cate_id">
                            <option value="0">请选择</option>
                            @foreach($cates as $k=>$v)
                            <option value="{{$v->id}}" @if($v->id == $info->cate_id)  selected @endif>{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">文章主图</label>
    				<div class="mws-form-item">
                        <img src="{{$info->img}}" alt="">
    					<input type="file" class="small" name="img" value="">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章详情</label>
    				<div class="mws-form-item">
    					<textarea id="editor" rows="" cols="" style="width:800px;height:300px;"  name="content">{!!$info->content!!}</textarea>
    				</div>
    			</div>
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">标签</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($tags as $k=>$v)
                            <li><label><input @if(in_array($v->id, $ids)) checked @endif type="checkbox" name="tag_id[]" value="{{$v->id}}"> {{$v->name}}</label></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
    		</div>
            <script type="text/javascript">
                var ue = UE.getEditor('editor',{
                    toolbars: [
                        ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload']
                    ]
                });
            </script>
    		<div class="mws-button-row">
    			{{csrf_field()}}
                <input type="hidden" name="id" value="{{$info->id}}">
                <input type="hidden" name="_method" value="PUT">
    			<input type="submit" value="修改" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>

@endsection