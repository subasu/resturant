<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function pageHandle(Request $request)
    {
        switch($request->pageName)
        {
            case 'addGoogleMap' :
                if(DB::table('google_maps')->count() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                    {
                        return response()->json(['message' => 'no' , 'code' => 'error']);
                    }
            break;
            case 'addAboutUs' :
                if(DB::table('abouts')->count() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                {
                    return response()->json(['message' => 'no' , 'code' => 'error']);
                }
            break;
            case 'addService' :
                if(DB::table('services')->count() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                {
                    return response()->json(['message' => 'no' , 'code' => 'error']);
                }
            break;
            case 'addLogo' :
                if(DB::table('logos')->count() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                {
                    return response()->json(['message' => 'no' , 'code' => 'error']);
                }
            break;
            case 'addSlider' :
                if(DB::table('sliders')->count() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                {
                    return response()->json(['message' => 'no' , 'code' => 'error']);
                }
            break;
        }
    }
}
