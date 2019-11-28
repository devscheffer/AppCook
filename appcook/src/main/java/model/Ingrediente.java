package model;

public class Ingrediente {
    
    public int id_ingrediente;
    public String descricao;
    public String unit;
    public Double preco;

    public void setId_ingrediente(int id_ingrediente) {
        this.id_ingrediente = id_ingrediente;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public void setUnit(String unit) {
        this.unit = unit;
    }

    public void setPreco(Double preco) {
        this.preco = preco;
    }

    public void setVolume(Double volume) {
        this.volume = volume;
    }

    public void setPreco_unit(Double preco_unit) {
        this.preco_unit = preco_unit;
    }

    public int getId_ingrediente() {
        return id_ingrediente;
    }

    public String getDescricao() {
        return descricao;
    }

    public String getUnit() {
        return unit;
    }

    public Double getPreco() {
        return preco;
    }

    public Double getVolume() {
        return volume;
    }

    public Double getPreco_unit() {
        return preco_unit;
    }
    public Double volume;
    public Double preco_unit;
}