using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using d3Model;
namespace d3Controller
<?php echo "{\n";?>
public class C<?=$objDatos->tbNombreCamello."{\n";?>
<?php 
echo $objDatos->camposPrivate;
echo "\n";
?>
//************************************************************/
private MGeneral objGeneral = new MGeneral();
private M<?=$objDatos->tbNombreCamello;?> objM<?=$objDatos->tbNombreCamello;?> = new M<?=$objDatos->tbNombreCamello;?>();
//************************************************************/

public C<?=$objDatos->tbNombreCamello;?>(<?=substr($objDatos->camposConstruct,0,-1);?>){
<?=substr($objDatos->camposThis,0,-1);?>
}

public DataView listar(){
DataView dv = new DataView(objGeneral.getDatos("<?=$objDatos->tbNombreOriginal;?>"));
return dv;
}

public long insertar(){
<?=substr($objDatos->camposInsertController,0,-1)."\n";?>
long ultimoPk = objM<?=$objDatos->tbNombreCamello;?>.insertar();
return ultimoPk;
}

public void modificar(int pk){
M<?=$objDatos->tbNombreCamello;?> obj = objM<?=$objDatos->tbNombreCamello;?>.getRegistro(pk);
this.<?=$objDatos->pkTabla;?> = obj.<?=$objDatos->pkTabla;?>;
<?=substr($objDatos->camposEditController,0,-1)."\n";?>
}

public void buscar(string campo, string valor)
{
Dictionary<string, string> parametros = new Dictionary<string, string>();
parametros.Add("campo", campo);
parametros.Add("valor", valor);
M<?=$objDatos->tbNombreCamello;?> obj = objM<?=$objDatos->tbNombreCamello;?>.getRegistro(parametros:parametros);
this.<?=$objDatos->pkTabla;?> = obj.<?=$objDatos->pkTabla;?>;
<?=substr($objDatos->camposEditController,0,-1)."\n";?>
}


public int actualizar(){
objM<?=$objDatos->tbNombreCamello;?>.<?=$objDatos->pkTabla;?> = this.<?=$objDatos->pkTabla;?>;
<?=substr($objDatos->camposInsertController,0,-1)."\n";?>
int filasAfectadas = objM<?=$objDatos->tbNombreCamello;?>.actualizar();
return filasAfectadas;
}
  
public int eliminar(int pk){
int filasAfectadas = objGeneral.eliminarRegistro("<?=$objDatos->tbNombreOriginal;?>",pk);
return filasAfectadas;
}

<?php
echo "}//end class\n}//end namespace";
?> 