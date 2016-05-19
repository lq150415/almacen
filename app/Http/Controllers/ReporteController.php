<?php

namespace almacen\Http\Controllers;
use TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
use Carbon\Carbon;
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
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->SetMargins(15, 15, 10);
        $pdf->AddPage();
        $pdf->Image('images/banner_opt.jpg', 13, 1, 40, 38, 'JPG', '', '', true, 250, '', false, false, false, false, false, false);
        $pdf->Line ( 53, 25,205,25,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $pdf->SetFont('','B','12');
        $pdf->SetXY(150, 20);
        $pdf->Write(0,'REPORTE DE SALDOS','','',false);
        $pdf->SetXY(135, 25);
        $usuario = 'Nombre: '.Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU.' CARGO: '.Auth::user()->CAR_USU.' AREA: '.Auth::user()->ARE_USU.' FECHA: '.Carbon::now();
        $pdf->Write(0,'Procuradoria General del estado','','',false); 
        $pdf->SetXY(70,30);
        $pdf->SetFont('','','12');
        $pdf->write2DBarcode ( $usuario, 'QRCODE,M', 185, 35, 15, 15, '','','');
        $html='<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    th.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        
        background-color: #ccffcc;
    }
    th.first-danger {
        color: maroon;
        font-family: helvetica;
        font-size: 8pt;
        font-strecht: bold;
        background-color: #ff6066;
    }
    th.second {
        color: #6c3300;
        font-family: helvetica;
        font-size: 8pt;
        
        background-color: #fbdb65;
    }
    tr.title{
        background-color: #bab3b2;
    }
    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>';    $sum=0;
        foreach ($almacen as $almacenes) {
            $html=$html.'
            <br/><br/><font size="10"><label><b>ALMACEN: </b>'.$almacenes->NOM_ALM.'</label></font><br/>';
            $idalm=$almacenes->id;

            $rubro= Rubro::where('ID_ALM','=',$idalm)->get();
            foreach ($rubro as $rubros) {
                $html=$html.'<br/><font size="10"><label ><b>RUBRO: </b>'.$rubros->NOM_RUB.'</label></font><br/>';
                $idrub=$rubros->id;
                $producto= Producto::where('ID_RUB','=',$idrub)->get();
                $i=1;
            
                foreach ($producto as $productos) {
                    $sum=$sum+($productos->CAN_PRO * $productos->PUN_PRO);
                if($i==1)
                    {
                        if($productos->CAN_PRO <= 10)
                        {
                            $ab='first-danger';
                        }else
                        {
                            $ab='first' ;   
                        }

                        $html =$html. 
                        '<font size="8"> <br/><table border="1" cellspacing="0" cellpadding="6" class="">
                        <tr class="title" >
                            <th width="10%"><b>ITEM </b></th>
                            <th width="60%"><b>DESCRIPCION DEL PRODUCTO</b></th>
                            <th width="10%"><b>PRECIO </b></th>
                            <th width="8%" class="first"><b>STOCK</b></th>
                            <th width="12%" class="second"><b>IMPORTE BS.</b></th>
                        </tr>
                        <tr>
                            <th>'.$productos->ITM_PRO.'</th>
                            <th>'.$productos->DES_PRO.'</th>
                            <th>'.$productos->PUN_PRO.'</th>
                            <th class="'.$ab.'">'.$productos->CAN_PRO.'</th>
                            <th class="second">'.($productos->CAN_PRO*$productos->PUN_PRO).'</th>
                        </tr>';
                        $i++;

                    }else
                    {
                        if($productos->CAN_PRO <= 10)
                        {
                            $ab='first-danger';
                        }else
                        {
                            $ab='first' ;   
                        }
                        $html=$html.'<tr>
                                        <th>'.$productos->ITM_PRO.'</th>
                                        <th>'.$productos->DES_PRO.'</th>
                                        <th>'.$productos->PUN_PRO.'</th>
                                        <th class="'.$ab.'">'.$productos->CAN_PRO.'</th>
                                        <th class="second">'.($productos->CAN_PRO*$productos->PUN_PRO).'</th>
                                    </tr>';
                    }
                    }
                        $html=$html.'</table></font>';

            }
      

        }
        $html2='<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    th.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        
        background-color: #ccffcc;
    }
    th.first-danger {
        color: maroon;
        font-family: helvetica;
        font-size: 8pt;
        font-strecht: bold;
        background-color: #ff6066;
    }
    th.second {
        color: #6c3300;
        font-family: helvetica;
        font-size: 8pt;
        
        background-color: #fbdb65;
    }
    tr.title{
        background-color: #bab3b2;
    }
    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    th.total{
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        border-right: 1px solid #000;
         border-left: none;
           border-style:hidden;
         color: maroon;
        font-family: helvetica;
        font-size: 8pt;
        font-strecht: bold;
        background-color: #ff6066;
    }
    
    th.total2{
         border-top: 1px solid #000;
         border-left: 1px solid #000;
         border-bottom: 1px solid #000;
         border-right: none;
         border-style:hidden;
       color: maroon;
        font-family: helvetica;
        font-size: 8pt;
        font-strecht: bold;
        background-color: #ff6066;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>';
        $j=1;
        foreach($almacen as $almacenes)
        {   
            $idalm=$almacenes->id;
            $rubro= Rubro::where('ID_ALM','=',$idalm)->get();
            if($j==1)
            {
                $html2=$html2.'
                <font size="8"><table  border="1" cellspacing="0" cellpadding="6">
                    <tr class="title" >
                        <th><b>ALMACEN</b></th>
                        <th><b>RUBRO</b></th>
                        <th><b>CANTIDAD DE PRODUCTOS</b></th>
                        <th class="first"><b>IMPORTE</b></th>  
                    </tr>
                    <tr><th align="center" rowspan="'.count($rubro).'">'.$almacenes->NOM_ALM.'</th>';
                    $k=1;
                    foreach ($rubro as $rubros) {
                        $idrub=$rubros->id;
                        $producto2= Producto::where('ID_RUB','=',$idrub)->get();
                        $producto= DB::select("
                                SELECT sum(CAN_PRO*PUN_PRO) as TOTAL
                                from productos
                                where id_rub=$idrub
                                having sum(CAN_PRO*PUN_PRO)");
                        if($k==1)
                        {                           
                            $html2=$html2.'
                            <th>'.$rubros->NOM_RUB.'</th>
                            <th align="right" >'.count($producto2).'</th>
                            <th align="right" class="first">'.$producto[0]->TOTAL.'</th></tr>';
                            $k++;
                        }
                        else
                        {
                            $html2=$html2.'
                            <tr>
                                <th>'.$rubros->NOM_RUB.'</th>
                                <th align="right" >'.count($producto2).'</th>
                                <th align="right" class="first">'.$producto[0]->TOTAL.'</th>
                            </tr>';
                        }
                    }
                $j++;
            }
            else
            {
                $html2=$html2.'
                    <tr><th align="center" class="spaneado" rowspan="'.count($rubro).'">'.$almacenes->NOM_ALM.'</th>';
                    $k=1;
                    foreach ($rubro as $rubros) {
                        $idrub=$rubros->id;
                        $producto2= Producto::where('ID_RUB','=',$idrub)->get();
                        $producto= DB::select("
                                SELECT sum(CAN_PRO*PUN_PRO) as TOTAL
                                from productos
                                where id_rub=$idrub
                                having sum(CAN_PRO*PUN_PRO)");
                        if($k==1)
                        {                           
                            $html2=$html2.'
                            <th>'.$rubros->NOM_RUB.'</th>
                            <th align="right" >'.count($producto2).'</th>
                            <th align="right" class="first">'.$producto[0]->TOTAL.'</th></tr>';
                            $k++;
                        }
                        else
                        {
                            $html2=$html2.'
                            <tr>
                                <th>'.$rubros->NOM_RUB.'</th>
                                <th align="right" >'.count($producto2).'</th>
                                <th align="right" class="first">'.$producto[0]->TOTAL.'</th>
                            </tr>';
                        }
                    }
                
            }
        }
            $html2=$html2.'
            <tr>
                <th colspan="3" class="total2 "><b>IMPORTE TOTAL</b></th>
                <th align="right" class="total ">'.$sum.'</th>

            </tr>';
        $html2=$html2.'</table></font>';
//dd($html2);
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetFont('','B','10');
        $pdf->SetXY(15, 200);
        $pdf->Write(0,'RESUMEN GENERAL','','',false);
        $pdf->SetXY(15, 207);
        $pdf->writeHTML($html2, true, false, true, false, '');
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
