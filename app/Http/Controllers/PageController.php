<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public $perPage = 10;

    public function __construct()
    {
        if (request()?->has('show')) {
            $this->perPage = request()->show;
        }
    }
    public function users()
    {
        return view('users', [
            'users' => User::with('department')->with('position')->with('salary')->paginate($this->perPage),
            'departments' => Department::orderBy('id')->get()
        ]);
    }

    public function department(Request $request, Department $department)
    {
        return view('department', [
            'departments' => Department::orderBy('id')->get(),
            'users' => $department->users
        ]);
    }

    public function export()
    {
        $data = User::with('department')
            ->with('position')
            ->with('salary')
            ->get(['name', 'email', 'password', 'birthday', 'department_id', 'salary_id', 'position_id'])
            ->toArray();
        $xml = new \SimpleXMLElement('<xml version="1.1" encoding="UTF-8"/>');
        array_walk_recursive($data, array($xml, 'addChild'));

        return response($xml->asXML(), Response::HTTP_OK, ['Content-Type: text/xml']);
    }
}
