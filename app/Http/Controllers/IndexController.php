<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Basket;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\City;
use App\Models\GoogleMap;
use App\Models\Logo;
use App\Models\Modol;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\Role;
use App\Models\Service;
use App\Models\Size;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $admin_id = Role::where('title', '=', 'admin')->value('id');
        $user_id = Role::where('title', '=', 'user')->value('id');
        if ($role_id == $admin_id)
            return view('layouts.adminLayout');
        elseif ($role_id == $user_id)
            return view('layouts.userLayout');
    }

    public function aboutUs()
    {
        $menu = $this->loadMenu();
        $pageTitle = 'درباره ی ما';
        $aboutUs = About::latest()->first()->value('description');
        return view('main.about', compact('pageTitle', 'menu', 'aboutUs'));
    }

    public function search(Request $request)
    {
        $results = Product::where('title', 'like', '%' . $request->search_key . '%')
            ->orWhere('description', 'like', '%' . $request->search_key . '%')->get();
        $menu = $this->loadMenu();
        $logo = Logo::latest()->first();
        $googleMap = GoogleMap::latest()->first();
        return view('main.searchResult', compact('results', 'menu', 'lo go', 'googleMap'));
    }

    public function loadMenu()
    {
        $menu = Category::where([['parent_id', null], ['grand_parent_id', null], ['active', 1]])->get();
        foreach ($menu as $sub) {
            $submenu = Category::where([['parent_id', $sub->id], ['active', 1]])->orderBy('depth', 'DESC')->get();
            foreach ($submenu as $sm) {
                $sm->brands = Category::where([['parent_id', $sm->id], ['active', 1]])->get();
                $x = 0;
                foreach ($sm->brands as $val) {
                    $x = CategoryProduct::where('product_id', '=', $val->id)->get();
                }
            }
            if ($x)
                $sub->hasProduct = 1;
            else
                $sub->hasProduct = 0;
        }

        return $menu;

    }

    public function home()
    {
        $menu = $this->loadMenu();
        //this block code add sub category to each main category collection
        foreach ($menu as $mnu) {
            $counter=0;
            $mnu->submenu = $submenu = Category::where([['parent_id', $mnu->id], ['active', 1]])->orderBy('depth', 'DESC')->orderBy('id', 'DESC')->get();
            foreach ($submenu as $sm) {
                $x = CategoryProduct::where([['category_id', $sm->id], ['active', 1]])->value('id');
                if ($x)
                    $sm->hasProduct = 1;
                else
                    $sm->hasProduct = 0;
                //this block code add product to each sub category collection
                $categories = Category::find($sm->id);
                $products = $categories->products()->get();
                $count = count($products);
                $sm->products = $products;
                $sm->count = $count;
                $counter+=$count;
            }
            $mnu->countCat=$counter;
        }
//        dd($menu);
        $pageTitle = 'رستوران آرتان';
        $capital = City::where('parent_id', '=', '1')->get();
        $services = Service::where('active', '=', '1')->get();
        $sliders = Slider::where('active', '=', '1')->get();
        $logo = Logo::latest()->first();
        $googleMap = GoogleMap::latest()->first();
        $products = Product::all();
        $aboutUs = About::all();
        if (count($aboutUs))
        {
            $aboutUs = About::latest()->first()->value('description');

        }
        return view('main.index', compact('pageTitle', 'menu', 'services', 'sliders', 'logo', 'googleMap','aboutUs','products','capital'));

    }

    //show login blade :in login blade there are 2 form for login and registeration
    public function login()
    {
        $logo = Logo::latest()->first();
        $menu = $this->loadMenu();
        $capital = City::where('parent_id', '=', '1')->get();
        $pageTitle = 'ورود/عضویت';
        $googleMap = GoogleMap::latest()->first();
        return view('main.login', compact('pageTitle', 'menu', 'capital', 'logo', 'googleMap'));
    }

    //show product page in main site
    public function products()
    {
        $menu = $menu = $this->loadMenu();
        $pageTitle = 'لیست محصولات';
        $logo = Logo::latest()->first();
        $googleMap = GoogleMap::latest()->first();
        return view('main.products', compact('pageTitle', 'menu', 'logo', 'googleMap'));
    }

    //find city of a selected capital in register page,call by ajax from login blade
    public function town($cid)
    {
        $towns = City::where('parent_id', '=', $cid)->get();
        return response()->json($towns);
    }

    //make captcha- called by ajax
    function createCaptchaImage()
    {
        $time = round(microtime(true) * 1000);
        $image = imagecreate(180, 45);
        $background_color = imagecolorallocate($image, 190, 190, 190);
        $text_color = imagecolorallocate($image, 225, 255, 255);
        $line_color = imagecolorallocate($image, 0, 210, 0);
        $pixel_color = imagecolorallocate($image, 0, 70, 250);

        imagefilledrectangle($image, 0, 0, 180, 45, $background_color);

        for ($i = 0; $i < 3; $i++) {
            imageline($image, 0, rand(0, 45), 180, rand(0, 45), $line_color);
        }
        for ($i = 0; $i < 200; $i++) {
            imagesetpixel($image, rand(0, 180), rand(0, 45), $pixel_color);
        }
        $letters = "1234567890";
        $len = strlen($letters);
        $word = "";
        $font = public_path() . "/main/assets/fonts/arial.ttf";
        for ($i = 0; $i < 5; $i++) {
            $letter = $letters[rand(0, $len - 1)];
            imagettftext($image, 18, rand(10, 45), 25 + ($i * 30), 30, $text_color, $font, $letter);
            $word = $word . $letter;

        }
        session()->put('captcha', $word);
        $array = glob('*.png');

        foreach ($array as $x) {
            $create_time = str_replace('.png', '', $x);
            if ($time - $create_time > 20000)
                unlink($x);
        }
        imagepng($image, $time . ".png");
        return response()->json($time . ".png");

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function register(request $data)
    {
        $validation='';
        if ($data['frmtype'] == "user") {
            $validation = Validator::make($data->all(), [
                    'name' => 'sometimes|nullable|max:255',
                    'family' => 'sometimes|nullable|max:255',
                    'email' => 'sometimes|nullable|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required',
                    'address' => 'sometimes|nullable|max:1000',
                    'telephone' => 'sometimes|nullable|numeric|size:11',
                    'cellphone' => 'required|numeric|min:11|unique:users',
                    'birth_date' => 'sometimes|nullable|min:8|max:10',
                    'capital' => 'sometimes|nullable',
                    'town' => 'sometimes|nullable',
                    'zipCode' => 'sometimes|nullable|numeric|min:10',
                    'captcha' => 'required|in:' . session()->get('captcha')
                ]
                ,
                [
                    'name.required' => ' فیلد نام الزامی است',
                    'name.max' => 'حداکثر 255 کاراکتر مجاز است',
                    'family.required' => ' فیلد نام خانوادگی الزامی است ',
                    'family.max' => 'حداکثر 255 کاراکتر مجاز است',
                    'email.required' => ' فیلد ایمیل/نام کاربری الزامی است',
                    'email.unique' => ' ایمیل/نام کاربری قبلا استفاده شده است ',
                    'cellphone.unique' => ' این تلفن همراه قبلا استفاده شده است ',
                    'password.required' => ' فیلد رمز عبور الزامی است ',
                    'password.min' => ' رمز عبور حداقل باید 6 کاراکتر باشد ',
                    'password.confirmed' => ' رمز عبور و تکرار آن با هم مطابقت ندارند ',
                    'captcha.required' => ' فیلد کد امنیتی الزامی است ',
                    'captcha.in' => ' کد امنیتی وارد شده صحیح نیست ',
                    'cellphone.required' => ' فیلد تلفن همراه الزامی است ',
                    'cellphone.numeric' => 'فیلد موبایل باید عددی باشد',
                    'telephone.required' => ' فیلد تلفن الزامی است ',
                    'telephone.numeric' => ' فیلد تلفن عددی است',
                    'zipCode.numeric' => ' فیلد کدپستی عددی است',
                    'telephone.size' => ' فیلد تلفن باید 11 رقمی باشد',
                    'cellphone.size' => ' فیلد موبایل باید 11 رقمی باشد',
                    'town.required' => ' فیلد شهرستان ضروری است',
                    'capital.required' => ' فیلد استان ضروری است',
                    'password_confirmation.required' => 'فیلد تکرار پسورد ضروری است'
                ]);
        }//end of if
        $errors = $validation->errors();
        if (!$errors->isEmpty())
            return response()->json($errors);

        if ($data['frmtype'] == "user") {
            $role_id = 1;
        }
        $capital = City::where('id', '=', $data['capital'])->value('title');
        $result = User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cellphone' => $data['cellphone'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
           // 'capital_city_id' => $capital,
            //'town_city_id' => $data['town'],
            'telephone' => $data['telephone'],
            'role_id' => $role_id,
            'zipCode' => $data['zipCode'],
//            'register_date' => date_create(),
        ]);
        if ($result)
            return response()->json(['data' => 1]);
        else
            return response()->json(['data' => 0]);

    }


    //below function is to return products of a category
    // show products by ajax
    public function showProducts($id)
    {
        $categories = Category::find($id);
        $products = $categories->products()->get();
        $i=count($products);
        while ($i>0)
        {$i--;
        foreach($products[$i]->productFlags as $flag)
        {
            if($flag->active==1)
            {
                $products->flag=$flag->price;
            }
        }
        foreach($products[$i]->productImages as $img)
        {
            $products->img=$img->image_src;
        }
        }
        return response()->json(['products'=>$products]);
    }

    //below function is to return show product blade
    public function productDetail($id)
    {
        $product = Product::find($id);
        $brand = $product->categories[0]->id;
        $subcatId = Category::where('id', '=', $brand)->value('parent_id');
        $subcat = \App\Models\Category::where('id', '=', $subcatId)->value('title');
        $cat = Category::where('id', '=', $subcat)->value('title');
        foreach($product->productImages as $img)
        {
            $product->image_src=$img->image_src;
        }
        foreach($product->productFlags as $flag) {
            if ($flag->active == 1)
                $product->price = $flag->price;
        }
        $sizeName='';
        $modelName='';
        if(!empty($product->productSizes))
        {
            foreach ($product->productSizes as $pr)
            {
                $modelName = Modol::find($product->productSizes->model_id)->title;
                $productSize = Size::find($product->productSizes->size_id);
                if ($productSize->width !="") {
                    $sizeName = $productSize->width . ' در ' . $productSize->length;
                }
                elseif ($productSize->diameter !="") {
                    $sizeName =  ' قطر ' . $productSize->diameter;
                }
                elseif ($productSize->sideways !="") {
                    $sizeName =  ' ضلع ' . $productSize->sideways;
                }
            }
        }
        $product->sizeName=$sizeName;
        $product->modelName=$modelName;
        return response()->json(['product'=>$product]);
    }


    //below function is related to return order view
    public function order($parameter)
    {
        if (isset($_COOKIE['addToResturantBasket'])) {

            switch ($parameter) {
                case 'basketDetail':
                    $basketId = Basket::where([['cookie', $_COOKIE['addToResturantBasket']], ['payment', 0]])->value('id');
                    if ($basketId) {
                        $baskets = Basket::find($basketId);
                        $total = 0;
                        foreach ($baskets->products as $basket) {
                            $basket->count = $basket->pivot->count;
                            $basket->price = $basket->pivot->product_price;
                            $basket->sum = $basket->pivot->count * $basket->pivot->product_price;
                            $total += $basket->sum;
                            $basket->basket_id = $basket->pivot->basket_id;
                        }
                        return response()->json(['baskets'=>$baskets,'total'=>$total]);
                    }
                    else
                        return response()->json($_COOKIE['addToResturantBasket']);
                    break;

                case 'orderDetail':
                    $pageTitle = 'جزئیات سفارش';
                    $paymentTypes = PaymentType::where('active', 1)->get();
                    $basketId = Basket::where([['cookie', $_COOKIE['addToResturantBasket']], ['payment', 0]])->value('id');
                    $baskets = Basket::find($basketId);
                    $total = 0;
                    $totalDiscount = 0;
                    $totalPostPrice = 0;
                    $finalPrice = 0;
                    if (!empty($baskets)) {
                        foreach ($baskets->products as $basket) {
                            $basket->count = $basket->pivot->count;
                            $basket->price = $basket->pivot->product_price;
                            $basket->sum = $basket->count * $basket->price;
                            if ($basket->discount_volume != null) {
                                $basket->sumOfDiscount = ($basket->sum * $basket->discount_volume) / 100;
                            }
                            $basket->basket_id = $basket->pivot->basket_id;
                            $basket->product_id = $basket->pivot->product_id;
                            $totalDiscount+=$basket->sumOfDiscount;
                            $totalPostPrice += $basket->post_price;
                            $total+=$basket->sum;
//                            if ($basket->discount_volume != null) {
//                                $totalDiscount += $basket->discount_volume;
//                                if ($totalDiscount > 0) {
//                                    $basket->sumOfDiscount = ($total * $totalDiscount) / 100;
//                                }
//                            }

                        }
                        $finalPrice += ($total + $totalPostPrice) - $totalDiscount;
                        return response()->json([' '=>$baskets,'total'=>$total,'totalPostPrice'=>$totalPostPrice,'finalPrice'=>$finalPrice,'totalDiscount'=>$totalDiscount,'basketId'=>$basketId,]);
//                        return view('main.orderDetail', compact('menu', 'pageTitle', 'baskets', 'total', , 'finalPrice', 'paymentTypes', 'logo', 'googleMap'));
                    } else {
                        return response()->json('errors.403');
                    }

                    break;
            }

        } else {
            return Redirect::back();
        }

    }

}
