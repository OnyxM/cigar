<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'description',
        'price',
        'image',
    ];

    protected $appends = ['orther_images_path'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function setImageAttribute($image){
        $other_images = request()->file('other_images');

        $ext = explode(".", $image->getClientOriginalName());

        // Upload des autres images du produit
        if (is_array($other_images)) {
            $i=0;
            foreach ($other_images as $o_img) {
                if(empty($image)){
                    continue;
                }

                $ext_tmp = explode(".", $o_img->getClientOriginalName());
                $imageName = Str::uuid().".".end($ext_tmp);
                $o_img->move("uploads/products/", $imageName);

//                $imageName = time() . $i . '.' . $o_img->getClientOriginalExtension();
//                $image->move('uploads/images', $imageName);

                Photo::create(['product_id' => $this->last_id, 'link' => $imageName]);
                $i++;
            }
        }

        $image_name = Str::uuid().".".end($ext);
        $image->move("uploads/products/", $image_name);

        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute()
    {
        return asset('uploads/products/'.$this->attributes['image']);
    }

    // get last article id
    public function getLastIdAttribute()
    {
        $id=DB::select("SHOW TABLE STATUS LIKE 'products'");
        $next_id=$id[0]->Auto_increment;
        return $next_id;
    }
}
