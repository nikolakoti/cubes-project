<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $table = 'paintings';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['one_series_id', 'name', 'size', 'year', 'price', 
                           'description'];
    
    
    public function series() {
        
        return $this->belongsTo(\App\Models\Series::class, 'one_series_id');
    }
    
    
    
    public function frontendUrl() {
        
        return route('paint', [
            
            'id' => $this->id,
            'slug' => str_slug($this->name)
        ]);
    }
    
    public function frontendSeriesUrl () {
        
        return route('series', [
            
            'id' => $this->one_series_id,
            'slug' => str_slug($this->series->series_name)
        ]);
    }
}
