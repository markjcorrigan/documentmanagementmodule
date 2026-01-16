<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use App\Models\assetstore;
// use App\Models\Category;
//
// use App\Models\Brand;
//
// use App\Models\Slider;
//
//
// use App\Models\SubCategory;
//
// use App\Models\SubSubCategory;
// use App\Models\MultiImg;

use Illuminate\Support\Facades\Hash;

class PmboksixController extends Controller
{
    public function integration()
    {

        return view('pmboksix.integration');

    }

    public function close()
    {

        return view('pmboksix.close');

    }

    public function communication()
    {

        return view('pmboksix.communication');

    }

    public function execute()
    {

        return view('pmboksix.execute');

    }

    public function initiate()
    {

        return view('pmboksix.initiate');

    }

    public function monitorandcontrol()
    {

        return view('pmboksix.monitorandcontrol');

    }

    public function plan()
    {

        return view('pmboksix.plan');

    }

    public function pmbokprocessnutshell()
    {

        return view('pmboksix.pmbokprocessnutshell');

    }

    public function pmnotes()
    {

        return view('pmboksix.pmnotes');

    }

    public function procurement()
    {

        return view('pmboksix.procurement');

    }

    public function quality()
    {

        return view('pmboksix.quality');

    }

    public function resource()
    {

        return view('pmboksix.resource');

    }

    public function schedule()
    {

        return view('pmboksix.schedule');

    }

    public function scope()
    {

        return view('pmboksix.scope');

    }

    public function cost()
    {

        return view('pmboksix.cost');

    }

    public function risk()
    {

        return view('pmboksix.risk');

    }

    public function stakeholder()
    {

        return view('pmboksix.stakeholder');

    }

    public function fourone()
    {

        return view('pmboksix.fourone');

    }

    public function fourtwo()
    {

        return view('pmboksix.fourtwo');

    }

    public function fourthree()
    {

        return view('pmboksix.fourthree');

    }

    public function fourfour()
    {

        return view('pmboksix.fourfour');

    }

    public function fourfive()
    {

        return view('pmboksix.fourfive');

    }

    public function foursix()
    {

        return view('pmboksix.foursix');

    }

    public function fourseven()
    {

        return view('pmboksix.fourseven');

    }

    public function fiveone()
    {

        return view('pmboksix.fiveone');

    }

    public function fivetwo()
    {

        return view('pmboksix.fivetwo');

    }

    public function fivethree()
    {

        return view('pmboksix.fivethree');

    }

    public function fivefour()
    {

        return view('pmboksix.fivefour');

    }

    public function fivefive()
    {

        return view('pmboksix.fivefive');

    }

    public function fivesix()
    {

        return view('pmboksix.fivesix');

    }

    public function sixone()
    {

        return view('pmboksix.sixone');

    }

    public function sixtwo()
    {

        return view('pmboksix.sixtwo');

    }

    public function sixthree()
    {

        return view('pmboksix.sixthree');

    }

    public function sixfour()
    {

        return view('pmboksix.sixfour');

    }

    public function sixfive()
    {

        return view('pmboksix.sixfive');

    }

    public function sixsix()
    {

        return view('pmboksix.sixsix');

    }

    public function sevenone()
    {

        return view('pmboksix.sevenone');

    }

    public function seventwo()
    {

        return view('pmboksix.seventwo');

    }

    public function seventhree()
    {

        return view('pmboksix.seventhree');

    }

    public function sevenfour()
    {

        return view('pmboksix.sevenfour');

    }

    public function eightone()
    {

        return view('pmboksix.eightone');

    }

    public function eighttwo()
    {

        return view('pmboksix.eighttwo');

    }

    public function eightthree()
    {

        return view('pmboksix.eightthree');

    }

    public function nineone()
    {

        return view('pmboksix.nineone');

    }

    public function ninetwo()
    {

        return view('pmboksix.ninetwo');

    }

    public function ninethree()
    {

        return view('pmboksix.ninethree');

    }

    public function ninefour()
    {

        return view('pmboksix.ninefour');

    }

    public function ninefive()
    {

        return view('pmboksix.ninefive');

    }

    public function ninesix()
    {

        return view('pmboksix.ninesix');

    }

    public function nineseven()
    {

        return view('pmboksix.nineseven');

    }

    public function tenone()
    {

        return view('pmboksix.tenone');

    }

    public function tentwo()
    {

        return view('pmboksix.tentwo');

    }

    public function tenthree()
    {

        return view('pmboksix.tenthree');

    }

    public function elevenone()
    {

        return view('pmboksix.elevenone');

    }

    public function eleventwo()
    {

        return view('pmboksix.eleventwo');

    }

    public function eleventhree()
    {

        return view('pmboksix.eleventhree');

    }

    public function elevenfour()
    {

        return view('pmboksix.elevenfour');

    }

    public function elevenfive()
    {

        return view('pmboksix.elevenfive');

    }

    public function elevensix()
    {

        return view('pmboksix.elevensix');

    }

    public function elevenseven()
    {

        return view('pmboksix.elevenseven');

    }

    public function twelveone()
    {

        return view('pmboksix.twelveone');

    }

    public function twelvetwo()
    {

        return view('pmboksix.twelvetwo');

    }

