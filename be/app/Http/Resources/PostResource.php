<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'desc'=>$this->desc,
            'body'=>$this->body,
            'cate_id'=>$this->category_id,
            'cate_name'=>$this->category->name,
            'view'=>$this->view,
            'status'=>$this->active,
            'thumbnail'=> $this->thumbnail ? 'http://127.0.0.1:8000/img/'.$this->thumbnail : 'http://127.0.0.1:8000/img/empty.jpg',
            'created_by'=>$this->createdBy->name,
        ];
    }
}
