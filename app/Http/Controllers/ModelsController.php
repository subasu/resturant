<?php

namespace App\Http\Controllers;

use App\Models\Modol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    //below function is related to return add models
    public function addModels()
    {
        $pageTitle = 'افزودن حالت ها';
        return view('admin.addModels',compact('pageTitle'));
    }

    //below function is related to return models management view
    public function modelsManagement()
    {
        $data = Modol::all();
        $pageTitle = 'مدیریت حالت ها';
        return view('admin.modelsManagement',compact('data','pageTitle'));
    }

    //below function is related to add new models in data base
    public function addNewModels(Request $request)
    {
        $count = count($request->title);
        $i = 0;
        while($i < $count)
        {
            $newModel = new Modol();
            $newModel->title    = trim($request->title[$i]);
            $newModel->save();
            $i++;
        }

        if($newModel)
        {
            return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
        }else
        {
            return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
    }

    //below function is related toi edit model title
    public function editModelTitle(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
        {
            $update = Modol::find($request->id);
            $update->title    = trim($request->title);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
            }
            else
            {
                return response()->json(['message' => 'خطایی رخ د اده است ، با بخش پشتیبانی تماس بگیرید ']);
            }
        }
    }

    //below function is related to make model enable or disable
    public function enableOrDisableModel(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }
        else
        {
            switch ($request->active)
            {
                case 1 :
                    $update = DB::table('models')->where('id',$request->modelId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'حالت مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('models')->where('id',$request->modelId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'حالت مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
            }
        }
    }

    //below function is related to edit model
    public function editModel($id)
    {
        $pageTitle = 'ویرایش حالت';
        $model = Modol::where('id',$id)->get();
        if(count($model) > 0)
        {
            return view('admin.editModel',compact('model','pageTitle'));
        }else
        {
            return view('errors.403');
        }
    }
}
