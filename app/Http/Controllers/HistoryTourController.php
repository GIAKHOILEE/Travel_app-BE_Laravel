<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\HistoryTourRequests;
use App\Models\HistoryTour;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HistoryTourController extends Controller
{
    //
    public function history_tour(HistoryTourRequests $request){

        $tours = DB::table('tour')->select('id', 'tour_name', 'price')->where([['id', '=',$request->input('id_tour')]])->first();
                //dd($tours);

                if(!$tours){
                    return response()->json(['MSG'=>"Method Not Allowed"],405);
                }
                else{
                    $user_id = $request->user_id;
                    $history_tour = new HistoryTour();
                    $history_tour->user_id = $user_id->user_id;
                    $history_tour->tour_id = $tours->id;
                    $history_tour->tour_name = $tours->tour_name;
                    $history_tour->price = $tours->price;
                    $history_tour->date_history = Carbon::now()->format('Y-m-d');
                    $history_tour->status_tour = 'waiting';
                    $history_tour->save();

                    return response()->json(["user_id" => $user_id,"data_tour"=>$history_tour,'MSG'=>"View tour success"],200);

                }
    }
    public function get_bookingtour(Request $request){

        $user_id = $request->user_id;
        $historyTour = HistoryTour::where('user_id', $user_id)->get();
        //$historyTour = HistoryTour::all();
        return response()->json($historyTour);
    }
    public function get_confirm_tour(Request $request){
        $user_id = $request->user_id;
        $historyTour = HistoryTour::where('user_id', $user_id)->get();
        //$historyTour = HistoryTour::all();
        return response()->json($historyTour);

    }

    public function confirm_tour(Request $request){
        $confirm = 'waiting';
        $historyTour = HistoryTour::where('status_tour', $confirm)->get();

        if($historyTour->isEmpty()){
            return response()->json(['MSG'=>"No tour to confirm"],405);
        }
        else{
            $id = $request->id;
            $HistoryTour_id = HistoryTour::find($id);

            if (!$HistoryTour_id) {
                return response()->json(['message'=>"Tour not found"],404);
            }
            else{

                $HistoryTour_id-> status_tour = "comfirm";
                $HistoryTour_id->save();

                return response()->json(['message' => 'tour confirm'], 200);
            }
        }
    }
    public function cancel_confirm_tour(Request $request){

        $confirm = 'waiting';
        $historyTour = HistoryTour::where('status_tour', $confirm)->get();

        if($historyTour->isEmpty()){
            return response()->json(['MSG'=>"No tour to confirm"],405);
        }
        else{
            $id = $request->id;
            $HistoryTour_id = HistoryTour::find($id);

           if (!$HistoryTour_id) {
               return response()->json(['message'=>"Tour not found"],404);
            }
            else{
                $HistoryTour_id-> status_tour = "cancel";
                $HistoryTour_id->save();

                return response()->json(['message' => 'tour cancel'], 200);
            }
        }
    }

}
