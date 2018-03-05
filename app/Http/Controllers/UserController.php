<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageValidation;
use App\Http\Requests\OrderRegistrationValidation;
use App\Http\Requests\NewPasswordValidation;
use App\Http\Requests\UserMessageValidation;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckUserCellphone;
use App\Models\Basket;
use App\Models\NewOrders;
use App\Models\Order;
use App\Models\OrderMessages;
use App\Models\Product;
use App\Models\Size;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //below function returns all users to the usersManagement blade ...
    public function usersManagement()
    {
        $data = User::all();
        return view('admin.usersManagement', compact('data'));
    }


    //below function is related to add products into basket with cookie
    public function addToBasket(Request $request)
    {
        $now = Carbon::now(new \DateTimeZone('Asia/Tehran'));
        if (isset($_COOKIE['addToArtBasket'])) {
            $basketId = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 0]])->value('id');
            $count = DB::table('basket_product')->where([['basket_id', $basketId], ['product_id', $request->productId]])->count();

            if ($oldBasket = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 0]])->count() > 0 && $count > 0) {

                $update = DB::table('basket_product')->where([['basket_id', $basketId], ['product_id', $request->productId]])->increment('count');
                if ($update) {
                    return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید', 'code' => 1]);
                } else {
                    return response()->json(['message' => 'خطایی رخ داده است']);
                }

            } else if ($oldBasket = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 1]])->count() > 0) {
                return $this->newCookie($now, $request);
            } else {
                $pivotInsert = DB::table('basket_product')->insert
                ([
                    'basket_id' => $basketId,
                    'product_id' => $request->productId,
                    'product_price' => $request->productFlag,
                    'time' => $now->toTimeString(),
                    'date' => $now->toDateString(),
                    'count' => 1
                ]);
                if ($pivotInsert) {
                    return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید', 'code' => 1]);
                } else {
                    return response()->json(['message' => 'خطایی رخ داده است']);
                }
            }
        } else {
            return $this->newCookie($now, $request);
        }

    }

    //below function is related to make new cookie
    public function newCookie($now, $request)
    {
        $cookieValue = mt_rand(1, 1000) . microtime();
        $cookie = setcookie('addToArtBasket', $cookieValue, time() + (86400 * 30), "/");
        if ($cookie) {
            $basket = new Basket();
            $basket->cookie = $cookieValue;
            $basket->save();
            if ($basket) {
                $pivotInsert = DB::table('basket_product')->insert
                ([
                    'basket_id' => $basket->id,
                    'product_id' => $request->productId,
                    'product_price' => $request->productFlag,
                    'time' => $now->toTimeString(),
                    'date' => $now->toDateString(),
                    'count' => 1
                ]);
                if ($pivotInsert) {
                    return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید', 'code' => 1]);
                } else {
                    return response()->json(['message' => 'خطایی رخ داده است']);
                }

            } else {
                return response()->json(['message' => 'خطایی رخ داده است']);
            }
        }
    }

    //below function is related to get basket count
    public function getBasketCountNotify()
    {
        if(isset($_COOKIE['addToArtBasket']))
        {
            $basketId = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 0]])->value('id');
            $count = DB::table('basket_product')->where('basket_id', $basketId)->count();
            return response()->json($count);
        }else
            {
                return response()->json(0);
            }

    }

    //below function is related to get basket total price
    public function getBasketTotalPrice()
    {
        if(isset($_COOKIE['addToArtBasket'])) {
            $basketId = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 0]])->value('id');
            $baskets = DB::table('basket_product')->where('basket_id', $basketId)->get();
            $totalPrice = '';
            foreach ($baskets as $basket) {
                $totalPrice += $basket->count * $basket->product_price;
            }
            return response()->json($totalPrice);
        }else
            {
                return response()->json(0);
            }
    }

    //below function is related to get basket content
    public function getBasketContent()
    {
        $basketId = DB::table('baskets')->where([['cookie', $_COOKIE['addToArtBasket']], ['payment', 0]])->value('id');
        $baskets = Basket::find($basketId);
        foreach ($baskets->products as $product) {
            $product->count = $product->pivot->count;
            $product->price = $product->pivot->product_price;
            $product->basket_id = $product->pivot->basket_id;
            $product->product_id = $product->pivot->product_id;

        }
        return response()->json($baskets);
    }

    //below function is related to remove item from basket
    public function removeItemFromBasket(Request $request)
    {
        if (!$request->ajax()) {
            abort(403);
        }
        $delete = DB::table('basket_product')->where([['basket_id', $request->basketId], ['product_id', $request->productId]])->delete();
        $count = DB::table('basket_product')->where('basket_id', $request->basketId)->count();
        if ($delete) {
            return response()->json(['message' => 'محصول مورد نظر از سبد خرید حذف گردید', 'code' => 1, 'count' => $count]);
        } else {
            return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
    }

    //below function is related to update basket payment field
    public function orderFixed()
    {
        if (isset($_COOKIE['addToArtBasket'])) {
            $update = DB::table('baskets')->where('cookie', $_COOKIE['addToArtBasket'])->update(['payment' => 1]);
            if ($update) {
                return response()->json(['message' => '', 'code' => 1]);
            }
        }
    }

    //below function is related to add or sub count of basket
    public function addOrSubCount(Request $request)
    {
        switch ($request->parameter) {
            case 'addToCount' :
                $update = DB::table('basket_product')->where([['basket_id', $request->basketId], ['product_id', $request->productId]])->increment('count');
                if ($update) {
                    return response()->json(['code' => 1]);
                } else {
                    return response()->json(['code' => 0]);
                }
                break;
            case 'subFromCount' :
                $update = DB::table('basket_product')->where([['basket_id', $request->basketId], ['product_id', $request->productId]])->decrement('count');
                if ($update) {
                    return response()->json(['code' => 1]);
                } else {
                    return response()->json(['code' => 0]);
                }
                break;
        }
    }


    //below function is related to add order registration
    public function orderRegistration(OrderRegistrationValidation $request)
    {
        if ($basket = Basket::where([['id', $request->basketId], ['payment', 0]])->count() > 0) {
            $user = User::where('cellphone', $request->userCellphone)->get();
            if (count($user) > 0) {
                $newPassword = '';
                return $this->addToOrder($request, $user[0], $newPassword);
            } else {
                $newPassword = str_random(8);
                $user = new User();
                $user->cellphone = $request->userCellphone;
                $user->password = Hash::make($newPassword);
                $user->save();
                if ($user) {
                    return $this->addToOrder($request, $user, $newPassword);
                }
            }
        } else {
            return response()->json(['message' => 'این سفارش قبلا ثبت گردیده است ، لطفات تقاضای مجدد نفرمائید']);
        }
    }

    //below function is related to add items in orders table
    public function addToOrder($request, $user, $newPassword)
    {
        $product = $this->addToSellCount($request);
        if($product)
        {
            $now = Carbon::now(new\DateTimeZone('Asia/Tehran'));
            $order = new Order();
            $order->user_id = $user->id;
            $order->user_coordination = trim($request->userCoordination);
            $order->date = $now->toDateString();
            $order->time = $now->toTimeString();
            $order->total_price = $request->totalPrice;
            $order->discount_price = $request->discountPrice;
            $order->factor_price = $request->factorPrice;
            $order->user_cellphone = $request->userCellphone;
            $order->basket_id = $request->basketId;
            $order->payment_type = $request->paymentType;
            $order->pay = 1;
            $order->transaction_code = 46456464;
            $order->comments         = $request->comments;
            $order->save();
            if ($order) {
                $update = Basket::find($request->basketId);
                $update->payment = 1;
                $update->save();
                if ($update) {

                    if ($newPassword == '') {
                        return response()->json(['message' => 'سفارش  شما با موفقیت ثبت گردید ، لطفا در جهت پیگیری سفارش خود وارد پنل شوید', 'code' => 1, 'userPassword' => $newPassword]);
                    } else {
                        return response()->json(['message' => 'سفارش  شما با موفقیت ثبت گردید ، لطفا در جهت پیگیری سفارش خود با رمز عبور زیر وارد پنل شوید', 'code' => 1, 'userPassword' => $newPassword]);
                    }

                } else {
                    return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                }

            }
        }
        else
        {
            return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }

    }

    //below function is related to add sell count of product
    public function addToSellCount($request)
    {
        if(count($request) > 1)
        {
            for($i=0; $i <= count($request);$i++)
            {
                $product = DB::table('products')->where('id',$request->productId[$i])->increment('sell_count');
            }
            if($product)
            {
                return true;
            }
            else
            {
                return false;
            }
        }else
            {
                $product = DB::table('products')->where('id',$request->productId)->increment('sell_count');
                if($product)
                {
                    return true;
                }else
                    {
                        return false;
                    }
            }

    }

    //below function is related to show user orders
    public function userOrders()
    {
        $pageTitle = 'مشاهده و بررسی سفارشات';
        $data = Order::where([['user_id', Auth::user()->id], ['pay', '<>', null], ['transaction_code', '<>', null]])->get();
        if(count($data) > 0)
        {
            $baskets = Basket::find($data[0]->basket_id);
            foreach ($data as $datum) {
                $datum->orderDate = $this->toPersian($datum->created_at->toDateString());
            }

            return view('user.ordersList', compact('data', 'pageTitle', 'baskets'));
        }
        return view('errors.notFound');
    }

    //
    public function toPersian($date)
    {
        if (count($date) > 0) {
            $gDate = $date;
            if ($date = explode('-', $gDate)) {
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
            }
            $date = Verta::getJalali($year, $month, $day);
            $myDate = $date[0] . '/' . $date[1] . '/' . $date[2];
            return $myDate;
        }
        return;
    }

    //below function is related to show order detail
    public function orderDetails($id)
    {
        $comments = Basket::find($id)->orders->comments;
        $baskets = Basket::find($id);
        if (count($baskets) > 0) {
            $pageTitle = 'جزئیات سفارش';
            foreach ($baskets->products as $basket) {
                $basket->product_price = $basket->pivot->product_price;
                $basket->basket_id = $basket->pivot->basket_id;
                $basket->basketComment = $basket->pivot->comments;
                $basket->basketCount = $basket->pivot->count;
            }

            return view('user.orderDetails', compact('baskets', 'pageTitle','comments'));
        } else {
            return view('errors.403');
        }
    }

    //below function is related to get information of factor
    public function userShowFactor($id)
    {
        $pageTitle = 'فاکتور سفارش';
        $comments = Basket::find($id)->orders->comments;
        $baskets = Basket::find($id);
        $total = 0;
        $totalDiscount = 0;
        $totalPostPrice = 0;
        $finalPrice = 0;
        if (!empty($baskets)) {
            foreach ($baskets->products as $basket) {
                $basket->count = $basket->pivot->count;
                $basket->price = $basket->pivot->product_price;
                $basket->sum = $basket->pivot->count * $basket->pivot->product_price;
                $basket->basketComment = $basket->pivot->comments;
                $total += $basket->sum;
                $basket->basket_id = $basket->pivot->basket_id;
                $totalPostPrice += $basket->post_price;
                if ($basket->discount_volume != null) {
                    $totalDiscount += $basket->discount_volume;
                    if ($totalDiscount > 0) {
                        $basket->sumOfDiscount = ($total * $totalDiscount) / 100;
                    }
                }

            }
            $finalPrice += ($total + $totalPostPrice) - $basket->sumOfDiscount;
            return view('user.userFactor', compact('pageTitle', 'baskets', 'total', 'totalPostPrice', 'finalPrice', 'paymentTypes','comments'));
        } else {
            return view('errors.403');
        }

    }

    //below function is related to return view of changing password
    public function changePassword()
    {
        $pageTitle = 'تغییر رمز عبور';
        if (Auth::check()) {
            $userInfo = User::where('id', Auth::user()->id)->get();
            return view('user.changePassword', compact('pageTitle', 'userInfo'));
        } else
            return redirect('/logout');

    }

    //below function is related to change old password and save new password
    public function saveNewPassword(NewPasswordValidation $request)
    {
        if (!$request->ajax()) {
            abort(403);
        } else {
            if (Auth::user()->id == $request->userId) {
                $oldPassword = User::where([['id', Auth::user()->id], ['active', 1]])->value('password');
                if (Hash::check($request->oldPassword, $oldPassword)) {
                    if ($request->password === $request->confirmPassword) {
                        $q = DB::table('users')->where('id', $request->userId)
                            ->update(['password' => Hash::make($request->password)]);
                        if ($q) {
                            //$n=1;
                            Auth::logout();
                            return response('رمز عبور شما تغییر یافت');
                        } else {
                            return response('متاسفانه در فرآیند تغییر رمز خطایی رخ داده است!');
                        }
                    } else {
                        return response('رمز و تکرار رمز با یکدیگر یکسان نیست');
                    }
                } else {
                    return response('رمز قبلی صحیح نیست');
                }
            } else {
                return redirect('/logout');
            }
        }
    }

    //below function is related to add to seen count
    public function addToSeenCount(Request $request)
    {
        if($request->ajax())
        {
           $product = Product::find($request->productId);
           $product->seen_count += 1;
           $product->save();
           if($product)
           {
               return response()->json(['message' => 'success']);
           }else
               {
                   return response()->json(['message' => 'error']);
               }
        }else
            {
                abort(403);
            }
    }

    //below function is related to return adNewOrders blade...
    public function addNewOrders()
    {
        $pageTitle = "ثبت سفارش جدید";
        return view('user.addNewOrders',compact('pageTitle'));
    }
    //
    public function saveNewOrder(UserMessageValidation $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else{
            $checkFile = new CheckFiles();
            $result    = $checkFile->checkCategoryFiles($request,'');
            if(is_bool($result))
            {
                $newOrders                = new NewOrders();
                $newOrders->user_id       = Auth::user()->id;
                $newOrders->title         = trim($request->title);
                $newOrders->shape         = trim($request->model);
                $newOrders->sideways      = trim($request->sideways);
                $newOrders->diameter      = trim($request->diameter);
                $newOrders->width         = trim($request->width);
                $newOrders->length        = trim($request->length);
                $newOrders->description   = trim($request->description);
                if(!empty($request->file[0]))
                {
                    $file = $request->file[0];
                    $src = $file->getClientOriginalName();
                    $file->move('public/dashboard/orderImages/', $src);
                    $newOrders->file = $request->file[0]->getClientOriginalName();
                }
                $newOrders->save();
                if($newOrders)
                {
                    $orderMessage = new OrderMessages();
                    $orderMessage->new_order_id = $newOrders->id;
                    $orderMessage->user_message = $newOrders->description;
                    $orderMessage->created_at   = Carbon::now(new \DateTimeZone('Asia/Tehran'));
                    $orderMessage->save();
                    if($orderMessage)
                    {
                        return response()->json(['message' => 'سفارش شما با موفقیت ثبت گردید ، برای پیگیری سفارش به منوی پیگیری سفارشات مراجعه فرمائید' , 'code' => 'success']);
                    }else
                    {
                        return response()->json(['message' => 'در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید' , 'code' => 'error']);
                    }

                }else
                    {
                        return response()->json(['message' => 'در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید' , 'code' => 'error1']);
                    }
            }
        }
    }

    //below function is related to check length
    public function checkLength(Request $request)
    {
        $data = Size::where([['length',$request->len],['active',1]])->pluck('width');
        if(count($data) > 0)
        {
            return response()->json(['data' => $data]);
        }else
            {
                return response()->json('0');
            }

    }

    //below function is related to check width
    public function checkWidth(Request $request)
    {
        $data = Size::where([['width',$request->width],['active',1]])->pluck('length');
        if(count($data) > 0)
        {
            return response()->json(['data' => $data]);
        }else
        {
            return response()->json('0');
        }

    }

    //below function is related to show orders
    public function followOrders()
    {
        $pageTitle = 'سفارشات';
        $orders = NewOrders::where('user_id',Auth::user()->id)->get();
        return view('user.followOrders',compact('pageTitle','orders'));
    }

    public function showOrdersMessage($id)
    {
        $pageTitle = 'بررسی توضیحات و ارسال پیام';
        $orders = NewOrders::find($id);
        if(count($orders) > 0)
        {
            foreach ($orders->orderMessages as $message )
            {
                $message->persianDate = $this->toPersian($message->created_at);
                $message->jalaliDate  = $this->toPersian($message->updated_at);
                $message->time        = $message->created_at->format('H:i:s');
                $message->adminTime   = $message->updated_at->format('H:i:s');
            }
            //  dd($orders);
            return view('user.showOrdersMessage',compact('orders','pageTitle'));
        }else
        {
            return view('errors.403');
        }
    }

    //
    public function saveNewMessage(MessageValidation $request)
    {
        if(!$request->ajax())
        {
            abort(404);
        }else
            {
                $newMessage = new OrderMessages();
                $newMessage->new_order_id = $request->newOrderId;
                $newMessage->user_message = trim($request->message);
                $newMessage->created_at   = Carbon::now(new \DateTimeZone('Asia/Tehran'));
                $newMessage->save();
                if($newMessage)
                {
                    return response()->json(['message' => 'پیام شما با موفقیت ثبت گردید','code' => 'success']);
                }else
                {
                    return response()->json(['message' => 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید','code' => 'error']);
                }
            }
    }
}

