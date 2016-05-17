<?php

namespace almacen\Http\Controllers;
use TCPDF;
use Illuminate\Http\Request;
use PDF;
use almacen\Producto;
use almacen\Ingresado;
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
        //
    }

    public function kardexpdf($id){
        $producto= Producto::where('id','=',$id)->get();
        $query= Ingresado::join('ingresos','ingresos.id','=','ID_ING')->select('FEC_ING as fecha','NFC_PIN as factura','NOC_PIN as compra',"' 'as dgaa",'PRO_PIN as procedencia','CAN_PIN as entradas',"'' as salidas")->where('ingresados.ID_PRO','=',35)->get();
        $pdf = new TCPDF('P','mm', array(164,216), true, 'UTF-8', false);

        $pdf->SetTitle('Tarjeta Kardex valorado');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->Image('images/banner_opt.jpg', 13, 1, 40, 35, 'JPG', '', '', true, 250, '', false, false, false, false, false, false);
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
     $html = 
     '<font size="6"><br/><table border="0.2" cellspacing="0" cellpadding="2">
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
   
</table></font>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('reportekardex.pdf');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
