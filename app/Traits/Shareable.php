<?php

namespace App\Traits;
// use App\Outfit;

trait Shareable {
    public function getShareUrl($type='facebook',$id)
    {
        // $url = $this->{array_get($this->shareOptions, 'url')} ?
        // $this->{array_get($this->shareOptions,'url')} : url()->current();
        $url = 'http://127.0.0.1:8000/outfit/myOutfit_wg/'.$id;
        // dd($url);
        if ($type == 'facebook') {
           
            $query = urldecode(http_build_query([
                'app_id' => env('FACEBOOK_APP_ID'),
                'u' => $url,
                'display' => 'page',
                // 'title' => urlencode($this->{array_get($this->shareOptions, 'columns.title')})
                'title' => 'myOutfit'
            ]));
            redirect('https://www.facebook.com/sharer/sharer?'.$query)->send();                   
        }

        
        // $url = 'http://127.0.0.1:8000/item/30';        
        // if ($type == 'facebook') {
        
        //     $query = urldecode(http_build_query([
        //         'app_id' => env('FACEBOOK_APP_ID'),
        //         'u' => $url,
        //         'display' => 'page',
        //         'title' => 'myOutfit'
        //     ]));
        //     redirect('https://www.facebook.com/sharer?'.$query)->send();                   
        // }



//          $url = $this->{array_get($this->shareOptions, 'url')} ?
//          $this->{array_get($this->shareOptions,'url')} : url()->current();
        
//          if ($type == 'facebook') {
//            $query = urldecode(http_build_query([
//                 'app_id' => env('FACEBOOK_APP_ID'),
//                 'href' => $url,
//                 'display' => 'page',
//                'title' => urlencode($this->{array_get($this->shareOptions, 'columns.title')})                
//            ]));

//          redirect('https://www.facebook.com/dialog/sharer?'.$query)->send();                   
//          }


    }


}