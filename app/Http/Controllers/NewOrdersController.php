<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageValidation;
use App\Models\NewOrders;
use App\Models\OrderMessages;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OrderMessage;
use function PHPSTORM_META\elementType;

class NewOrdersController extends Controller
{
    //
    public function newOrders()
    {
        $pageTitle = 'مشخصات مشتریان';
        $data      = User::where('role_id',3)->with('newOrders')->get();
        return view('admin.newOrders',compact('pageTitle','data'));
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
    }

    //
    public function showNewOrders($id)
    {
        $pageTitle = 'جزئیات سفارش جدید';
        $userInfo = User::find($id);
        if(count($userInfo) > 0)
        {
            return view('admin.showNewOrders',compact('userInfo','pageTitle'));
        }else
            {
                return view('errors.403');
            }

    }

    //
    public function showOrdersMessage($id)
    {
        $pageTitle = 'توضیحات و تعیین وضعیت سفارش';
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
             return view('admin.showOrdersMessage',compact('orders','pageTitle'));
         }else
             {
                 return view('errors.403');
             }
    }

    //
    public function saveAdminMessage(MessageValidation $request)
    {
        $message = OrderMessages::find($request->messageId);
        $message->admin_message = $request->message;
        $message->updated_at    = Carbon::now(new \DateTimeZone('Asia/Tehran'));
        $message->save();
        if($message)
        {
            return response()->json(['message' => 'پیام شما ثبت گردید','code' => 'success']);
        }else
            {
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید','code' => 'error']);
            }
    }

    //
    public function changeOrderStatus(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
            {
                switch ($request->status)
                {
                    case 0 :
                        $update = DB::table('order_messages')->where('new_order_id',$request->newOrderId)->update(['status' => 1]);
                        if($update)
                        {
                            return response()->json(['message' => 'وضعیت سفارش از در حال بررسی به در حال انجام تغییر یافت', 'code' => 'success']);
                        }else
                            {
                                return response()->json(['message' => 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید', 'code' => 'error']);
                            }
                    break;
                    case 1 :
                        $update = DB::table('order_messages')->where('new_order_id',$request->newOrderId)->update(['status' => 2]);
                        if($update)
                        {
                            return response()->json(['message' => 'وضعیت سفارش از در حال انجام به انجام شده تغییر یافت', 'code' => 'success']);
                        }else
                        {
                            return response()->json(['message' => 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید', 'code' => 'error']);
                        }
                        break;
                }
            }
    }
}
