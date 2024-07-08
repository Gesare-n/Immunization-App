<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KidsVaccine;
use App\Models\Vaccines;
use App\Models\Guardian;
use App\Models\Gender;
use App\Models\Language;
use App\Models\User;
use App\Models\Kid;
use App\Models\KidsGuardian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;
use Twilio\Rest\Client;
class HospitalController extends Controller
{
   public function dashboard(){
    $hospital_id = Auth::id();
    
    // $incoming_kids_date=KidsVaccine::where('hosp_user_id',$hospital_id)
    //                             ->where('exp_admin_date', '>',Carbon::now()->format('l, Y'))
    //                             ->orderBy('exp_admin_date', 'asc')
    //                             ->value('exp_admin_date'); 
                               
    // $incoming_kids = KidsVaccine::where('hosp_user_id',$hospital_id)
    //                             ->where('exp_admin_date', '>',$incoming_kids_date)
    //                             ->count();
                            
    // $current_kids = KidsVaccine::where('hosp_user_id',$hospital_id)
    // ->where('exp_admin_date',Carbon::now()->format('l, Y'))
    //  ->count();
    // $vaccinated_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
    //                 ->where('admin_date',Carbon::now()->format('l, Y'))
    //                 ->count();
    // $miss_vaccinated_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
    //                  ->where('exp_admin_date','<',Carbon::now()->format('l, Y'))
    //                 ->where('admin_date',Carbon::now()->format('l, Y'))
    //                 ->count();                
    // $missed_vaccine_kids =KidsVaccine::where('hosp_user_id',$hospital_id)
    //                     ->where('exp_admin_date','<',Carbon::now()->format('l, Y'))
    //                     ->where('admin_date',null)
    //                     ->count();

    // return view('hospital.dashboard',[
    //     'vaccinated_kids' =>$vaccinated_kids,
    //     'current_kids' =>$current_kids,
    //     'miss_vaccinated_kids' => $miss_vaccinated_kids,
    //     'incoming_kids' =>  $incoming_kids,
    //     'missed_vaccine_kids' => $missed_vaccine_kids,

    // ]);
    return view('hospital.dashboard');
   }
   public function createGuardianShow(){
    $genders= Gender::all();
    $languages= Language::all();
    return view('hospital.createGuardian',['genders'=>$genders,
                                            'languages'=>$languages ]);
  }
   public function createGuardian(Request $request){
    $validatedData = $request->validate([
        'guardian_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'phone' => ['required',  'unique:'.User::class],
        'id_no' => ['required', 'max:255', 'unique:'.User::class],
        'gender_id' => ['required'],
        'language_id' => ['required'],
    ]);
$request = $request->all();
    Guardian::create([
    'guardian_name' => $request['guardian_name'],
     'email' => $request['email'],
        'phone' => $request['phone'],
        'id_no' =>$request['id_no'],
        'gender_id' => $request['gender_id'],
        'language_id' => $request['language_id'],
                     ]);
    $notification = array(
                'alert-type' => 'success',
                'message' => 'The guardian has been added succesfully'
            );
return redirect()->back()->with($notification);                  
   }

   public function createKidShow(){
    $genders= Gender::all();
    return view('hospital.createKid',['genders'=>$genders, ]);
  }
   public function createKid(Request $request){
    $validatedData = $request->validate([
        'kid_name' => ['required', 'string', 'max:255'],
        'date_of_birth' => ['required'],
        'place_birth' => ['required', 'string', 'max:255'],
        'gender_id' => ['required'],
        'parent_id' => ['required'],
        'com_h_user_id' => ['required'],
        'hosp_h_user_id' => ['required'],
    ]);
$request = $request->all();
    Kid::create([
    'kid_name' => $request['kid_name'],
     'date_of_birth' => $request['date_of_birth'],
        'place_birth' => $request['place_birth'],
        'com_h_user_id' =>$request['com_h_user_id'],
        'gender_id' => $request['gender_id'],
        'parent_id' => $request['parent_id'],
        'hosp_user_id' => $request['hosp_h_user_id'],
                     ]);
    $notification = array(
                'alert-type' => 'success',
                'message' => 'The kid has been registered successfully'
            );
return redirect()->back()->with($notification);                  
   }

   public function parentSearch(Request $request)
    {
        // Get the search terms from the request
        $name = $request->input('term1');
        $phone = $request->input('term2');
        $query = Guardian::query();

        if ($name && $phone) {
            $query->where(function ($q) use ($name, $phone) {
                $q->where('guardian_name', 'LIKE', "%{$name}%")
                  ->orWhere('phone', 'LIKE', "%{$phone}%");
            });
        } elseif ($name) {
            $query->where('guardian_name', 'LIKE', "%{$name}%");
        } elseif ($phone) {
            $query->where('phone', 'LIKE', "%{$phone}%");
        }
        
        $results = $query->get();

        $formattedResults = $results->map(function ($result) {
            $displayName = $result->guardian_name;
            
            return [
                'id' => $result->id,
                'displayPhone' => $result->phone,
                'displayName' => $displayName,
            ];
        });
        return response()->json($formattedResults);
    }
    public function hospitalSearch(Request $request)
    {
        // Get the search terms from the request
        $name = $request->input('term1');
        $phone = $request->input('term2');
        $query = User::query()->where('role_id', 1);

        if ($name && $phone) {
            $query
            ->where(function ($q) use ($name, $phone) {
                $q->where('name', 'LIKE', "%{$name}%")
                  ->orWhere('phone', 'LIKE', "%{$phone}%");
            });
        } elseif ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        } elseif ($phone) {
            $query->where('phone', 'LIKE', "%{$phone}%");
        }
        
