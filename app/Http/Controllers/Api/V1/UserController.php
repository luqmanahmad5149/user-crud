<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    /**
     * Retrieve all users for display.
     * @method GET
     * @route /users
     */
    public function getUsers() {
        return response()->json(new UserCollection(User::with('department')->get()), 200);
    }

    /**
     * Retrieve specific user for display.
     * @method GET
     * @route /user
     */
    public function getUser(Request $request) {
        $user = User::with('department')->where('id', $request->userNo)->first();
        
        if($user) {
            return response()->json(new UserResource($user), 200);
        }

        return response()->json([
            'status' => 'User not found!'
        ], 200);
    }

    /**
     * Handle new user creation.
     * @method POST
     * @route /user
     */
    public function postUser(Request $request) {
        try{
            $user = User::create([
                'name' => $request->userName,
                'department_id' => $request->departmentId,
            ]);
    
            return response()->json(new UserResource($user), 201);
        } catch(\Exception $e) {
            throw new GeneralException($e->getMessage(), 500);
        }
    }

    /**
     * Update existing user data.
     * @method PUT
     * @route /user/update
     */
    public function putUser(Request $request) {
        try{
            $user = User::where('id', $request->userNo)->first();
        
            if($user) {
                $user->update([
                    'name' => $request->userName,
                    'department_id' => $request->departmentNo ? $request->departmentNo : $user->department_id,
                ]);
    
                return response()->json(new UserResource($user), 201);
            } else {
                return response()->json([
                    'status' => 'User not found!'
                ], 400);
            }
    
            return response()->json(new UserResource($user), 201);
        } catch(\Exception $e) {
            throw new GeneralException($e->getMessage(), 500);
        }
    }

    /**
     * Delete existing user data.
     * @method DELETE
     * @route /user/delete
     */
    public function deleteUser(Request $request) {
        try{
            $user = User::where('id', $request->userNo)->first();
            $response = [];

            if($user) {
                $user->delete();
                $response['status'] = 'User successfully deleted!';
                $response['code'] = 200;
            } else {
                $response['status'] = 'User not found!';
                $response['code'] = 400;
            }

            return response()->json([
                'status' => $response['status']
            ], $response['code']);
        } catch(\Exception $e) {
            throw new GeneralException($e->getMessage(), 500);
        }
    }
}
