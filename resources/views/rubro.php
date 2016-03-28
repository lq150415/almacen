<?php

$id = $_POST['id'];

$rubros = DB::table('rubros')->where('ID_ALM','=',$id)->get();
	foreach ($rubros as $rubro):             
        $html .= '<option value="'.$rubro->id.'">'.$rubro->NOM_RUB.'</option>';
    }
}
echo $html;
?>