        $results = $query->get();

        $formattedResults = $results->map(function ($result) {
            $displayName = $result->name;
            
            return [
                'id' => $result->id,
                'displayPhone' => $result->phone,
                'displayName' => $displayName,
            ];
        });
        return response()->json($formattedResults);
    }
    public function communityHealthWorkerSearch(Request $request)
    {
        // Get the search terms from the request
        $name = $request->input('term1');
        $phone = $request->input('term2');
        $query = User::query()->where('role_id', 2);

        if ($name && $phone) {
            $query
            ->where(function ($q) use ($name, $phone) {
                $q->where('name', 'LIKE', "%{$name}%")
                  ->orWhere('phone', 'LIKE', "%{$phone}%");
            });
        } elseif ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        } elseif ($phone) {
            $query->where('phone', 'LIKE', "%{$phone}%");
        }
        
        $results = $query->get();
        $formattedResults = $results->map(function ($result) {
            $displayName = $result->name;
            
            return [
                'id' => $result->id,
                'displayPhone' => $result->phone,
                'displayName' => $displayName,
            ];
        });
        return response()->json($formattedResults);
    }

    public function selectKid(Request $request){
        $parent_phone = $request->input('phone');
        $parentdetails = Guardian::where('phone', $parent_phone)->first();
    
        if ($parentdetails) {
            $parent_id = $parentdetails->id;
    
            $secondary_kids = KidsGuardian::where('guardian_id', $parent_id)
                               ->pluck('kid_id')
                               ->toArray();
    
            $kids = Kid::leftjoin('genders','genders.id','=','kids.gender_id')

            ->where('parent_id', $parent_id)
                    ->orWhereIn('id', $secondary_kids)
                    ->select('kids.*','genders.gender_name')
                    ->get();
    
            if ($kids->isNotEmpty()) {
                return view('hospital.parentsKid', ['kids' => $kids]);
            } else {
                $notification = array(
                    'alert-type' => 'error',
                    'message' => 'Ooops!! The parent or guardian has no kid registered in this system',
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Ooops!! The parent with the given phone number does not exist',
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function vacinateKid(){

    }
    public function vacinateKidShow($encoded_kid_id){
        $kid_id= base64_decode($encoded_kid_id);
        $kid=Kid::where('id',$kid_id)
                ->first();
                      
                
        $birthDate = Carbon::parse($kid->date_of_birth);
        $currentDate = Carbon::now();
        $days = $birthDate->diffInDays($currentDate);

        $closestAdminDays = Vaccines::select('admin_days')
            ->orderBy(DB::raw('ABS(admin_days - ?)'), 'asc')
            ->setBindings([$days])
            ->first()
            ->admin_days ?? null;
        
            $nextClosestAdminDays = null;
if ($closestAdminDays !== null) {
    $nextClosestAdminDaysRecord = Vaccines::select('admin_days')
        ->where('admin_days', '>', $closestAdminDays)
        ->orderBy('admin_days', 'asc')
        ->first();

    $nextClosestAdminDays = $nextClosestAdminDaysRecord->admin_days ?? null;
    $nextAdminDate = $birthDate->copy()->addDays($nextClosestAdminDays);
    $nextAdminDate = $nextAdminDate->format('Y-m-d');
}else{
    $nextAdminDate = null;

}

            function formatAdminDays($days) {
                if ($days === 0) {
                    return 'at birth';
                } elseif ($days < 7) {
                    return $days . ' day' . ($days > 1 ? 's' : '');
                } elseif ($days < 30) {
                    $weeks = floor($days / 7);
                    return $weeks . ' week' . ($weeks > 1 ? 's' : '');
                } else {
                    $months = floor($days / 30);
                    return $months . ' month' . ($months > 1 ? 's' : '');
                }
                
            }
            
            $formattedAdminDays = formatAdminDays($closestAdminDays);
            $formattednextAdminDays = formatAdminDays($nextClosestAdminDays);
            

            $vaccines = collect();
        if ($closestAdminDays !== null) {
            $vaccines = Vaccines::where('admin_days', $closestAdminDays)->get();
            $hospitals = User::where('role_id',1)->get();
            return view('hospital.vaccinateKid',['vaccines'=>$vaccines,
                                            'adminDays'=> $formattedAdminDays,
                                            'encoded_kid_id'=>$encoded_kid_id,
                                            'hospitals'=>$hospitals,
                                             'kid_hosp'=> $kid['hosp_user_id'],
                                             'nextAdminDate'=>$nextAdminDate,
                                            'formattednextAdminDays'=> $formattednextAdminDays]);
        }else{
            dd('no vaccine');
        }

    }
    public function index()
    {
        $receiverNumber = "+254740203067";
        $message = "This is testing from".env('APP_NAME');
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
           dd('sms sent successful');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }



}
