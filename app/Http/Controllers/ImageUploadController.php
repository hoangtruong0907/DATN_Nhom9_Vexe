<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('image');
        $path = $file->store('public/images'); // Store the image in the public/images directory
        $url = url('storage/images/' . basename($path));

        return response()->json(['url' => $url]);
    }

    public function showBanner () {
        $banner_current = Banner::first();
        return view("admin.pages.Banner.index", compact('banner_current'));
    }

    public function updateBanner (Request $request)
    {
        $request->validate([
            'file_input' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        try {
            $banner = Banner::updateOrCreate(
                [
                    'id' => 1,
                    'slide_name' => $request->banner_name
                ],
                ['slide_name' => $request->banner_name]
            );
            $file = $request->file('file_input');
            $code = random_int(1000000, 9999999);
            $new_image = 'banner_' . $code . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/banner/', $new_image);
            $banner->slide_path = $new_image;
            $banner->save();
            return redirect()->back()->with('success', 'Thay đổi của bạn đã được lưu');
            } catch (Exception $e) {
            return redirect()->back()->with('error', "Có lỗi!");
        }
    }
}
