<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    //use SoftDeletes;

    public $table = 'quotes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'text',
        'is_approved',
        'status',
        'custom_id',
        'author',
        'alt',
        'video',
        'video_title',
        'video_desc',
        'meta_title',
        'meta_author',
        'meta_desc',
        'meta_keywords',
        'picture_meta_title',
        'picture_meta_desc',
        'url',
        'createdBy',
        'updatedBy',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function setAuthorAttribute($value){
        if($value!=''){
            $this->attributes['author'] = $value;
        }else{
            $this->attributes['author'] = 1001;  // set unknown author
        }
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->where('status',1)->where('visibility',1);
    }

    public function backendTags()
    {
        return $this->belongsToMany(Tag::class)->where('status',1);
    }

    public function socials(){
        return $this->hasOne('App\Social', 'quote_id');
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
    public function getApprovedStatusAttribute(){

        if($this->is_approved == 1){
            return 'Approved';
        }else{
            return 'Disapproved';
        }
    }


    // get author name
    public function getAuthorNameAttribute(){

        $author= Author::find($this->author);
        return $author->name;
    }

    // get author name
    public function getAuthorUrlAttribute(){

        $author= Author::find($this->author);
        return $author->url;
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
