using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Data;
<?php
$tbnombre=$objDatos->tbNombreOriginal;
if($tbnombre=="usuario" || $tbnombre=="usuarios"){ ?>
using System.Security.Cryptography;
<?php }?>
namespace d3Model
<?php echo "{\n";?>
public class M<?=$objDatos->tbNombreCamello."{\n";?>
<?php 
echo $objDatos->camposPrivate;
echo "\n";
?>
//=====================================================
MConexion objConexion = new MConexion();
MySqlConnection con = null;
//=====================================================
public M<?=$objDatos->tbNombreCamello;?>(<?=substr($objDatos->camposConstruct,0,-1);?>){
<?=substr($objDatos->camposThis,0,-1);?>
}

public M<?=$objDatos->tbNombreCamello?> leerDatosRegistro(string campo, string valor, bool si_extra = false, string bus_extra = null){
        con = objConexion.conectar();
        string sql = null;
        if (si_extra == false){
            sql = "SELECT * FROM <?=$objDatos->tbNombreOriginal?> WHERE " + campo + "='" + valor + "'";
        }else{
            sql = "SELECT * FROM <?=$objDatos->tbNombreOriginal?> WHERE " + campo + "='" + valor + "'" + bus_extra;
        }       
        MySqlCommand cmd = new MySqlCommand(sql, con);
        M<?=$objDatos->tbNombreCamello?> obj<?=$objDatos->tbNombreCamello?> = new M<?=$objDatos->tbNombreCamello?>();
        MySqlDataReader reader = cmd.ExecuteReader();
        if (reader.HasRows){
            while (reader.Read()){
                <?=$objDatos->camposRead?>
            }
        }else{
            <?="obj".$objDatos->tbNombreCamello.".pk_".$objDatos->tbNombreOriginal."=0;\n"?>
        }
        reader.Close();
        cmd.Dispose();
        return obj<?=$objDatos->tbNombreCamello.";"?>
}

//==============================================INSERTAR============================================================
public int insertar(){
        con = objConexion.conectar();
        MySqlCommand cmd = new MySqlCommand("<?=$objDatos->camposInsert?>", con);	
        <?=$objDatos->camposParameter?>
        int filasAfectadas = cmd.ExecuteNonQuery();
        cmd.Dispose();
        con.Close();
        return filasAfectadas;
}
    
//==============================================ACTUALIZAR============================================================
public int actualizar(int pk){
        con = objConexion.conectar();
        MySqlCommand cmd = new MySqlCommand("<?=$objDatos->camposUpdate?> WHERE pk_<?=$objDatos->tbNombreOriginal?>=?pk", con);
        cmd.Parameters.AddWithValue("?pk",pk);
        <?=$objDatos->camposParameter?>
        int filasAfectadas = cmd.ExecuteNonQuery();
        cmd.Dispose();
        con.Close();
        return filasAfectadas;
}
 
      
<?php
 $tbnombre=$objDatos->tbNombreOriginal;
 if($tbnombre=="usuario" || $tbnombre=="usuarios"){
?>
//==============================================COMPROBAR USUSARIO============================================================
public M<?=$objDatos->tbNombreCamello?> comprueba<?=$objDatos->tbNombreCamello?>(string login, string password){
    con = objConexion.conectar();
    MySqlCommand cmd = new MySqlCommand("select * from <?=$objDatos->tbNombreOriginal?>  where login=?login and password=?password", con);
    cmd.Parameters.AddWithValue("?login", login);
    cmd.Parameters.AddWithValue("?password", generarClaveSHA1(password));
    M<?=$objDatos->tbNombreCamello?> obj<?=$objDatos->tbNombreCamello?> = new M<?=$objDatos->tbNombreCamello?>();
    MySqlDataReader reader = cmd.ExecuteReader();
    if (reader.HasRows)
    {
        while (reader.Read())
        {
            <?=$objDatos->camposRead?>
        }
    }
    else
    {
        obj<?=$objDatos->tbNombreCamello?>.<?=$objDatos->pkTabla?> = 0;
    }
    reader.Close();
    cmd.Dispose();
    con.Close();
    return obj<?=$objDatos->tbNombreCamello?>;
}

//==============================================================
private string generarClaveSHA1(string clave)
{
    UTF8Encoding enc = new UTF8Encoding();
    byte[] data = enc.GetBytes(clave);
    byte[] result;
    SHA1CryptoServiceProvider sha = new SHA1CryptoServiceProvider();
    result = sha.ComputeHash(data);
    StringBuilder sb = new StringBuilder();
    for (int i = 0; i < result.Length; i++)
    {
        if (result[i] < 16)
        {
            sb.Append("0");
        }
        sb.Append(result[i].ToString("x"));
    }
    return sb.ToString().ToUpper();
}
     
 <?php
 } // end tb_user ?>
 
 
<?php
echo "}//end class\n}//end namespace";
?> 

 
