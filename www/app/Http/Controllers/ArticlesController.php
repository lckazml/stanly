<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('id','desc')
                ->where(function($query)use($request){
                    $keyword=$request->input('keyword','');
                    if (!empty($keyword)){
                        $query->where('title','like','%'.$keyword.'%');
                    }
                })
                ->paginate($request->input('num', 10));

        return view('admin.article.index',['posts'=>$posts,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cates=CatesController::getCates();
        $tags=TagsController::getTags();
        return view('admin.article.add',['cates'=>$cates,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'cate_id'=>'required',
            'img'=>'required',
            'content'=>'required'
        ],[
            'title.required'=>'文章名称不能为空',
            'cate.required'=>'请选择文章分类',
            'img.required'=>'请选择文章主图',
            'content.required'=>'请填写文章内容'
        ]);

        $article=new Post;
        $article->title=$request->input('title');
        $article->cate_id=$request->input('cate_id');
        $article->content=$request->input('content');
        $article->user_id=1;
        if ($request->hasFile('img')){

            $path = $request->img->store('./Uploads/art');
            $filename=trim($path,'./Uploads/art');

            $request->file('img')->move('./Uploads/art',$filename);
            $article->img=trim($path,'.');
        }
        if ($article->save()){
            if ($article->tag()->sync($request->tag_id)){
                return redirect('/article')->with('info','添加成功');
            }
        }else{
            return back()->with('info','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Post::findOrFail($id);

        return view('home.detail',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info=Post::findOrFail($id);
        $cates=CatesController::getCates();
        $tags=TagsController::getTags();
        $alltags=$info->tag->toArray();
        $ids=[];
        foreach ($alltags as $key=>$value){
            $ids[] = $value['id'];
        }


        return view('admin.article.edit',['info'=>$info,'cates'=>$cates,'tags'=>$tags,'ids'=>$ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate_id');
        $post->content = $request->input('content');
        if ($request->hasFile('img')) {
            $path = $request->img->store('./Uploads/art');
            $filename = trim($path, './Uploads/art');
            $request->file('img')->move('./Uploads/art', $filename);
            $post->img = trim($path, '.');
        }
        if ($post->save()) {

            if ($post->tag()->sync($request->tag_id)) {
                return redirect('/article')->with('info', '更新成功');
            } else {
                return back()->with('info', '添加失败');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $img=$post->img;
        @unlink('.'.$post->img);//删除图片

        if ($post->delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    public function lists()
    {
        //读取文章的列表
        $articles = Post::orderBy('id','desc')->paginate(10);

        $tags=TagsController::getTags();
        $ids=[];


        foreach ($articles as $key=>$value){
            $info=Post::findOrFail($value['id']);
            $alltags=$info->tag->toArray();
            foreach ($alltags as $k=>$v){
                $ids[$value['id']][] = $v['id'];
            }
        }

        return view('home.lists', ['articles'=>$articles,'tags'=>$tags,'ids'=>$ids] );
    }

}
