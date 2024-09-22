<?php
namespace App\Http\Controllers;
use App\MaterialCalculation;
use Illuminate\Http\Request;

class MaterialCalculationController extends Controller
{

   public function materialCalcutation(){
   return view('website.material_calculation');
   }

    public function index()
    {
    $data['material_calculation']=MaterialCalculation::find(1);
    return view('admin.material_calculation.index',$data);
    }

    public function store(Request $req)
    {
    $material_calculation=MaterialCalculation::find(1);
    $material_calculation->area_squire_fit=$req->area_squire_fit;
   
    $material_calculation->consuption_of_cement=$req->consuption_of_cement;
    $material_calculation->consuption_of_sand=$req->consuption_of_sand;
    $material_calculation->consuption_of_stone_ten_mm=$req->consuption_of_stone_ten_mm;
    $material_calculation->consuption_of_stone_twenty_mm=$req->consuption_of_stone_twenty_mm;
    $material_calculation->no_of_bricks=$req->no_of_bricks;
    $material_calculation->tmt_bar_consuption=$req->tmt_bar_consuption;
    $material_calculation->save();
    return redirect('view-material-calculation');
    }

    public function calculate_material(Request $req){
  
    $getData=MaterialCalculation::find(1);
    $requiredSquFit=$req->squire_area;
    $baseSquireFit=$getData->area_squire_fit;  

    $oneSqFitUsedCement=($getData->consuption_of_cement/$baseSquireFit); 
    $oneSqFitUsedSand=($getData->consuption_of_sand/$baseSquireFit); 
    $oneSqFitUsedSand10MM=($getData->consuption_of_stone_ten_mm/$baseSquireFit); 
    $oneSqFitUsedSand20MM=($getData->consuption_of_stone_twenty_mm/$baseSquireFit);   
    $oneSqFitUsedBricks=($getData->no_of_bricks/$baseSquireFit);    
    $oneTMTBarCON=($getData->tmt_bar_consuption/$baseSquireFit);

    $usedCement=$oneSqFitUsedCement*$requiredSquFit;
    $usedsand=$oneSqFitUsedSand*$requiredSquFit;
    $usedStone10MM=$oneSqFitUsedSand10MM*$requiredSquFit;
    $usedStone20MM=$oneSqFitUsedSand20MM*$requiredSquFit;
    $usedBricks=$oneSqFitUsedBricks*$requiredSquFit;
    $usedTMTBarCON=$oneTMTBarCON*$requiredSquFit;

     return array(
     'cement'=>$usedCement,
     'sand'=>$usedsand,
     'stone10MM'=>$usedStone10MM,
     'stone20MM'=>$usedStone20MM,
     'usedBricks'=>$usedBricks,
     'usedTMTBarCON'=>$usedTMTBarCON,
        );
    }
}
