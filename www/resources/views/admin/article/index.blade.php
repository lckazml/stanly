@extends('layouts.admin')

@section('content')
<style type="text/css">
	#pages li{
	    float: left;
	    height: 20px;
	    padding: 0 10px;
	    display: block;
	    font-size: 12px;
	    line-height: 20px;
	    text-align: center;
	    cursor: pointer;
	    outline: none;
	    background-color: #444444;
	    text-decoration: none;
	    border-right: 1px solid #232323;
	    border-left: 1px solid #666666;
	    border-right: 1px solid rgba(0, 0, 0, 0.5);
	    border-left: 1px solid rgba(255, 255, 255, 0.15);
	    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
	    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
	    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
	}

	#pages li a{
		color:white;
	}
	#pages .active{
		background-color: #88a9eb;
		color: #323232;
	}

	#pages .disabled{
		color: #666666;
		cursor: default;
	}
	#pages{
		padding:0px;
		margin: 0px;
	}
	#pages ul{
		padding:0px;
		margin:0px;
	}
</style>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>
			<i class="icon-table">
			</i>
			文章列表
		</span>
	</div>
	<div class="mws-panel-body no-padding">
		<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
			
			<form action="/article">
				<div id="DataTables_Table_1_length" class="dataTables_length">
					<label>
						显示
						<select size="1" name="num" aria-controls="DataTables_Table_1">
							<option value="10" @if($request->input('num') == 10)  selected  @endif>
								10
							</option>
							<option value="25" @if($request->input('num') == 25)  selected  @endif>
								25
							</option>
							<option value="50" @if($request->input('num') == 50)  selected  @endif>
								50
							</option>
							<option value="100" @if($request->input('num') == 100)  selected  @endif>
								100
							</option>
						</select>
						条
					</label>
				</div>
				<div class="dataTables_filter" id="DataTables_Table_1_filter">
					<label>
						关键字:
						<input type="text" value="{{$request->input('keyword')}}" name="keyword" aria-controls="DataTables_Table_1">
						<button class="btn btn-info">搜索</button>
					</label>
				</div>
			</form>
			<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
			aria-describedby="DataTables_Table_1_info">
				<thead>
					<tr role="row">
						<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
						style="width: 160px;">
							ID
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
						style="width: 205px;">
							文章标题
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
						style="width: 193px;">
							分类名称
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
						style="width: 135px;">
							头图
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
						style="width: 102px;">
							操作
						</th>
					</tr>
				</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($posts as $k=>$v)
					<tr class="@if($k % 2 == 0)  even @else odd @endif ">
						<td class=" sorting_1">
							{{$v->id}}
						</td>
						<td class=" ">
							{{$v->title}}
						</td>
						<td class=" ">
							{{$v->cate->name or '无分类'}}
						</td>
						<td class=" ">
							<img src="{{$v->img}}" width="50" alt="">
						</td>
						
						<td class=" ">
							<a href="/article/{{$v->id}}/edit" class="btn"><i class="icon-pencil"></i></a>
							<form action="/article/{{$v->id}}" style="display:inline" method="post">
								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
								<button class="btn btn-warning"><i class="icon-remove-sign"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

				<div id="pages">
					{!! $posts->appends($request->only(['num','keyword']))->render() !!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection