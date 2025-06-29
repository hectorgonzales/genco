<?php
require_once("Conexion.php");
class Datos{
	public $server;
    public $user;
    public $password;
    public $database;
	public $port;
		
	//=================TABLA
	public $tbNombreOriginal;
	public $tbNombreSinGuion;
	public $tbNombreConGuion;
	public $tbNombreCamello;
	public $tbNombreMinuscula;
	public $tbNombreUnidoCorto;
	
	//==================
	public $pkTabla;
	public $camposLista;
	public $camposDolar;
	public $camposInsert;
	public $camposUpdate;
	public $camposRead;
	public $camposParameter;
	public $camposPrivate;
	public $camposConstruct;
	public $camposThis;
	public $camposParams;
	public $camposRdlc;
	//--------------services------------------------
	public $primerCampo;
	public $camposIsset;
	//---------------LISTA------------------
	public $camposGrid;
	public $camposCeldas;
	public $camposGridV3; //uikit v3
	public $camposCeldasV3;
    public $camposFilaValor;
	public $camposFormNew;
	//---------------INSERT------------------
	public $camposPost;
	public $camposInsertController;
	public $camposEditController;
	//---------------JS-----------------------
	public $camposInsertJs;
	public $camposInsertPostJs;
	public $camposAlertJs;
	public $totalCampos;
	
	public function __construct($s="localhost",$u="root",$p="",$db="",$port=""){
		$this->server=$s;
		$this->user=$u;
		$this->password=$p;
		$this->database=$db;
		$this->port=$port;
		
	}
	
	
	public function verTablas(){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="show tables";
		$datos=$con->query($sql);
		return $datos;
	}
	
	public function prepararNombreTablas($tabla){
		$this->tbNombreOriginal=$tabla;
		$aNombre=preg_split("/[_]/",$tabla);
		$t_aNombre=count($aNombre);
		for($i=0;$i<$t_aNombre;$i++){
			$this->tbNombreCamello.=ucfirst($aNombre[$i]);
			$this->tbNombreMinuscula.=$aNombre[$i];
			$this->tbNombreConGuion.=$aNombre[$i]."-";
		}
		/********* nueva_nombre_tabla = nunt ******/
			if($t_aNombre==1){
				$this->tbNombreUnidoCorto=substr($aNombre[0],0,4);
			}elseif($t_aNombre==2){
				$this->tbNombreUnidoCorto=substr($aNombre[0],0,2).substr($aNombre[1],0,2);
			}elseif($t_aNombre==3){
				$this->tbNombreUnidoCorto=substr($aNombre[0],0,2).substr($aNombre[1],0,1).substr($aNombre[2],0,1);
			}elseif($t_aNombre==4){
				$this->tbNombreUnidoCorto=substr($aNombre[0],0,1).substr($aNombre[1],0,1).substr($aNombre[2],0,1).substr($aNombre[3],0,1);
			}
		/***************/
	}
		
	public function prepararCamposTablas($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
       	$n=1;
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
		 if($n==1){ $this->pkTabla=$camposTabla['Field'];}
		 $n++;
		} //end while
		$this->totalCampos=$n;
	}
	
	
	//================PHP ==============================================================================
	public function prepararCamposTablaPHP($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
       	$n=1;
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
		if($n==1){ $this->pkTabla=$camposTabla['Field'];}
		if($n==2){ $this->primerCampo=$camposTabla['Field'];}
		 //-------------------------------------------------------------------------
		 if($n>1){
		     $this->camposPrivate.="private $".$camposTabla['Field'].";\n";
			 $this->camposConstruct.="$".$camposTabla['Field']."=\"\",\n\t\t\t\t\t\t";
		     $this->camposThis.='$this->'.$camposTabla['Field']."=$".$camposTabla['Field'].";\n\t\t\t\t\t\t\t";
			 $this->camposLista.=$camposTabla['Field'].",\n\t\t\t\t\t\t";
			 $this->camposInsert.="'".'$this->'.$camposTabla['Field']."',\n\t\t\t\t\t\t";
			 $this->camposUpdate.=$camposTabla['Field'].'=\'$this->'.$camposTabla['Field']."',\n\t\t\t\t\t\t";			 
			 //-------------------------------------------------
			 $this->camposGrid.="<th data-campo=\"".$camposTabla['Field']."\">".strtoupper($camposTabla['Field'])."</th>\n\t\t\t\t";
			 $this->camposCeldas.='<td><?=$fila[\''.$camposTabla['Field'].'\']?></td>'."\n\t\t\t\t\t";
			 //-----------------uikit v3--------------------------------
			 $this->camposGridV3.="<th data-campo=\"".$camposTabla['Field']."\" class=\"uk-visible@s\">".strtoupper($camposTabla['Field'])."</th>\n\t\t\t\t";
			 $this->camposCeldasV3.='<td class="uk-visible@s"><?=$fila[\''.$camposTabla['Field'].'\']?></td>'."\n\t\t\t\t\t";
             $this->camposFilaValor.='$'.$camposTabla['Field'].'=$fila[\''.$camposTabla['Field'].'\'];'."\n";
			 //-------------------------------------------
			 //$this->camposFormNew.='<tr><td><label>'.$camposTabla['Field'].':</label></td></tr>'."\n\t\t\t\t\t\t\t\t\t\t\t";
			 //$this->camposFormNew.='<tr><td><input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_'.$camposTabla['Field'].'" /></td></tr>'."\n\t\t\t\t\t\t\t\t\t\t\t";
			 $this->camposFormNew.='<div class="uk-width-1-1">'."\n\t\t\t\t\t\t\t";;
			 $this->camposFormNew.='<label>'.$camposTabla['Field'].':</label>'."\n\t\t\t\t\t\t\t";
			 $this->camposFormNew.='<input type="text" class="uk-input uk-form-small mayus" id="txt_'.$camposTabla['Field'].'" />'."\n\t\t\t\t\t\t";;
			 $this->camposFormNew.='</div>'."\n\t\t\t\t\t\t";
			 //-------------------------------------------
			 $this->camposPost.="$".$camposTabla['Field'].'=$_POST[\''.$camposTabla['Field']."'];\n";
			 $this->camposParams.="'".$camposTabla['Field'].'\'=>$general->valida($'.$camposTabla['Field']."),\n\t\t";
			 $this->camposDolar.="$".$camposTabla['Field'].",\n\t\t\t\t\t\t";
			  //---------------------------------------------
		     $this->camposInsertJs.="var ".$camposTabla['Field']."=$('#txt_".$camposTabla['Field']."').val();\n\t\t";
			 $this->camposInsertPostJs.="'".$camposTabla['Field']."':DOMPurify.sanitize(".$camposTabla['Field']."),\n\t\t\t\t\t\t";
			 //-----------services----------------------------
			 $this->camposIsset.='if(isset($datosPost[\''.$camposTabla['Field'].'\'])){$this->'.$camposTabla['Field'].'=$datosPost[\''.$camposTabla['Field'].'\'];}'."\n\t\t\t\t";
		 } //sin pk
		 $this->camposAlertJs.=$camposTabla['Field']."+\"-\"+";
		 $n++;
		} //end while
		$this->totalCampos=$n;
	}	
	
	
	//================VB ==============================================================================
	
	public function verCamposTipo($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
		
		$form="";
		$form.='<form class="uk-form" method="post"><table border="0" align="center">';
        $n=0;
       	
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
			$seleccionar="";
			if(substr($camposTabla['Field'],0,2)=="pk" || substr($camposTabla['Field'],0,2)=="fk"){$seleccionar="selected";}
			
           $form.=' <td><input type="text" id="c'.$n.'" value="'.$camposTabla['Field'].'" /></td>
            <td>
            <select id="t'.$n.'">
                <option  value="String">String</option>
                <option  value="Double">Double</option>
                <option  value="Integer"'.$seleccionar.'>Integer</option>
                <option  value="DateTime">DateTime</option>
                <option  value="Boolean">Boolean</option>
            </select>
            </td><tr />';
        $n++;
        } 
        $form.='<td colspan="2"><input type="hidden" id="total_n" value="'.$n.'" /><button class="uk-button uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_model();" type="button">Procesar Campos</button></td></table></form>';
		return $form;
	}


		public function prepararCamposTablaVB($campos, $tipos,$tn){
		$this->camposPrivate="";
		$this->camposConstruct="";
		$this->camposThis="";
		$this->camposRead="";
		$this->camposLista="";
		$this->camposDolar="";
		$this->camposInsert="";
		$this->camposParameter="";
		$camposUpdateValor="";
		$n=1;
		$valoresDefault=array("\"\"","0");
		for($a=0;$a<$tn;$a++){
			if($tipos[$a]=="String" || $tipos[$a]=="DateTime"){
				$valor="Nothing";
			}else{
				$valor="0";
			}
			//$this->camposPrivate.="Private _".ucfirst(trim($campos[$a]))." As ".$tipos[$a]."\n"; 
			$this->camposPrivate.="Public Property ".strtolower(trim($campos[$a]))." As ".$tipos[$a]."\n";
			//$this->camposThis.="_".ucfirst(trim($campos[$a]))." = ".$campos[$a]."\n";
			
			$this->camposRead.="obj".$this->tbNombreCamello.".".trim($campos[$a])."=reader(\"".strtolower(trim($campos[$a]))."\").ToString\n";
			
			if($n>1){
				$this->camposConstruct.="Optional var_".trim($campos[$a])." As ".$tipos[$a]."=".$valor.",";
				$this->camposThis.=strtolower(trim($campos[$a]))." = var_".$campos[$a]."\n";
				$this->camposDolar.="?".strtolower(trim($campos[$a])).",";
				$this->camposLista.=strtolower(trim($campos[$a])).",";
				$this->camposParameter.=".Parameters.AddWithValue(\"?".trim($campos[$a])."\", obj".$this->tbNombreCamello.".".trim($campos[$a]).")\n";
				$camposUpdateValor.=trim($campos[$a])."=?".trim($campos[$a]).",";
			}
			$n++;
		}
		$this->camposUpdate="UPDATE ".$this->tbNombreOriginal." SET ".substr($camposUpdateValor,0,-1)."";
		$this->camposInsert="INSERT INTO ".$this->tbNombreOriginal." (".substr($this->camposLista,0,-1).") VALUES (".substr($this->camposDolar,0,-1)."";

	}

	//================C# ==============================================================================
	public function verCamposTipoCsharp($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
		
		$form="";
		$form.='<form class="uk-form" method="post"><table border="0" align="center">';
        $n=0;
       	
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
			$seleccionar="";
			if(substr($camposTabla['Field'],0,2)=="pk" || substr($camposTabla['Field'],0,2)=="fk"){$seleccionar="selected";}
			
           $form.=' <td><input type="text" id="c'.$n.'" value="'.$camposTabla['Field'].'" /></td>
            <td>
            <select id="t'.$n.'">
                <option  value="string">string</option>
                <option  value="double">double</option>
                <option  value="int"'.$seleccionar.'>int</option>
                <option  value="long">long</option>
                <option  value="bool">bool</option>
            </select>
            </td><tr />';
        $n++;
        } 
        $form.='<td colspan="2"><input type="hidden" id="total_n" value="'.$n.'" /><button class="uk-button uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_model();" type="button">Procesar Campos</button></td></table></form>';
		return $form;
	}

