<?php

namespace App\Http\Controllers;
use App\MedicineCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use DB;
class MedicineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    //Create New post
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required:MedicineCategory',
            'description' => 'required:MedicineCategory',
        ]);
        if ($validator->fails()) {
            $response["Error"] = 'Incomplete Params';

            return response()->json($response);
        } else{

            try{

                $result = MedicineCategory::create($request->all());

                $response["SUCCESS"] = 'Data Added Successfully';

                return response()->json($response);

            }  catch( QueryException  $exception){
                $errorInfo = $exception->errorInfo;

                $response["Error"] = $errorInfo;
                return response()->json($response);

            }

        }

    }


    //update post
    public function updateUser(Request $request,$id)
    {
        $category = MedicineCategory::find($id);
        $category->update($request->all());
        return response()->json($category);




        $validator = Validator::make($request->all(), [
            'category_name' => 'required:MedicineCategory',
            'description' => 'required:MedicineCategory',
        ]);
        if ($validator->fails()) {
            $response["Error"] = 'Incomplete Params';

            return response()->json($response);
        } else{

            try{

                $category = MedicineCategory::find($id);
                $category->update($request->all());
                $response["SUCCESS"] = 'Data Updated Successfully';

                return response()->json($response);

            }  catch( QueryException  $exception){
                $errorInfo = $exception->errorInfo;

                $response["Error"] = $errorInfo;
                return response()->json($response);

            }

        }

    }


    // for delete
    public function deleteUser($id)
    {
        $post = User:: find($id);
        $post->delete();

        return response()->json('removed Successfully');

    }

    // for view post
    public function viewUser($id)
    {
        $post = MedicineCategory:: find($id);
        return response()->json($post);

    }

    // lIst of our post

    public function index()
    {
        $response =    DB::table('MedicineCategory')->get();

        return response()->json($response);
    }
}

