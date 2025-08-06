<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userlist;
use Illuminate\Support\Facades\Validator;

class UserlistController extends Controller
{
    // get all users data
    function list(){
        return Userlist::all();
    }
    

    //just for testing purpose 


    // function adduser(Request $request){
    //     return $request->input();
    // }


// Add user functionality in database with try catch block

// public function adduser(Request $request)
// {
    
//     try {
//         $user = new Userlist;
//         $user->firstname = $request->firstname;
//         $user->lastname = $request->lastname;
//         $user->address = $request->address;
//         $user->email = $request->email;

//         $user->save();

//         return response()->json(['message' => 'User added successfully'], 200);
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }


// Update user functionality in database with try catch block

       function updateuser(Request $request){
        // return "Update user functionality is not implemented yet.";
        try{ 
        $user = Userlist::find($request->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
            return response()->json(['message' => 'User updated successfully'], 200);
         } catch (\Exception $e) {    
        
            return response()->json(['message' => 'User not updated'], 500);
        }
        
    }



    


// Delete user functionality in database 


    function deleteuser($id){
        $user = Userlist::destroy($id);
        if($user){
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }   
    }

// Search user name in database functionality 

    function searchApi($firstname){
        $user = Userlist::where('firstname','like',"%$firstname%")->get();
        if($user){
            return ['result' => $user];
        } else {
            return['result' => 'User not found'];
        }
    }



//try catch block for searchApi



//     public function searchApi($firstname)
// {
//     try {
//         $user = Userlist::where('firstname', 'like', "%$firstname%")->get();

//         if ($user->isEmpty()) {
//             return response()->json(['result' => 'User not found'], 404);
//         }

//         return response()->json(['result' => $user], 200);

//     } catch (\Exception $e) {
//         return response()->json([
//             'result' => 'Error occurred while searching',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }




// add user functionality in database with validation

public function adduser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|min:4|max:255',
        'lastname'  => 'required|string|max:255',
        'address'   => 'required|string|max:255',
        'email'     => 'required|email|unique:userlist,email',
    ]);

    
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    
    try {
        $user = new Userlist;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->email = $request->email;

        $user->save();

        return response()->json(['message' => 'User added successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


//



}
