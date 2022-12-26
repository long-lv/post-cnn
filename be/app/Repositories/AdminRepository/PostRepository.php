<?php

namespace App\Repositories\AdminRepository;

use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Http\Resources\PostResource;
class PostRepository
{
    protected $post;
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function getALlPostRepository(){
        $post =  $this->post->paginate(15);
        return PostResource::collection($post);
    }
    public function getPostById($id){
        $post = $this->post->find($id);
        return new PostResource($post);
    }
    public function savePostRepository(PostRequest $request){
        $request->validated();
        $post = $this->post;
        $post->title = $request['title'];
        $post->desc = $request['desc'];
        $post->body = $request['body'];
        $post->category_id = $request['category_id'];
        $post->view = 0;
        $post->created_by = 10;
        $post->active = $request['active'];
        if($request->file('thumbnail')){
            $generatedImg = 'img'.time().'.'.$request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('img'),$generatedImg);
            $post->thumbnail = $generatedImg;
        }
        $post->save();
        return $post;
    }
    public function updateProductRepository(PostRequest $request,$id){
        $request->validated();
        $post = $this->post->find($id);
        $post->title = $request['title'];
        $post->desc = $request['desc'];
        $post->body = $request['body'];
        $post->category_id = $request['category_id'];
        $post->view = 0;
        $post->created_by = 10;
        $post->active = $request['active'];
        if($request->file('thumbnail')){
            $generatedImg = 'img'.time().'.'.$request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('img'),$generatedImg);
            $post->thumbnail = $generatedImg;
        }
        $post->update();
        return $post;
    }
    public function destroyPostRepository($id){
        $post = $this->post->find($id);
        if($post) $post->delete();
        return $post;
    }
}
