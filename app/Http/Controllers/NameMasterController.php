<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameMasterController extends Controller
{
    function __construct() {
        $this->data['fields']['order'] = "required|numeric";
    }

    public function index()
    {
        $this->data['objects'] = ($this->model)::all();
        return view('name.master.index', $this->data);
    }

    public function edit($id)
    {
        $model = $this->model;
        $this->data['obj'] = $id ? ($this->model)::findOrFail($id) : new $model();
        return view('name.master.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $this->model::findOrFail($id)->update($this->getDbData($request));
        return redirect()->route($this->route . '.index');
    }

    public function destroy($id)
    {
        ($this->model)::findOrFail($id)->delete();
        return redirect()->route($this->route . '.index');
    }

    public function create()
    {
        return $this->edit(null);
    }

    public function store(Request $request)
    {
        $this->model::create($this->getDbData($request));
        return redirect()->route($this->route . '.index');
    }

    function getDbData($request) {
        $data = $request->validate($this->data['fields']);
        $result = [];
        foreach($this->data['fields'] as $field => $validator) {
            $result[$this->data['db_fields'][$field] ?? $field] = $data[$field];
        }
        return $result;
    }
}
