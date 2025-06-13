using System.Data;
using System.IO;
using MySql.Data.MySqlClient;
namespace d3Model
<?php echo "{\n";?>
public class MConexion{       
        static string server = "<?=$objDatos->server?>";
        static string port = "3306";
        static string user = "<?=$objDatos->user?>";
        static string password = "<?=$objDatos->password?>";
        static string database = "<?=$objDatos->database?>";
        static string FICHERO = "_d3.ini";
        static MySqlConnection con = null;
        public static MySqlConnection conectar()
        {
            if (File.Exists(FICHERO))
            {
                server = File.ReadAllText(FICHERO);
            }
            con = new MySqlConnection("server='" + server + "'; Port='" + port + "';uid='" + user + "';password='" + password + "';database='" + database + "';Allow User Variables=True;");

            if (con.State == ConnectionState.Closed)
            {
                con.Open();
            }
            return con;
        }
}
<?php
echo "}//end namespace";
?> 
