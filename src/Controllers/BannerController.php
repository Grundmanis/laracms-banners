<?php

namespace Grundmanis\Laracms\Modules\Banners\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Banners\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * @var Banner
     */
    private $banner;

    /**
     * BuyerController constructor.
     * @param Banner $banner
     */
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('laracms.banner::index', [
            'banners' => $this->banner->paginate(10)
        ]);
    }

    public function create()
    {
        return view('laracms.banner::form');
    }

    public function store(Request $request)
    {
        $banner = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('banners'), $banner);

        $this->banner->create([
           'image' => 'banners/' . $banner,
           'link' => $request->link,
           'placement' => $request->placement
        ]);

        return redirect()
            ->route('laracms.banners')
            ->with('status', 'Banner created!');
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('laracms.banner::form', compact('banner'));
    }

    /**
     * @param Request $request
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Banner $banner)
    {
        $image = $banner->image;

        if ($request->image) {
            $bannerImage = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('banners'), $bannerImage);
            $image = 'banners/' . $bannerImage;
        }

        $banner->update([
            'image' => $image,
            'link' => $request->link,
            'placement' => $request->placement
        ]);

        return redirect()->back()->with('status', trans('texts.success'));
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        File::delete(public_path($banner->image));

        $banner->delete();

        return redirect()
            ->route('laracms.banners')
            ->with('status', 'Banner deleted!');
    }
}