    public function twelvethree()
    {

        return view('pmboksix.twelvethree');

    }

    public function thirteenone()
    {

        return view('pmboksix.thirteenone');

    }

    public function thirteentwo()
    {

        return view('pmboksix.thirteentwo');

    }

    public function thirteenthree()
    {

        return view('pmboksix.thirteenthree');

    }

    public function thirteenfour()
    {

        return view('pmboksix.thirteenfour');

    }

    /*

        protected function generatePDF()

        {

            // Get the filename from the URL and prepend the directory

            //called by this url  /pmboksixmanual/fourfour.pdf  or /pmboksixmanual/offer/offer.pdf

            $filename = "../pmboksixmanual/" . $this->route_params['subfolder'] . "/" . $this->route_params['filename'];

            // Check if the file exists, throw a 404 if not found

            if (file_exists($filename)) {

                header("Content-type: application/pdf");

                header("Content-Disposition: inline; filename=\"" . basename($filename) . "\"");

                header('Content-Transfer-Encoding: binary');

                header('Content-Length: ' . filesize($filename));

                readfile($filename);



            } else {

                throw new \Exception('File not found.', 404);



            }

        }



    */

    public function index()
    {

        $blogpost = BlogPost::latest()->get();

        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', null)->orderBy('id', 'DESC')->limit(3)->get();

        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();

        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();

        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();

        $skip_brand_product_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->get();

        // return $skip_category->id;

        // die();

        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_1', 'skip_brand_product_1', 'blogpost'));

    }

    public function UserLogout()
    {

        Auth::logout();

        return Redirect()->route('login');

    }

    public function UserProfile()
    {

        $id = Auth::user()->id;

        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));

    }

    public function UserProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/user_images'), $filename);

            $data['profile_photo_path'] = $filename;

        }

        $data->save();

        $notification = [

            'message' => 'User Profile Updated Successfully',

            'alert-type' => 'success',

        ];

        return redirect()->route('dashboard')->with($notification);

    } // end method

    public function UserChangePassword()
    {

        $id = Auth::user()->id;

        $user = User::find($id);

        return view('frontend.profile.change_password', compact('user'));

    }

    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([

            'oldpassword' => 'required',

            'password' => 'required|confirmed',

        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $user = User::find(Auth::id());

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::logout();

            return redirect()->route('user.logout');

        } else {

            return redirect()->back();

        }

    }// end method

    public function ProductDetails($id, $slug)
    {

        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;

        $product_color_en = explode(',', $color_en);

        $color_hin = $product->product_color_hin;

        $product_color_hin = explode(',', $color_hin);

        $size_en = $product->product_size_en;

        $product_size_en = explode(',', $size_en);

        $size_hin = $product->product_size_hin;

        $product_size_hin = explode(',', $size_hin);

        $multiImag = MultiImg::where('product_id', $id)->get();

        $cat_id = $product->category_id;

        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.product.product_details', compact('product', 'multiImag', 'product_color_en', 'product_color_hin', 'product_size_en', 'product_size_hin', 'relatedProduct'));

    }

    public function TagWiseProduct($tag)
    {

        $products = Product::where('status', 1)->where('product_tags_en', $tag)->where('product_tags_hin', $tag)->orderBy('id', 'DESC')->paginate(3);

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tags.tags_view', compact('products', 'categories'));

    }

    // Subcategory wise data

    public function SubCatWiseProduct(Request $request, $subcat_id, $slug)
    {

        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();

        // /  Load More Product with Ajax

        if ($request->ajax()) {

            $grid_view = view('frontend.product.grid_view_product', compact('products'))->render();

            $list_view = view('frontend.product.list_view_product', compact('products'))->render();

            return response()->json(['grid_view' => $grid_view, 'list_view', $list_view]);

        }

        // /  End Load More Product with Ajax

        return view('frontend.product.subcategory_view', compact('products', 'categories', 'breadsubcat'));

    }

    // Sub-Subcategory wise data

    public function SubSubCatWiseProduct($subsubcat_id, $slug)
    {

        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(6);

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $breadsubsubcat = SubSubCategory::with(['category', 'subcategory'])->where('id', $subsubcat_id)->get();

        return view('frontend.product.sub_subcategory_view', compact('products', 'categories', 'breadsubsubcat'));

    }

    // / Product View With Ajax

    public function ProductViewAjax($id)
    {

        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color_en;

        $product_color = explode(',', $color);

        $size = $product->product_size_en;

        $product_size = explode(',', $size);

        return response()->json([

            'product' => $product,

            'color' => $product_color,

            'size' => $product_size,

        ]);

    } // end method

    // Product Seach

    public function ProductSearch(Request $request)
    {

        $request->validate(['search' => 'required']);

        $item = $request->search;

        // echo "$item";

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->get();

        return view('frontend.product.search', compact('products', 'categories'));

    } // end method

    // /// Advance Search Options

    public function SearchProduct(Request $request)
    {

        $request->validate(['search' => 'required']);

        $item = $request->search;

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->select('product_name_en', 'product_thambnail', 'selling_price', 'id', 'product_slug_en')->limit(5)->get();

        return view('frontend.product.search_product', compact('products'));

    } // end method

}
