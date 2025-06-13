using System;
using System.Data;
using MySql.Data.MySqlClient;
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
public M<?=$objDatos->tbNombreCamello;?>(<?=substr($objDatos->camposConstruct,0,-1);?>){
<?=substr($objDatos->camposThis,0,-1);?>
}

public M<?=$objDatos->tbNombreCamello?> getRegistro(int pk = 0, Dictionary<string, string> parametros = null)
{
    string sql = "";
    if (parametros == null)
    {
        sql = $"SELECT * FROM <?=$objDatos->tbNombreOriginal?> WHERE pk_ensayo = '{pk}'";
    }
    else
    {
        string campo = (parametros.ContainsKey("campo")) ? parametros["campo"] : "";
        string valor = (parametros.ContainsKey("valor")) ? parametros["valor"] : "";
        string condicion = (parametros.ContainsKey("condicion")) ? parametros["condicion"] : "";
        sql = $"SELECT * FROM <?=$objDatos->tbNombreOriginal?> WHERE {campo} = '{valor}' {condicion}";
    }

using (MySqlConnection con = MConexion.conectar())
 using (MySqlCommand cmd = new MySqlCommand(sql, con)){
    M<?=$objDatos->tbNombreCamello?> obj<?=$objDatos->tbNombreCamello?> = new M<?=$objDatos->tbNombreCamello?>();
    using (MySqlDataReader reader = cmd.ExecuteReader()){
    if (reader.HasRows)
    {
        while (reader.Read())
        {
            <?=$objDatos->camposRead?>
        }
    }
    else
    {
        <?="obj".$objDatos->tbNombreCamello.".pk_".$objDatos->tbNombreOriginal."=0;\n"?>
    }
    return obj<?=$objDatos->tbNombreCamello.";"?>
}
}
}

//==============================================INSERTAR============================================================
public long insertar(){
    using (MySqlConnection con = MConexion.conectar())
        using(MySqlCommand cmd = new MySqlCommand("<?=$objDatos->camposInsert?>", con)){	
        <?=$objDatos->camposParameter?>
        int filasAfectadas = cmd.ExecuteNonQuery();
        long pk= 0;
        if (filasAfectadas > 0){
        pk= cmd.LastInsertedId;
        }
        return pk;
        }
}
    
//==============================================ACTUALIZAR============================================================
public int actualizar(){
    using(MySqlConnection con = MConexion.conectar())
        using(MySqlCommand cmd = new MySqlCommand("<?=$objDatos->camposUpdate?> WHERE pk_<?=$objDatos->tbNombreOriginal?>=?pk", con)){
        cmd.Parameters.AddWithValue("?pk",this.pk_<?=$objDatos->tbNombreOriginal?>);
        <?=$objDatos->camposParameter?>
        int filasAfectadas = cmd.ExecuteNonQuery();
        return filasAfectadas;
        }
}     
<?php
 $tbnombre=$objDatos->tbNombreOriginal;
 if($tbnombre=="usuario" || $tbnombre=="usuarios"){
?>
//==============================================COMPROBAR USUSARIO============================================================
public M<?=$objDatos->tbNombreCamello?> comprueba<?=$objDatos->tbNombreCamello?>(string login, string password){
    using(MySqlConnection con = MConexion.conectar())
    using(MySqlCommand cmd = new MySqlCommand("select * from <?=$objDatos->tbNombreOriginal?>  where login=?login and password=?password", con)){
    cmd.Parameters.AddWithValue("?login", login);
    cmd.Parameters.AddWithValue("?password", generarClaveSHA1(password));
    M<?=$objDatos->tbNombreCamello?> obj<?=$objDatos->tbNombreCamello?> = new M<?=$objDatos->tbNombreCamello?>();
    using(MySqlDataReader reader = cmd.ExecuteReader()){
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
}
    return obj<?=$objDatos->tbNombreCamello?>;
}
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
 } ?>
<?php

echo "}//end class\n}//end namespace";
?> 

 
