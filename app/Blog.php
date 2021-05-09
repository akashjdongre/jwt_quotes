<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

    public $table = 'blogs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_desc',
        'meta_keywords',
        'url',
        'title',
        'alt',
        'text',
        'category',
        'likes',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'whatsapp',
        'pinterest',
        'total_share',
        'status',
        'custom_id',
        'createdBy',
        'updatedBy',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // get created date and time
    public function getCreatedDateAttribute(){

        $date=date_create($this->created_at);
        return date_format($date,"M d, H:i A");
    }

    public function getCreatedByAdminAttribute(){
        $admin = Admin::find($this->createdBy);

        return $admin->name;
    }

    public function getUpdatedByAdminAttribute(){

        if($this->updatedBy != ''){
            $admin = Admin::find($this->updatedBy);

            return $admin->name;
        }

    }

    public function getCategoryNameAttribute(){

        if($this->category != ''){
            $category = Category::find($this->category);

            return $category->name;
        }

    }

    // current status
    public function getCurrentStatusAttribute(){

        if($this->status == 1){
            return 'Active';
        }else{
            return 'Deactive';
        }
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'custom_id';
    }
}
