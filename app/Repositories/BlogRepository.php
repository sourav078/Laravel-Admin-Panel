<?php
namespace App\Repositories;
use App\Models\Backend\Blog;
use Intervention\Image\Facades\Image;


class BlogRepository implements BlogInterface{

    public function all(){

        return Blog::get();
    }
    
    public function get($id){
        return Blog::find($id);
    }

    public function store($data){
        $imagePath = $data->file('image')->store('blog', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->fit(300, 300);
        $image->save(public_path("storage/{$imagePath}"));
        Blog::create([
            'title' => $data->title,
            'description' => $data->description,
            'image' => $imagePath,
        ]);
    }

    public function update($data, $id)
    {
        $blog = Blog::findOrFail($id);
        if ($data->hasFile('image')) {

            if (file_exists(public_path("storage/{$blog->image}"))) {
                unlink(public_path("storage/{$blog->image}"));
            }
            $imagePath = $data->file('image')->store('blog', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->resize(200, 200)->save();
            $blog->image = $imagePath;
        }
        $blog->title = $data->title;
        $blog->description = $data->description;
        $blog->save();
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        if (file_exists(public_path("storage/{$blog->image}"))) {
            unlink(public_path("storage/{$blog->image}"));
        }
        $blog->delete();
    }
}
