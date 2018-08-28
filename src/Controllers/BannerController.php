<?php

namespace Grundmanis\Laracms\Modules\Banners\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Grundmanis\Laracms\Modules\Banners\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('laracms.shop::buyer.index', [
            'buyers' => $buyers->paginate(10)
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('laracms.shop::buyer.form', compact('user'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $password = [];

        if ($request->password) {
            $password = [
                'password' => Hash::make($request->password)
            ];
        }

        if ($request->avatar) {
            $photoName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $photoName);
        }

        $data = [
            'avatar' => isset($photoName) ? asset('avatars/' . $photoName) : '',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ];

        $user->update($data + $password);

        if ($request->blocked) {
            $user->blocked()->create([
                'reason' => $request->blocked_reason ?? ''
            ]);
        } else {
            $user->blocked()->delete();
        }

        return redirect()->back()->with('status', trans('texts.success'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('laracms.buyers')->with('status', 'Buyer deleted!');
    }
}