<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //use SoftDeletes;

    public $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'meta_title',
        'meta_author',
        'meta_desc',
        'meta_keywords',
        'picture_meta_title',
        'picture_meta_desc',
        'url',
        'status',
        'visibility',
        'custom_id',
        'createdBy',
        'updatedBy',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Always capitalize the first name when we save it to the database
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = strtoupper($value);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
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


    // current status
    public function getVisiblityAttribute(){

        if($this->visibility == 1){
            return 'Show';
        }else{
            return 'Hide';
        }

    }


    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
