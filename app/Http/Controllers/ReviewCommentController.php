<?php
namespace App\Http\Controllers;
use App\ReviewComment;
use Illuminate\Http\Request;
use Redirect;
use DB;

class ReviewCommentController extends Controller
{
    public function store(Request $req)
    {
          $rate_save=new ReviewComment;
          $rate_save->description=$req->input('comment');
          $rate_save->product_id=$req->input('productId');
          $rate_save->rate=$req->input('rating');
          $rate_save->user_id=session()->get('logedIn');
          $rate_save->save();
          return Redirect::back()->withMessage('Profile saved!');
    }

    public function get_ajax_comment_rating(Request $request){
          $id=$request->input('id');
          $data['reviewComment']=DB::table('review_comments')
          ->select('users.name','users.img','review_comments.rate','review_comments.description')
          ->join('users','review_comments.user_id','=','users.id')
          ->where('review_comments.product_id',$id)
          ->paginate(5);
          $data['total_commpent']=count($data['reviewComment']);
         return view('website.comment_review_ajax',$data);

    }
}
