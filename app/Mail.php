<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

        class Mail extends Model
    {
        protected $fillable = [
            'title',
            'body' ,
            'user_id',
            'category_id'
        ];
        //
        
            function getPaginateByLimit(int $limit_count = 5)
        {
            return $this::orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
        
            public function category()
        {
            return $this->belongsTo('App\Category');
        }
        
        public function mailsForSchool(){
            
          return $this->where('category_id', 1)->orderBy('created_at', 'DESC')->get();
        }
        
        public function mailsForParent(){
            
          return $this->where('category_id', 2)->orderBy('created_at', 'DESC')->get();
        }
        
        
    }
    //○○.php(Mモデル)はDBから情報を取ってきてそれをControllerに送る役割を持っている