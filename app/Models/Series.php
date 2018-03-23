<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model {
    protected $table = 'series';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['series_name', 'description', 'series_photo_filename'];
    
    
    public function frontendUrl() {
        
        return route('series', [
            
            'id' => $this->id,
            'slug' => str_slug($this->series_name)
        ]);
    }
}


