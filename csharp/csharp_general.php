using System;
using System.Data;
using MySql.Data.MySqlClient;
namespace d3Model
<?php echo "{\n";?>

public class MGeneral<?php echo "{\n";?>
//=====================================================
//Dictionary<string, string> parametros = new Dictionary<string, string>();
//parametros.Add("param", "valor");
//----------------------------------------------------------------------------------------------------
//Se pasa parametros con otro orden ..anteponiendo el nombre del (valor, paramatro:valor) al invocar el metodo.
//=====================================================

//=======================================================================================================================
public DataTable getDatos(string tabla, string orden = "desc", Dictionary<string, string> parametros = null)
{
    string sql = $"SELECT * FROM {tabla}";

    if (parametros == null)
    {
        sql = $"SELECT * FROM {tabla} ORDER BY pk_" + tabla + " " + orden;
    }
    else
    {
        string campos = (parametros.ContainsKey("campos")) ? parametros["campos"] : "*";
        string relacion = (parametros.ContainsKey("relacion")) ? parametros["relacion"] : "";
        string campoOrder = (parametros.ContainsKey("campoOrder")) ? parametros["campoOrder"] : "pk_" + tabla;
        string order = (parametros.ContainsKey("order")) ? parametros["order"] : "desc";
        string condicion = (parametros.ContainsKey("condicion")) ? " WHERE " + parametros["condicion"] : "";
        string limit = (parametros.ContainsKey("limit")) ? " LIMIT " + parametros["limit"] : "";
        sql = $"SELECT {campos} FROM {tabla}{relacion}{condicion} ORDER BY {campoOrder} {order} {limit}";
    }
     using(MySqlConnection con = MConexion.conectar())
 using(MySqlCommand cmd = new MySqlCommand(sql, con)) { 
    MySqlDataAdapter da = new MySqlDataAdapter(cmd);
    DataTable dt = new DataTable(tabla);
    da.Fill(dt);
    return dt;
 }
}
//=======================================================================================================================
public int eliminarRegistro(string tabla, int pk=0, Dictionary<string, string> parametros = null) 
{
    string sql ="";
    if (parametros == null)
    {
        sql = $"DELETE FROM {tabla} WHERE pk_{tabla}='{pk}'";
    }
    else
    {
        string campo = (parametros.ContainsKey("campo")) ? parametros["campo"] : "pk_" + tabla; ;
        string valor = (parametros.ContainsKey("valor")) ? parametros["valor"] : "0";
        string condicion = (parametros.ContainsKey("condicion")) ? parametros["condicion"] : "";
        sql = $"DELETE FROM {tabla} WHERE {campo} = '{valor}' {condicion}";
    }
     using(MySqlConnection con = MConexion.conectar())
 using(MySqlCommand cmd = new MySqlCommand(sql, con)) { 
    int filasAfectadas = cmd.ExecuteNonQuery();
    return filasAfectadas;
 }
}
//=======================================================================================================================
public string getValorCampo(string tabla, Dictionary<string, string> parametros)
{
    string campo = (parametros.ContainsKey("campo")) ? parametros["campo"] : "";
    string condicion = (parametros.ContainsKey("condicion")) ? " WHERE "+parametros["condicion"] : "";
    string sql = $"SELECT {campo} FROM {tabla} {condicion}";

using(MySqlConnection con = MConexion.conectar())
 using(MySqlCommand cmd = new MySqlCommand(sql, con)) { 
    string valor = Convert.ToString(cmd.ExecuteScalar());
    return valor;
 }
}

 //=======================================================================================================================
 public int actualizarCampos(string tabla, Dictionary<string, string> parametros)
 {
     string campos = (parametros.ContainsKey("campo")) ? parametros["campo"] : "";
     string condicion = (parametros.ContainsKey("condicion")) ? " WHERE "+parametros["condicion"] : "";
     string sql = $"UPDATE {tabla} SET {campos} {condicion}";

     using (MySqlConnection con = MConexion.conectar())
     using (MySqlCommand cmd = new MySqlCommand(sql, con))
     {
         int filasAfectadas = cmd.ExecuteNonQuery();
         return filasAfectadas;
     }
 }
 
//=======================================================================================================================
public bool existeRegistro(string tabla, string condicion)
{
    string sql = $"SELECT (COUNT(*)>0) as existe FROM {tabla} WHERE {condicion}";
    using(MySqlConnection con = MConexion.conectar())
 using(MySqlCommand cmd = new MySqlCommand(sql, con)) { 
    bool valor = Convert.ToBoolean(cmd.ExecuteScalar());
    return valor;
 }
}
//=======================================================================================================================

public int getUltimoPk(string tabla, string condicion="")
{
    string pk_tabla = "pk_" + tabla;
    using(MySqlConnection con = MConexion.conectar())
   using(MySqlCommand cmd = new MySqlCommand($"SELECT MAX({pk_tabla}) FROM {tabla} {condicion}", con)){
    var ultimoPk = Convert.ToInt32(cmd.ExecuteScalar());
    return ultimoPk;
   }
}
//=======================================================================================================================


public DataTable listarSQL(string sql, string nombre_tabla)
{
using(MySqlConnection con = MConexion.conectar())
 using(MySqlCommand cmd = new MySqlCommand(sql, con)) {
    MySqlDataAdapter da = new MySqlDataAdapter(cmd);
    DataTable dt = new DataTable(nombre_tabla);
    da.Fill(dt);
    return dt;
 }
}


<?php
echo "}//end class\n}//end namespace";
?> 