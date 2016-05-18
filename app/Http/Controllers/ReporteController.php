<?php

namespace almacen\Http\Controllers;
use TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
use almacen\Producto;
use almacen\Ingresado;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Salidaproducto;
use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        if(Auth::user()->NIV_USU==0)
        {
        $productos= Producto::get();
        return view('kardex')->with('productos',$productos);
        }
        else{
        return response('Unauthorized.', 401);
        }
    }
    public function kardexpdf($id){
        $producto= Producto::where('id','=',$id)->get();
        $query= DB::select("SELECT FEC_ING as fecha, NFC_PIN as 'Factura', NOC_PIN as 'compra','' as 'DGAA',
PRO_PIN as 'PROCEDENCIA', CAN_PIN as Entradas, '' as Salidas
FROM ingresados join ingresos on(ingresos.id=ID_ING)
where ingresados.ID_PRO=$id
UNION
SELECT FEC_SAL as fecha, '' as 'Numero de Factura', '' as 'Nº Orden de compra',DGA_SPR as 'DGAA',
DES_SPR as 'PROCEDENCIA/DESTINO', '' as Entradas, CAN_SPR as Salidas
FROM salidaproductos join salidas on(salidas.id=ID_SAL)
where salidaproductos.ID_PRO=$id ORDER BY 1

");
        $pdf = new TCPDF('P','mm', array(164,216), true, 'UTF-8', false);

        $pdf->SetTitle('Tarjeta Kardex valorado');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage();
        $pdf->Image('images/banner_opt.jpg', 15, 1, 43, 38, 'JPG', '', '', true, 250, '', false, false, false, false, false, false);
        $pdf->SetFont('','B','13');
        $pdf->SetXY(80, 30);
        $pdf->Write(0,'TARJETA KARDEX VALORADO','','',false);
        $pdf->SetXY(103, 37);
        $pdf->Write(0,'ALMACEN CENTRAL','','',false); 
        $pdf->SetFont('','B','9');
        $pdf->SetXY(15,50);
        $pdf->Write(0,'Nº DE ITEM :','','',false);
        $pdf->SetFont('','','9');
        $pdf->SetXY(43,50);
        $pdf->Write(0,$producto[0]->ITM_PRO,'','',false);
        $pdf->SetFont('','B','9');
        $pdf->SetXY(15,57);
        $pdf->Write(0,'DESCRIPCION :','','',false);
        $pdf->SetFont('','','9');
        $pdf->SetXY(43,57);
        $pdf->Write(0,$producto[0]->DES_PRO,'','','',true);
        $i=1;
        $saldos=0;
        foreach ($query as $q ) {
            $saldos= $saldos + $q->Entradas - $q->Salidas;
    if ($i==1){
     $html = 
     '<font size="6"> <br/><br/><br/><br/><table border="1" cellspacing="0" cellpadding="2">
    <tr rowspan="2">
    <th rowspan="2" align="center" width="10%"><b>FECHA <br/>INGRESO </b></th>
    <th rowspan="2" align="center" width="12%"><b>Nº REMISION<br/>O FACTURA</b></th>
    <th rowspan="2" align="center" width="13%"><b>Nº ORDEN DE<br/>COMPRA </b></th>
    <th rowspan="2" align="center" width="10%"><b>Nº FORM DGAA</b></th>
    <th padding="5" rowspan="2" align="center" width="30%"><b>PROCEDENCIA / DESTINO </b></th>
    <th align="center" colspan="3" width="25%"><b>CANTIDADES </b>
    </th>
    </tr>
    <tr align="center">
    <th align="center" ><font size="4"><b>ENTRADAS</b></font></th>
    <th align="center" ><font size="4"><b>SALIDAS</b></font></th>
    <th align="center" ><font size="4"><b>SALDOS</b></font></th>
    </tr>
    <tr>
        <th>'.\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $q->fecha)->format('d/m/Y').'</th>
        <th>'.$q->Factura.'</th>
        <th>'.$q->compra.'</th>
        <th>'.$q->DGAA.'</th>
        <th>'.$q->PROCEDENCIA.'</th>
        <th>'.$q->Entradas.'</th>
        <th>'.$q->Salidas.'</th>
        <th>'.$saldos.'</th></tr>';
    $i++;

}else{
    $html=$html.'<tr>
        <th>'.\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $q->fecha)->format('d/m/Y').'</th>
        <th>'.$q->Factura.'</th>
        <th>'.$q->compra.'</th>
        <th>'.$q->DGAA.'</th>
        <th>'.$q->PROCEDENCIA.'</th>
        <th>'.$q->Entradas.'</th>
        <th>'.$q->Salidas.'</th>
        <th>'.$saldos.'</th></tr>';
}
}
 $html=$html.'</table></font>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetXY(10,190);
        $pdf->Write(0,'OBSERVACIONES : ..............................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................','','',false);
        $pdf->SetFont('','','9');
        $pdf->Output('reportekardex.pdf');

    
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salidaspdf ()
    {   $almacen= Almacen::get();
      
        $producto= Producto::get();
         
        $pdf = new TCPDF('P','mm','LETTER', true, 'UTF-8', false);

        $pdf->SetTitle('Reporte de saldos');  
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage();
        $pdf->Image('images/banner_opt.jpg', 13, 1, 40, 38, 'JPG', '', '', true, 250, '', false, false, false, false, false, false);
        $pdf->Line ( 53, 25,205,25,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $pdf->SetFont('','B','12');
        $pdf->SetXY(150, 20);
        $pdf->Write(0,'REPORTE DE SALDOS','','',false);
        $pdf->SetXY(135, 25);
        $pdf->Write(0,'Procuradoria General del Estado','','',false); 
        foreach ($almacen as $almacenes) {
            $html='<br/><br/><br/><br/><font size="10"><label>ALMACEN:'.$almacenes->NOM_ALM.'</label><br/>';
            $idalm=$almacenes->id;

            $rubro= Rubro::where('ID_ALM','=',$idalm)->get();
            foreach ($rubro as $rubros) {
                $html=$html.'<br/><label style="padding-left:400px;">RUBRO:'.$rubros->NOM_RUB.'</label><br/>';
                $idrub=$rubros->id;
                $producto= Producto::where('ID_RUB','=',$idrub);
                $i=1;
                foreach ($producto as $productos) {
                if($i==1){$html = 
     '<font size="6"> <br/><br/><br/><br/><table border="1" cellspacing="0" cellpadding="2">
    <tr >
    <th  align="center" width="10%"><b>ITEM <br/>PRODUCTO </b></th>
    <th  align="center" width="12%"><b>DESCRIPCION<br/>OPRODUCTO</b></th>
    <th  align="center" width="13%"><b>PRECIO<br/>UNITARIO </b></th>
    <th  align="center" width="10%"><b>CANTIDAD EN<br/>STOCK</b></th>
    </tr>
    <tr>
        <th>'.$productos->ITM_PRO.'</th>
        <th>'.$productos->DES_PRO.'</th>
        <th>'.$productos->PUN_PRO.'</th>
        <th>'.$productos->CAN_PRO.'</th>
    </tr>';
    $i++;

}else{
    $html=$html.'<tr>
        <th>'.$productos->ITM_PRO.'</th>
        <th>'.$productos->DES_PRO.'</th>
        <th>'.$productos->PUN_PRO.'</th>
        <th>'.$productos->CAN_PRO.'</th>
    </tr>';
}
}
 $html=$html.'</table></font>';
            }
      
        $pdf->writeHTML($html, true, false, true, false, '');

        }

        $pdf->Output('reportekardex.pdf');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