//==============================RDLC==============================================
	public function verCamposTipoCsharpRdlc($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
		
		$form="";
		$form.='<form class="uk-form" method="post"><table border="0" align="center">';
        $n=0;
       	
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
			$seleccionar="";
			if(substr($camposTabla['Field'],0,2)=="pk" || substr($camposTabla['Field'],0,2)=="fk"){$seleccionar="selected";}
			
           $form.=' <td><input type="text" id="c'.$n.'" value="'.$camposTabla['Field'].'" /></td>
            <td>
            <select id="t'.$n.'">
				<option  value="String">String</option>
          		<option  value="Int32"'.$seleccionar.'>Integer</option>
           		<option  value="DateTime">DateTime</option>
            	<option  value="Boolean">Boolean</option>
            </select>
            </td><tr />';
        $n++;
        } 
        $form.='<td colspan="2"><input type="hidden" id="total_n" value="'.$n.'" /><button class="uk-button uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_rdlc();" type="button">Procesar Campos</button></td></table></form>';
		return $form;
	}	

	public function verCamposTipoCsharpController($tabla){
		$con=new Conexion($this->server, $this->user, $this->password, $this->database, $this->port);	
		$sql="describe $tabla";
		$datos=$con->query($sql);
		
		$form="";
		$form.='<form class="uk-form" method="post"><table border="0" align="center">';
        $n=0;
       	
		while($camposTabla=$datos->fetch_array(MYSQLI_ASSOC)){
			$seleccionar="";
			if(substr($camposTabla['Field'],0,2)=="pk" || substr($camposTabla['Field'],0,2)=="fk"){$seleccionar="selected";}
			
           $form.=' <td><input type="text" id="c'.$n.'" value="'.$camposTabla['Field'].'" /></td>
            <td>
            <select id="t'.$n.'">
                <option  value="string">string</option>
                <option  value="double">double</option>
                <option  value="int"'.$seleccionar.'>int</option>
                <option  value="long">long</option>
                <option  value="bool">bool</option>
            </select>
            </td><tr />';
        $n++;
        } 
        $form.='<td colspan="2"><input type="hidden" id="total_n" value="'.$n.'" /><button class="uk-button uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_controller();" type="button">Procesar Campos</button></td></table></form>';
		return $form;
	}

	
	
	public function prepararCamposTablaCsharp($campos, $tipos,$tn){
		$this->camposPrivate="";
		$this->camposConstruct="";
		$this->camposThis="";
		$this->camposRead="";
		$this->camposLista="";
		$this->camposDolar="";
		$this->camposInsert="";
		$this->camposParameter="";
		$this->camposInsertController="";
		$this->camposEditController="";
		$this->camposRdlc="";
		$camposUpdateValor="";
		$n=1;
		$valoresDefault=array("\"\"","0");
		for($a=0;$a<$tn;$a++){
			if($tipos[$a]=="string" || $tipos[$a]=="datetime"){
				$valor="\"\"";
				$convert="";
				$convertEnd=".ToString()";
			}else{
				$valor="0";
				$convert="Convert.ToInt32(";
				$convertEnd=")";
			}
			$this->camposRdlc.="<Field Name=\"".strtolower(trim($campos[$a]))."\">\n<DataField>".strtolower(trim($campos[$a]))."</DataField>\n<rd:TypeName>System.".$tipos[$a]."</rd:TypeName>\n</Field>\n";
			$this->camposPrivate.="public ".$tipos[$a]." ".strtolower(trim($campos[$a]))." {get; set;}\n";		
			$this->camposRead.="obj".$this->tbNombreCamello.".".trim($campos[$a])."=".$convert."reader[\"".strtolower(trim($campos[$a]))."\"]".$convertEnd.";\n";
			
			if($n>1){
				$this->camposConstruct.=$tipos[$a]." ".trim($campos[$a])."=".$valor.",";
				$this->camposThis.="this.".strtolower(trim($campos[$a]))." = ".$campos[$a].";\n";
				$this->camposInsertController.="objM".$this->tbNombreCamello.".".strtolower(trim($campos[$a]))."=this.".strtolower(trim($campos[$a])).";\n";
				$this->camposEditController.="this.".strtolower(trim($campos[$a]))." = obj.".$campos[$a].";\n";
				$this->camposDolar.="?".strtolower(trim($campos[$a])).",";
				$this->camposLista.=strtolower(trim($campos[$a])).",";
				$this->camposParameter.="cmd.Parameters.AddWithValue(\"?".trim($campos[$a])."\",this.".trim($campos[$a]).");\n";
				$camposUpdateValor.=trim($campos[$a])."=?".trim($campos[$a]).",";
			}
			$n++;
		}
		$this->camposUpdate="UPDATE ".$this->tbNombreOriginal." SET ".substr($camposUpdateValor,0,-1)."";
		$this->camposInsert="INSERT INTO ".$this->tbNombreOriginal." (".substr($this->camposLista,0,-1).") VALUES (".substr($this->camposDolar,0,-1).")";

	}
	
	
	
} //end class
?>