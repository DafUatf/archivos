<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comprobante;

class ComprobanteController extends Controller
{
    private $comprobante;
    public function __construct(Comprobante $comprobante){
        $this->comprobante = $comprobante;
        $this->middleware('auth');
    }
    public function index(comprobante $comprobante)
    {
        $title = "Lista de comprobantes";
        //$comprobantes = $this->comprobante->all();
        $comprobantes = $this->comprobante->orderBy('id', 'asc')->paginate(10);

        return view('comprobante.index', compact('comprobantes', 'title'));
    }
    public function ingresar()
    {
        $comprobantes = $this->comprobante->orderBy('id', 'asc')->get();
        return view('welcome', compact('comprobantes'));
    }
    public function create()
    {
        $title = 'Formulario de Registro';
        $tipo_archivos = ['C-31-CI','C-31-SI','C-21-CI', 'C-21-SI', 'DIARIO', 'REGURALIZACION'];
        return view('comprobante.create-edit', compact('title', 'tipo_archivos'));
    }
    public function store(Request $request)
    {
       
//  con esto cambia a mayusculas pero sale error de validaciones
        $comp = new Comprobante($request->all());
        $comp->cod_archivo = strtoupper($request->cod_archivo);

//COMPRUEBA QUE NO EXISTA UN CODIGO ARCHIVO EXISTENTE
        $comprobantes = $this->comprobante->all();
        foreach ($comprobantes as $co) {
            $cod= strtoupper($request->input('cod_archivo'));
             if($cod == $co->cod_archivo)
                return redirect()->route('comprobante.create')->with('sms', 'El codigo de archivo ya existe');
        }
        $a = $request->input('fecha_despacho');
        $b = $request->input('fecha_recepcion');
        
        if($a>$b && $b!="")
            return redirect()->route('comprobante.create')->with('sms', 'LA FECHA DESPACHO NO DEBE SER MAYOR A LA FECHA DE RECEPCION');
        else
            $comp->save();
        
        if($comp)
            return redirect()->route('comprobante.index')->with('sms', 'Se registro el Comprobante Correctamente');
        else
            return redirect()->route('comprobante.create')->with('sms', 'Error en el Registro');
    }
    public function show($id)
    {
        $compro = $this->comprobante->find($id);
        $title = "Eliminar Registro: {$compro->cod_archivo}";
        return view('comprobante.show', compact('compro', 'title'));
    }
    public function edit($id)
    {
        $com = $this->comprobante->find($id);
        $title = "Formulario para Editar {$com->cod_archivo}";
        $tipo_archivos = ['C-31-CI','C-31-SI','C-21-CI', 'C-21-SI', 'DIARIO', 'REGURALIZACION'];
        return view('comprobante.create-edit', compact('title', 'tipo_archivos', 'com'));
    }
    public function update(Request $request, $id)
    {
        //recuperar todos los datos del formulario
        $actu = $request->all();
        //recuperar el item para actualizar
        $com = \App\Model\Comprobante::find($id);
        $com->fill($actu);
        $c = 0;
        $comprobantes = $this->comprobante->all();
        foreach ($comprobantes as $co) {
            $com->cod_archivo= strtoupper($request->input('cod_archivo'));
            if($com->cod_archivo == $co->cod_archivo){
                $c++;
                if ($c >1)
                    return redirect()->route('comprobante.edit', $id)->with('sms', 'El codigo de archivo ya existe');
            }
                
        }
        $a = $request->input('fecha_despacho');
        $b = $request->input('fecha_recepcion');
        if($a>$b && $b!="")
            return redirect()->route('comprobante.edit',$id)->with('sms', 'LA FECHA DESPACHO NO DEBE SER MAYOR A LA FECHA DE RECEPCION');
        else{
            $com->save();
            if($com)
                return redirect()->route('comprobante.index')->with('sms', 'La Edicion se Realizo Correctamente');
            else
                return redirect()->route('comprobante.edit', $id)->with(['errors' => 'Falta Editar']);
        }
    }
    public function destroy($id)
    {
        $comprob = $this->comprobante->find($id);
        $presta=\DB::select("DELETE FROM prestamos WHERE id =".$id);
        $delete = $comprob->delete();
        if($delete)
            return redirect()->route('comprobante.index')->with('sms', 'La eliminacion del Archivo se realizo Correctamente');
        else
            return redirect()->route('comprobante.show')->with(['errors'=> 'Falta eliminar registro']);
    }
}
