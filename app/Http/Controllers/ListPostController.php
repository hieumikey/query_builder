<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ListPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
   
    public function insertform(){
        return view('create_posts');
    }
    public function insert(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        $data=array('id'=>$id,"title"=>$title,"content"=>$content);
        DB::table('posts')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert_form">Click Here</a> to go back.';
    }
    public function index(){
        $posts = DB::select('select * from posts');
        echo '<a href = "/insert_form">Insert POST</a>.' . "<br>";
        return view('lists_posts',['posts'=>$posts]);
    }
    public function destroy($id) {
        DB::delete('delete from posts where id = ?',[$id]);
        echo "Record deleted successfully.";
        echo 'Click Here to go back.';
    }
    public function comment($id){
        $data = DB::table('posts')->join('comments', 'posts.id', '=', 'comments.post_id')
                ->select('title', 'content', 'content_comment', 'posts.id')->get();
        return view('detail_posts',['data'=>$data]);
    }
    public function show($id) {
        $posts = DB::select('select * from posts where id = ?',[$id]);
        return view('update',['posts'=>$posts]);
    }
    public function update(Request $request, $id){
        $title = $request->input('title');
        $content = $request->input('content');
        $val = $request->session()->put('key', 'Record updated successfully."');
        DB::update('update posts set title = ?, content = ? where id = ?',[$title, $content, $id]);
        echo $val;
        echo 'Click Here to go back.';
    }
    public function login(Request $request){
        return view('list_posts');
    }
}
