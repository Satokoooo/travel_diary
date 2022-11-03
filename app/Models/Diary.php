<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Diary extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'text' => 'required',
    );
    
    public $sortable =
    [
        'id',
        'departure_date',
        'updated_at',
        'title',
    ];
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
