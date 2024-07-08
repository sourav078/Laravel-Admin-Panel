<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\UsersMediaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

//use Intervention\Image\Image as Image;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public $user;
    public $_UUID;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            /**
             * profile image data
             */
            $userProfileImage = UsersMediaModel::where('user_id', Auth::user()->id)->first();
            if ($userProfileImage) {
                View::share('profileImage', $userProfileImage->profile_image);
            }
            /**
             * end profile image data
             */
            return $next($request);
        });
    }

    public function index()
    {
        $total_roles = count(Role::select('id')->get());
        $total_admins = 1;
        $total_permissions = count(Permission::select('id')->get());
        return view('backend.pages.dashboard.index_v2', compact('total_admins', 'total_roles', 'total_permissions'));
    }
    /**
     * account settings page
     */
    public function accountSettings()
    {
        if (is_null($this->user) || !$this->user->hasPermissionTo('account.settings')) {
            abort(403, 'Sorry !! You are Unauthorized to view account settings page!');
        }
        $user = Auth::user();
        $userMediaInfoModel = UsersMediaModel::where('user_id', Auth()->user()->id)->first();
        return view('backend.pages.dashboard.account_settings', compact('user', 'userMediaInfoModel'));
    }
    /**
     * account settings page submit
     */
    public function accountSettingsSubmitForm(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasPermissionTo('account.settings')) {
            abort(403, 'Sorry !! You are Unauthorized to view account settings page!');
        }
        if ($request->password) {
            $request->validate(
                [
                    'name' => 'required|max:255',
                    'password' => 'required|min:6|confirmed',
                    'profile_image' => 'mimes:jpeg,png,jpg,gif|max:6144',
                ]
            );
        } else {
            $request->validate(
                [
                    'name' => 'required|max:255',
                    'lastname' => 'max:255',
                    'profile_image' => 'mimes:jpeg,png,jpg,gif|max:6144',
                ]
            );
        }
        // load user
        $user = User::findOrFail(Auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        /**
         * Insert image new approach
         */
        if ($request->hasFile('profile_image')) {
            /**
             * First check if the image is avilable or not. Then delete old files
             */
            $loadImageObjectData = DB::table('users_profile_media')->select('profile_image')->where('user_id', Auth()->user()->id)->first();
            if ($loadImageObjectData) {
                if (Storage::disk('public')->exists('images/profile_image/' . $loadImageObjectData->profile_image)) {
                    Storage::disk('public')->delete('images/profile_image/' . $loadImageObjectData->profile_image);
                }
                if (Storage::disk('public')->exists('images/profile_image/thumb/' . $loadImageObjectData->profile_image)) {
                    Storage::disk('public')->delete('images/profile_image/thumb/' . $loadImageObjectData->profile_image);
                }
            }
            /**
             * Now insert / update new image
             */
            $imageName = set_unique_image_file_name_on_save(Auth()->user()->email . $this->_UUID, $request->profile_image->extension());
            $request->profile_image->storeAs('public/images/profile_image', $imageName);
            /**
             * Insert / update thumb image
             */
            $image = $request->file('profile_image');
            $destinationSavedPath = storage_path('app/public/images/profile_image/thumb');


            $request->profile_image->storeAs('public/images/profile_image/thumb', $imageName);

            /**
             * here resising is getting issues. next time have to solve this issues
             */
            /*
            $img = Image::make($image->path());
            $img->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationSavedPath . '/' . $imageName);
            $imageRootPath = storage_path('app/public/images/profile_image');
            $image->move($imageRootPath, $imageName);
            */
            /**
             * End of resize
             */
            UsersMediaModel::updateOrCreate(
                ['user_id' => Auth()->user()->id],
                ['user_id' => Auth()->user()->id, 'profile_image' => $imageName]
            );
        }
        $user->save();
        $request->session()->flash('success', 'Accounts information saved');
        return back();
    }
}
