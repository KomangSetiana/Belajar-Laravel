<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
    use HasFactory;
    use Sluggable;
    
    //protected $fillable = ['tittle','excerpt','body'];
    protected $guarded = ['id'];
    protected $with =["author","category"];

    public function ScopeFillter ( $query,array $Fillter) {
       
        $query->when($Fillter["search"] ?? false, function($query, $search){

            return $query->where("tittle","like","%" . $search . "%")
            ->orwhere("body","like", "%" . $search . "%" );
        });
        $query->when($Fillter["category"] ?? false, function($query,$category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug',$category);
            });

        });
        $query->when($Fillter["author"] ?? false, function($query,$author){
            return $query->whereHas("author",function($query) use ($author){
                $query->where('username',$author);
            });
        });
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function author() 
    {
        return $this->BelongsTo(User::class,'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }
}
