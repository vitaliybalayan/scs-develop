<?php

namespace App\Http\Controllers\Admin;

use Image;
use Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function upload(Request $request)
    {
    	// dd($request->file('file'));
    	$image = $request->file('file');

    	$filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/archive/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		return '/storage/uploads/archive/' . $filename;
    }

    public function remove(Request $request)
    {

        $string = $request->get('src');
        $find = '/archive';

        $row = strpos($string, $find);
        $row = substr($string, $row);

        Storage::disk('public')->delete('uploads/' . $row);

    	dd($row);
    }

    public function get()
    {
        $folder = 'blocks';
        $view = 'qwerty';
        // $view = view('blocks.qwerty');

        // dd(View::getPaths());
        // dd($view->render());


        $code = file_get_contents(resource_path('views/'. $folder .'/'. $view .'.blade.php'));
        // dd($code);
        echo $code;

        $content = '312';

        $new_code = file_put_contents(resource_path('views/'. $folder .'/'. $view .'.blade.php'), $content);

    }
}
