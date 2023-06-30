<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Models\TourModel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function create_tour(TourRequest $request){

        TourModel::create($request->all());
                return response()->json(['message'=>"create tour success"],200);


    }
    public function get_tour(){
        $tour = DB::table('tour')->get();
        return response()->json($tour);
    }


    public function delete_soft_tour(Request $request){

        if (Auth::check()) {

            $user = Auth::id();
            $current_user = DB::table('users')->where([
                ['system_role', '=', 2],['id', '=', $user],])->first();
            if (!$current_user){
                return response()->json(['message'=>"You Are Not ADMIN"],405);
            }
            else{

                $id = $request->id;
                $tour_id = TourModel::find($id);

                if($tour_id){
                    $tour_id -> delete();
                    return response()->json(['message'=>"delete_soft tour success"],200);
                }
                else{
                    return response()->json(['message'=>"Not find"],404);
                }
                }
        }
        else {
            return response()->json(['message'=>"Unauthorized"],401);
        }
    }
    public function restore_tour(Request $request){

        if (Auth::check()) {

            $user = Auth::id();
            $current_user = DB::table('users')->where([
                ['system_role', '=', 2],['id', '=', $user],])->first();
            if (!$current_user){
                return response()->json(['message'=>"You Are Not ADMIN"],405);
            }
            else{

                $id = $request->id;
                $tour_id = TourModel::withTrashed()->find($id);

                if ($tour_id) {
                    $tour_id->restore(); // Khôi phục
                    return response()->json(['message' => 'Tour restored successfully.'], 200);
                } else {
                    return response()->json(['message' => 'Tour not found.'], 404);
                }
            }
        }
        else {
            return response()->json(['message'=>"Unauthorized"],401);
        }
    }
    public function delete_tour(Request $request){

        // if (Auth::check()) {

        //     $user = Auth::id();
        //     $current_user = DB::table('users')->where([
        //         ['system_role', '=', 2],['id', '=', $user],])->first();
        //     if (!$current_user){
        //         return response()->json(['message'=>"You Are Not ADMIN"],405);
        //     }
        //     else{


        //     }
        // }
        // else {
        //      return response()->json(['message'=>"Unauthorized"],401);

    //}
                $id = $request->id;
                $tour_id = TourModel::withTrashed($id);

                if($tour_id){
                    $tour_id -> forceDelete();
                    return response()->json(['message'=>"delete tour success"],200);
                }
                else{
                    return response()->json(['message'=>"Not find"],404);
                }
    }
    public function update_tour(Request $request){
        // $id = $request->id;
        // $tour_id = TourModel::find($id);
        // if ($tour_id) {
        //     $tour_id->tour_name = $request->tour_name;
        //     $tour_id->img = $request->img;
        //     $tour_id->description = $request->description;
        //     $tour_id->date_start = $request->date_start;
        //     $tour_id->date_end = $request->date_end;
        //     $tour_id->max_people = $request->max_people;
        //     $tour_id->price = $request->price;
        //     $tour_id->detail = $request->detail;
        //     $tour_id->type_tour = $request->type_tour;
        //     $tour_id->location = $request->location;
        //     $tour_id->save();

        //     return response()->json(['message' => 'Update tour success'], 200);
        // }
        // else{
        //     return response()->json(['message'=>"Not find"],404);
        // }
        $id = $request->id;
        $tour_id = TourModel::find($id);
        if ($tour_id) {
            $requestData = $request->all();
            $defaultValues = [
                'tour_name' => $tour_id->tour_name,
                'img' =>  $tour_id->img,
                'description' => $tour_id->description,
                'date_start' => $tour_id->date_start ,
                'date_end' =>  $tour_id->date_end ,
                'max_people' =>  $tour_id->max_people,
                'price' => $tour_id->price,
                'detail' => $tour_id->detail,
                'type_tour' => $tour_id->type_tour,
                'location' => $tour_id->location,
            ];
            foreach ($defaultValues as $key => $value) {
                if (!isset($requestData[$key])) {
                    $requestData[$key] = $value;
                }
            }
            $tour_id->fill($requestData);
            $tour_id->save();
            return response()->json(['message' => 'Update tour success'], 200);
        } else {
            return response()->json(['message' => "Not find"], 404);
        }
    }


}
