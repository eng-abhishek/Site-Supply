<?php
namespace App\Http\Controllers;
use App\TocForm;
use App\ProjectScope;
use App\State;
use App\User;
use App\IndustrialSegment;
use Illuminate\Http\Request;
use DB;
error_reporting(1);

class TocFormController extends Controller
{  

    public function getIndustrialSegment()
    {
        $indus=IndustrialSegment::orderBy('id','desc')->where(['status'=>'1','manual_status'=>'0'])->get();
        $success['industrial_segment'] = $indus;
        return  response()->json(['success' => $success,'type'=>'admin','response_code'=>200]);
    }

    public function getProjectScope(Request $req){
        if($req->keyword){
        $indus=ProjectScope::where('name','like',
          '%'.$req->keyword.'%')->get();
        }else{
        $indus=ProjectScope::orderBy('id','desc')->where('status','1')->get();
        }
       
        $success['project_scope'] = $indus;
        return response()->json(['success' => $success,'response_code'=>200]);
    }


     public function getState(){
    
     $state=State::where('status','1')->get();
     return response()->json(['success' => $state,'response_code'=>200]); 
            }

    public function storeTOCForm(Request $req){
        if($req->ind_seg_status=="1"){
        $addInduSeg = new IndustrialSegment;
        $addInduSeg->name=$req->ind_seg_name;
        $addInduSeg->manual_status='1';
        $addInduSeg->save();
        $indSegId=$addInduSeg->id;
        }else{
        $indSegId=$req->indus_seg_id;
        }

        if($req->pro_scope_status=="1"){
        $addProScope = new ProjectScope;
        $addProScope->name=$req->pro_scope_name;
        $addProScope->save();
        $projectScopeId=$addProScope->id;
        }else{
        $projectScopeId=$req->project_id;
        }

        $toc=new TocForm;
        $toc->company_name=$req->company_name;
        $toc->indus_seg_id=$indSegId;
        $toc->project_id=$projectScopeId;

        $toc->contact_person=$req->contact_person;
        $toc->mail_id=$req->mail_id;
        $toc->contact_no=$req->contact_no;
        $toc->current_status_enquery=$req->current_status_enquery;
        $toc->dealer=$req->dealer;
        $toc->user_id=$req->user_id;

        $toc->address_of_ins=$req->address_of_ins;
        $toc->state_of_inst=$req->inst_state_id;
        $toc->city_of_inst=$req->inst_city_name;
        $toc->inst_zip_code=$req->inst_zip_code;

        $toc->address_of_f_inst=$req->address_of_f_inst;
        $toc->state_of_final=$req->final_state_id;
        $toc->city_of_final=$req->final_city_name;
        $toc->final_zip_code=$req->final_zip_code;
        $toc->save();

        return response()->json(['success' =>'TOC Form Add Success Full','response_code'=>200]);
    }

    public function trackTOC(Request $req){
    if($req->type=='admin'){

          if($req->filter){
         
          $trackTOC=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->orderBy('toc_forms.id','desc')
          ->where('toc_forms.status','like','%'.$req->filter.'%')
          ->orwhere('users.name','like','%'.$req->filter.'%')
          ->orwhere('toc_forms.company_name','like','%'.$req->filter.'%')
          ->get();
          }else{

          $trackTOC=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->orderBy('toc_forms.id','desc')
          ->get();

          }  
      

    $success['trackTOC'] = $trackTOC;

    return response()->json(['success' => $success,'response_code'=>200]); 
    
    }elseif($req->type=='user'){


    if($req->filter){

 $trackTOC=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->orderBy('toc_forms.id','desc')
          ->where(['toc_forms.user_id'=>$req->user_id])
          ->orwhere('toc_forms.status','like','%'.$req->filter.'%')
          ->orwhere('users.name','like','%'.$req->filter.'%')
          ->orwhere('toc_forms.company_name','like','%'.$req->filter.'%')
          ->get();
    
            }else{

           $trackTOC=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where('toc_forms.user_id',$req->user_id)
          ->orderBy('toc_forms.id','desc')
          ->get();

           }  

    if($trackTOC[0]->id){

    $success['trackTOC'] = $trackTOC;
    return response()->json(['success' => $success,'response_code'=>200]);    

    }else{
    return response()->json(['error' =>'Please Enter Valide User Id','response_code'=>401]);
    }
    }else{
    return response()->json(['error' =>'Please Enter Valide Type','response_code'=>401]);
    }
    }

