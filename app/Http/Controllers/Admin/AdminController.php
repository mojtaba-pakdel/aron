<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected function uploadImages($file,$folder)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$folder}/{$year}/";
        $fileName = $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath),$fileName);
        $sizes = ["300","600","900"];
        $url['images'] = $this->resize($file->getRealPath(),$sizes,$imagePath,$fileName);
        $url['thumb'] = $url['images'][$sizes[0]];
        return $url;

    }

    protected function uploadVideo($file,$folder)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/video/{$folder}/{$year}/";
        $fileName = $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath),$fileName);
        return $imagePath.$fileName;

    }

    private function resize($path , $sizes , $imagePath , $fileName){
        $images['original'] = $imagePath . $fileName;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $fileName;

            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }

    protected function setCourseTime($episode)
    {
        $course = $episode->course;
        $course->time = $this->getCourseTime($course->episode->pluck('time'));
        $course->save();
    }

    protected function getCourseTime($time)
    {
        $timestampe = Carbon::parse('00:00:00');
        foreach($time as $t)
        {
            $time = strlen($t) == 5 ? strtotime('00:' . $t) : strtotime($time);
            $timestampe->addSecond($time);
        }
        return $timestampe->format('H:i:s');

    }
}
