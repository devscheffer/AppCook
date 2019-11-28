package dao;

import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import model.Ingrediente;
/**
 *
 * @author assparremberger
 */
public class IngredienteDAO {
    
    public static void inserir(Ingrediente Ingrediente){
        
        String query = "insert into ingrediente (descricao,unit) values("
                + "'"+Ingrediente.getDescricao()+"'"
                + ",'"+Ingrediente.getUnit()+"'"
                +")";
        Conexao.executar(query);      
    }

    public static void editar(Ingrediente Ingrediente){

        String query = "UPDATE ingrediente SET "
           + " descricao = '" + Ingrediente.getDescricao()+ "'"
           + " ,unit = '" + Ingrediente.getUnit()+ "'"        
           + " WHERE id_ingrediente = " + Ingrediente.getId_ingrediente();
        Conexao.executar(query);   
    }
    
    public static void excluir(Ingrediente Ingrediente){
        
        String query = "DELETE FROM ingrediente "
                     + " WHERE id_ingrediente = " + Ingrediente.getId_ingrediente();
        Conexao.executar(query);
    }
    
    public static List<Ingrediente> getIngrediente(){
        List<Ingrediente> lista = new ArrayList<>();
        String query = 
            "SELECT id_ingrediente,descricao,unit,preco,volume,preco_unit "               
                + " FROM Ingrediente i ";
        
        ResultSet rs = Conexao.consultar( query );
        if( rs != null){
            try {
                while ( rs.next()  ) {                    

                    Ingrediente ing = new Ingrediente();
                    ing.setId_ingrediente(rs.getInt(1));
                    ing.setDescricao(rs.getString(2));
                    ing.setUnit(rs.getString(3));
                    ing.setPreco(rs.getDouble(4));
                    ing.setVolume(rs.getDouble(5));
                    ing.setPreco_unit(rs.getDouble(6));

                    lista.add( ing );
                }
            } catch (Exception e) {
                
            }
        }
        return lista;
    }
}
    