<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    protected $access_token;

    public function __construct()
    {
        $this->access_token = Http::get('https://bx-oauth2.aasc.com.vn/bx/oauth2_token/local.66b323aa33f246.34679335')->json()['token'];
    }

    protected function getEmployees($id = null)
    {
        if ($id == null) {
            $response = Http::get("https://b24-oel3e0.bitrix24.vn/rest/user.get", [
                'auth' => $this->access_token,
            ])->json();
        }else{
            $response = Http::get("https://b24-oel3e0.bitrix24.vn/rest/user.get", [
                'auth' => $this->access_token,
                'ID' => $id,
            ])->json();
        }

        return $response['result'];
    }

    public function index()
    {
        $employees = $this->getEmployees();
        return view('index', compact('employees'));
    }

    public function list()
    {
        $employees = $this->getEmployees();
        if ($employees == []) {
            $res = [
                'status' => false,
                'data' => null,
                'message' => 'Fail',
            ];
            return response()->json($res,200);
        }else{
            return view('partials.data', compact('employees'));
        }

    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $employee = $this->getEmployees($id);
        // dd($employee);
        if ($employee == []) {
            $res = [
                'status' => false,
                'message' => 'Fail',
            ];
        }else{
            $res = [
                'status' => true,
                'data' => $employee,
                'message' => 'Success',
            ];
        }
        return response()->json($res,200);
    }
}
