<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comprobante;
use App\Model\Prestamo;
use App\Model\Persona;

class PrestamoController extends Controller
{
    private $prestamo;
    public function __construct(Prestamo $prestamo, Comprobante $comprobante, Persona $persona){
        $this->prestamo = $prestamo;
        $this->comprobante = $comprobante;
        $this->persona = $persona;
        $this->middleware('auth');
    }
    public function index()
    {
        $title = "Lista de Prestamos";
        $prestamos = $this->prestamo->orderBy('id', 'asc')->paginate(10);
        return view('prestamo.index', compact('prestamos', 'title'));
    }
    public function create()
    {
        $title = 'Efectuar Prestamo';
        return view('prestamo.create', compact('title'));
    }
    public function store(Request $request)
    {
        $c = 0;
        $p = 0;
        $pdip = $request->input('persona_dip');
        $ccod = $request->input('comprobante_cod_archivo');
        $pers = $this->persona->orderBy('id', 'asc')->get();
        $ppp = $this->prestamo->orderBy('id', 'asc')->get();
        $pre = new Prestamo($request->all());
        $pre->unidad = strtoupper($request->unidad);
            $pre->fecha_devolucion = '0000-00-00';
            $pre->observacion = $pre->observacion.' | '.$pre->observacion2;
        
        foreach ($pers as $per) {
            //control de la existencia de las personas apartir de 6 caracteres
            if($per->dip == $pdip."         "||$per->dip == $pdip."        "||$per->dip == $pdip."       "||$per->dip == $pdip."      "||$per->dip == $pdip."     "||$per->dip == $pdip."    "||$per->dip == $pdip."   "||$per->dip == $pdip."  "||$per->dip == $pdip." "||$per->dip == $pdip)
                $c++; 
        }
        foreach ($ppp as $pp) {
            //control de la existencia de prestamo de archivo por el codigo
            if($pp->comprobante_cod_archivo == $ccod)
                $p++; 
        }
        //PREGUNTA SE EXISTE LA PERSONA Y QUE EL ARCHIVO NO SE AYA REGISTRADO
        if($c != 0&&$p<=0)
            $pre->save();
        else
            return redirect()->route('prestamo.create')->with('sms', 'ERROR DE REGISTRO, LA PERSONA NO EXISTE O EL ARCHIVO YA FUE REGISTRADO');
        if($pre)
                    return redirect()->route('prestamo.index')->with('sms', 'Se registro correctamente');
        else
                    return redirect()->route('prestamo.create')->with('sms', 'ERROR DE REGISTRO');            
    }
    public function show($id)
    {
        $presta = $this->prestamo->find($id);
        $title = "Eliminar Registro: {$presta->comprobante_cod_archivo}";
        return view('prestamo.show', compact('presta', 'title'));
    }

    public function edit($id)
    {
        $pres = $this->prestamo->find($id);
        $title = "Editar Prestamo {$pres->comprobante_cod_archivo}";    
        return view('prestamo.edit', compact('title', 'pres'));
    }

    public function update(Request $request, $id)
    {
        $actuali = $request->all();
        //recuperar el item para actualizar
        $pres = \App\Model\Prestamo::find($id);
        $pres->fill($request->all());
        $pres->unidad = strtoupper($request->unidad);
        //CONTROL DE LAS FECHAS DE DESPACHO Y RECEPCION
        $a = $request->input('fecha_prestamo');
        $b = $request->input('fecha_devolucion');
        $m = $request->input('observacion2');
        $pres->observacion = $pres->observacion.' | '.$m;
        //verifica si la edicion de la persona es correcta y que ademas exista en la base de datos
        $c = 0;
        $p = 0;
        $pers = $this->persona->orderBy('id', 'asc')->get();
        $ppp = $this->prestamo->orderBy('id', 'asc')->get();
        $pdip = $request->input('persona_dip');
        $ccod = $request->input('comprobante_cod_archivo');
        foreach ($pers as $per) {
            //control de la existencia de las personas apartir de 6 caracteres
            if($per->dip == $pdip."         "||$per->dip == $pdip."        "||$per->dip == $pdip."       "||$per->dip == $pdip."      "||$per->dip == $pdip."     "||$per->dip == $pdip."    "||$per->dip == $pdip."   "||$per->dip == $pdip."  "||$per->dip == $pdip." "||$per->dip == $pdip)
                $c++; 
        }
        foreach ($ppp as $pp) {
            //control de la existencia de prestamo de archivo por el codigo
            if($pp->comprobante_cod_archivo == $ccod)
                $p++; 
        }
//CONTROL DE LAS FECHAS DE DESPACHO Y RECEPCION
        if($b != ''){
            if($a>$b)
                return redirect()->route('prestamo.edit',$id)->with('sms', 'LA FECHA DESPACHO NO DEBE SER MAYOR A LA FECHA DE RECEPCION');
            else{
                if($c != 0&&$p<=1) 
                    $pres->save();
                else
                    return redirect()->route('prestamo.edit',$id)->with('sms', 'ERROR DE EDICION, LA PERSONA NO SE ENCUENTRA REGISTRADA O EL CODIGO DE ARCHIVO NO EL LA MISMA');
                if($pres)
                    return redirect()->route('prestamo.index')->with('sms', 'EDICION DE PRESTAMO CORRECTAMENTE');
                else
                    return redirect()->route('prestamo.edit', $id)->with(['errors' => 'Falta Editar']);
            }
        }
        else{
            $pres->fecha_devolucion = '0000-00-00';
            if($c != 0&&$p<=1) 
                    $pres->save();
            else
                    return redirect()->route('prestamo.edit',$id)->with('sms', 'ERROR DE EDICION, LA PERSONA NO SE ENCUENTRA REGISTRADA, EL ARCHIVO YA FUE REGISTRADO');
                if($pres)
                    return redirect()->route('prestamo.index')->with('sms', 'EDICION DE PRESTAMO CORRECTAMENTE');
                else
                    return redirect()->route('prestamo.edit', $id)->with(['errors' => 'Falta Editar']);
        }
    }
    public function destroy($id)
    {
        $prestam = $this->prestamo->find($id);
        $delete = $prestam->delete();
        if($delete)
            return redirect()->route('prestamo.index');
        else
            return redirect()->route('prestamo.show')->with(['errors'=> 'Falta eliminar registro']);
    }
}
