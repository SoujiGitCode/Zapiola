<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolRequest;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Module;
use App\Audits;
use App\Submodule;
use App\Permission;
use Flash;
use Session;
use Redirect;
use Auth;
use Illuminate\Http\Request;

class RolController extends Controller {

    /**
     * Validate session
     */
    public function __construct() {
        $this->middleware('admin');
        $this->middleware('role:3');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            return view('admin.rol');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display list resources
     * @return type
     */
    public function lists() {
        try {
            $rol = Roles::where('id', '!=', '1')->orderBy('id', 'desc')->get();
            $json = array();
            foreach ($rol as $rs):
                $json[] = array(
                    'id' => $rs->id,
                    "name" => $rs->name,
                    "created_at" => date("m-d-Y H:i:s", strtotime($rs->created_at)),
                );
            endforeach;
            return response()->json($json);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $request) {
        try {
            if ($request->ajax()) {
                $rol=Roles::create($request->all());
                $this->audit('Registro de rol ID #' . $rol->id);
                $modules = Module::all();
                foreach ($modules as $rs):
                    Permission::create([
                        'rol_id' => $rol->id,
                        'module' => $rs->id,
                        'submodule' => '0',
                        'type' => '1',
                        'status' => '1'
                    ]);
                endforeach;
                $submodules = Submodule::all();
                foreach ($submodules as $rs):
                    Permission::create([
                        'rol_id' => $rol->id,
                        'module' => $rs->module_id,
                        'submodule' => $rs->id,
                        'type' => '2',
                        'status' => '1'
                    ]);
                endforeach;
                return response()->json([
                            "msg" => "creado"
                ]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            if ($request->ajax()) {
                $rol = Roles::find($id);
                $rol->fill($request->all());
                $rol->save();
                $this->audit('Actualización de datos de rol ID #' . $id);
                return response()->json(["msg" => "Actualizado"]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
    }

    /**
     * Display a listing of the permissions role
     *
     * @return \Illuminate\Http\Response
     */
    public function permission($id) {
        try {
            $rol = Roles::find($id);
            if (isset($rol) == 0)
                return Redirect::to('rol');
            return view('admin.permission', ['rol' => $rol]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display list of the permissions
     * @param type $id
     * @return boolean
     */
    public function permission_lists($id) {
        try {
            $moduless = Permission::where('rol_id', $id)->where('type', '1')->get();
            $array_modules = array();
            foreach ($moduless as $rs):
                $array_submodules = array();
                $submoduless = Permission::where('rol_id', $id)->where('type', '2')->where('module', $rs->module)->get();
                foreach ($submoduless as $row):
                    $submodules = Submodule::find($row->submodule);
                    $array_submodules[] = array(
                        "id" => $row->id,
                        "nombre" => $submodules->name,
                        "status" => $row->status,
                        "completed" => 'false'
                    );
                endforeach;
                $modules = Module::find($rs->module);
                $array_modules[] = array(
                    "id" => $rs->id,
                    "id_modulo" => $modules->id,
                    "nombre" => $modules->name,
                    "class" => $modules->class,
                    "expanded" => "true",
                    "submodulo" => $array_submodules,
                    "status" => $rs->status
                );
            endforeach;
            return response()->json($array_modules);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Assign module permission
     * @param Request $request
     * @return boolean
     */
    public function assign(Request $request) {
        try {
            if ($request['type'] == '1') {
                Permission::where('rol_id', $request['role'])
                        ->where('module', $request['module'])
                        ->update(['status' => '1']);
                $modules = Module::find($request['module']);
                $this->audit('Asignar permisos de acceso a módulo ' . $modules->name . '  en el  Rol #' . $request->role);
                return response()->json(["msg" => "Módulo Activado"]);
            } else {
                $permission = Permission::find($request['id']);
                $permission->fill([
                    'status' => '1',
                ]);
                $permission->save();
                $submodules = Submodule::find($permission->submodule);
                $this->audit('Asignar permisos de acceso a submódulo ' . $submodules->name . '  en el  Rol #' . $permission->id_role);
                return response()->json(["msg" => "Submódulo Activado"]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Remove module permission
     * @param Request $request
     * @return boolean
     */
    public function remove(Request $request) {
        try {
            if ($request['type'] == '1') {
                $permission = Permission::find($request['id']);
                Permission::where('rol_id', $request['role'])
                        ->where('module', $request['module'])
                        ->update(['status' => '2']);
                $modules = Module::find($request['module']);
                $this->audit('Retirar permisos de acceso a módulo ' . $modules->name . '  en el  Rol #' . $request->role);
                return response()->json(["msg" => "Módulo Retirado"]);
            } else {
                $permission = Permission::find($request['id']);
                $permission->fill([
                    'status' => '2',
                ]);
                $permission->save();
                $submodules = Submodule::find($permission->submodule);
                $this->audit('Retirar permisos de acceso a submódulo ' . $submodules->name . '  en el  Rol #' . $permission->id_role);
                return response()->json(["msg" => "Submódulo Retirado"]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Audit user
     * @return type
     */
    public function audit($activity) {
        try {
            Audits::create([
                'activity' => $activity,
                'ip' => $this->getIp(),
                'user_id' => Auth::guard('admin')->User()->id
            ]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Get Ip User
     * @return type
     */
    public function getIp() {
        try {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}
