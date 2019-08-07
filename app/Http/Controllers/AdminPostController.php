<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Blog;
use App\Hakkimizda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminPostController extends AdminController
{
    public function post_ayarlar(Request $request)
    {
        // need validation

        if (isset($request->logo)) {

            $validator = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validator->fails()) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Yüklediğiniz dosya uzantısı şunlardan biri olmalıdır; jpg,jpeg,png,gif']);
            }

            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_isim = 'logo.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(222, 108)->save('uploads/img/' . $logo_isim);
        }

        //Insert için
        //Ayarlar::create($request->all());

        //Update için
        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $logo_isim]);
            } else {
                $eski_logo = $request->eski_logo;
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $eski_logo]);
            }
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Başarısız', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }

    public function post_hakkimizda(Request $request)
    {
        try {
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Başarısız', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }

    public function post_blog_ekle(Request $request)
    {
        $tarih=str_slug(Carbon::now());
        $slug=str_slug($request->baslik).'-'.$tarih;
        $resimler=$request->file('resimler');

        if(!empty($resimler)){
            $i=0;
            foreach ($resimler as $resim){
                $resim_uzanti = $resim->getClientOriginalExtension();
                $resim_isim = $i.'.'.$resim_uzanti;
                Storage::disk('uploads')->makeDirectory('img/blog/'.$slug);
                Storage::disk('uploads')->put('img/blog/'.$slug.'/'.$resim_isim, file_get_contents($resim));
                $i++;
            }
        }

        try {
            $request->merge(['slug'=>$slug]);
            Blog::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Başarısız', 'icerik' => $e->getMessage()]);
        }
    }

    public function post_blog_sil(Request $request)
    {
        try {
            Blog::where('slug', $request->slug)->delete();
            Storage::disk('uploads')->deleteDirectory('img/blog/'.$request->slug);
            return response(['durum'=> 'success', 'baslik'=>'Başarılı', 'icerik' => 'Silme işlemi tamamlandı.']);
        }
        catch(\Exception $e){
            return response(['durum'=> 'error', 'baslik'=>'Hatalı', 'icerik' => 'Silme işlemi gerçekleştirilemedi.', 'hata' => $e]);
        }
    }
}
