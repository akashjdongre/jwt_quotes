<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'meta_title',
        'meta_author',
        'meta_desc',
        'meta_keywords',
        'picture_meta_title',
        'picture_meta_desc',
        'url',
        'description',
        'status',
        'custom_id',
        'createdBy',
        'updatedBy',
        'location',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