    public function tocDetails(Request $req){
    
    $tocDetails=TocForm::where('id',$req->toc_id)->get();

    if($tocDetails[0]->id){

    if($req->type=='admin'){

    $trackTOCDataDetails=DB::table('toc_forms')
          ->select('toc_forms.state_of_inst','toc_forms.city_of_inst','toc_forms.state_of_final','toc_forms.city_of_final','toc_forms.inst_zip_code','toc_forms.final_zip_code','toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status','toc_forms.toc_no')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where('toc_forms.id',$req->toc_id)
          ->orderBy('toc_forms.id','desc')
          ->get();
    
    $success['tocDetail']=$trackTOCDataDetails;

    $tocId=TocForm::find($req->toc_id);
    $tocId->color_status='1';
    $tocId->update();

    return response()->json(['success' => $success,'response_code'=>200]);

    }elseif($req->type=='user'){

    $userTocDetails=TocForm::where(['id'=>$req->toc_id,'user_id'=>$req->user_id])->get();

    if($userTocDetails[0]->id){

          $trackTOCDataDetails=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status','toc_forms.toc_no')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where(['toc_forms.id'=>$req->toc_id,'toc_forms.user_id'=>$req->user_id])
          ->orderBy('toc_forms.id','desc')
          ->get();
    $success['tocDetail']=$trackTOCDataDetails;

    $tocId=TocForm::find($req->toc_id);


    $tocId->color_status='1';
    $tocId->update();
    return response()->json(['success' => $success,'response_code'=>200]);

    }else{
    return response()->json(['error' =>'Please Enter Valide User Id','response_code'=>401]);
    }

    }else{
    return response()->json(['error' =>'Please Enter Valide Type','response_code'=>401]);
    }

    }else{
    return response()->json(['error' =>'Please Enter Valide TOC Id','response_code'=>401]);
    }
    }

    public function tocRequest(Request $req){
    if($req->type=='admin'){
          $trackTOCDataDetails=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where('toc_forms.status','Pending')
          ->orderBy('toc_forms.id','desc')
          ->get();
           $success['tocDetail']=$trackTOCDataDetails;
          return response()->json(['success' => $success,'response_code'=>200]);
            
           }elseif($req->type=='user'){

             $trackTOCDataDetails=DB::table('toc_forms')
             ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where(['toc_forms.user_id'=>$req->user_id,'toc_forms.status'=>'Pending'])
          ->orderBy('toc_forms.id','desc')
          ->get();

    if($trackTOCDataDetails[0]->id){

    $success['tocDetail'] = $trackTOCDataDetails;
    return response()->json(['success' => $success,'response_code'=>200]);    

    }else{
    return response()->json(['error' =>'Please Enter Valide User Id','response_code'=>401]);
    }
    }else{

    return response()->json(['error' =>'Please Enter Valide Type','response_code'=>401]);

    }
    }
 
     public function approvedRequest(Request $req){
     $toc=TocForm::find($req->toc_id);
     if($toc->id){
     if($req->status=="Approved"){

      $upperCMP=strtoupper(substr($toc->company_name,0,2));
      $userData=User::find($toc->user_id);
      $userName=strtoupper(substr($userData->name,0,2));
      $tocNo='TR/'.$upperCMP.'/'.$userName.date('M/d');
      $checkAppStatus=TocForm::where(['status'=>'Approved','inst_zip_code'=>$req->zip_code])->get();

      if($checkAppStatus[0]->id){

      $success['result']['message']='TOC Is Already Approved On This Zip Code','response_code';

       return response()->json(['success' =>$success,'response_code'=>200]); 
       }else{

      $updateToc=TocForm::find($req->toc_id);
      $updateToc->status='Approved';
      $updateToc->toc_no=$tocNo;
      $updateToc->update();

      $success['result']['message']='Your request approved successfully';
      $success['result']['toc_app_no']=$tocNo;

      return response()->json(['success' =>$success,'response_code'=>200]); 

      }
      }elseif($req->status=="Rejected"){
      $updateToc=TocForm::find($req->toc_id);
      $updateToc->status='Rejected';
      $updateToc->toc_no='';
      $updateToc->update();
      return response()->json(['success' =>'your request reject successfully','response_code'=>200]);  
      }else{     
      return response()->json(['error' =>'Please Enter Valide Status','response_code'=>401]);
      }
      }else{
      return response()->json(['error' =>'Please Enter Valide TOC Id','response_code'=>401]);
      }
      }

    /*----------  Show How Many Requ Come On Same Zip Code ------*/

    public function check_toc_on_zipCode(Request $req){
           $trackTOC=DB::table('toc_forms')
          ->select('toc_forms.id','toc_forms.company_name','toc_forms.address_of_ins','toc_forms.address_of_f_inst','toc_forms.contact_person','toc_forms.mail_id','toc_forms.contact_no','toc_forms.current_status_enquery','toc_forms.dealer','toc_forms.color_status','users.name as seler_name','project_scopes.name as project_scope_name','industrial_segments.name as industrial_segments_name','toc_forms.created_at','toc_forms.status')
          ->join('project_scopes','toc_forms.project_id','=','project_scopes.id')
          ->join('industrial_segments','toc_forms.indus_seg_id','=','industrial_segments.id')
          ->join('users','toc_forms.user_id','=','users.id')
          ->where('toc_forms.inst_zip_code',$req->zip_code)
          ->orderBy('toc_forms.id','desc')
          ->get();
          return response()->json(['success' =>$trackTOC,'response_code'=>200]);  
    }
 
}
