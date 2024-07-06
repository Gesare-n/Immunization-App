<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KidsVaccine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HospitalController extends Controller
{
   public function dashboard(){
    $hospital_id = Auth::id();
    
    $incoming_kids_date=KidsVaccine::where('hosp_user_id',$hospital_id)
                                ->where('exp_admin_date', '>',Carbon::now()->format('l, Y'))
                                ->orderBy('exp_admin_date', 'asc')
                                ->value('exp_admin_date'); 
                               
    $incoming_kids = KidsVaccine::where('hosp_user_id',$hospital_id)
                                ->where('exp_admin_date', '>',$incoming_kids_date)
                                ->count();
                            
    $current_kids = KidsVaccine::where('hosp_user_id',$hospital_id)
    ->where('exp_admin_date',Carbon::now()->format('l, Y'))
     ->count();
    $vaccinated_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
                    ->where('admin_date',Carbon::now()->format('l, Y'))
                    ->count();
    $miss_vaccinated_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
                     ->where('exp_admin_date','<',Carbon::now()->format('l, Y'))
                    ->where('admin_date',Carbon::now()->format('l, Y'))
                    ->count();                
    $missed_vaccine_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
                        ->where('exp_admin_date','<',Carbon::now()->format('l, Y'))
                        ->where('admin_date',null)
                        ->count();

    return view('hospital.dashboard',[
        'vaccinated_kids' =>$vaccinated_kids,
        'current_kids' =>$current_kids,
        'miss_vaccinated_kids' => $miss_vaccinated_kids,
        'incoming_kids' =>  $incoming_kids,
        'missed_vaccine_kids' => $missed_vaccine_kids,

    ]);
   }
}
