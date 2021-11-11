<?php

//class dashboard
class Dashboard{

    public $data_inicio;
    public $data_fim;
    public $numeroVendas;
    public $totalVendas;
    public $clientesAtivos;
    public $clientesInativos;
    public $totalReclamacao;
    public $totalElogios;
    public $totalSugestoes;
    public $totalDespesas;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
        return $this;
    }
}
//class de conexão com o banco
    class Conexao{
        
        private $host = 'localhost';
        private $dbname = 'dashboard';
        private $user = 'root';
        private $pass = '';

        public function conectar(){
            try{

                $conexao = new PDO(
                    "myslq:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                //Evita erros de incompatibilidade com caracteres
                $conexao->exec('set charset utf8');

                return $conexao;

            }catch(PDOException $e){              
                echo '<p>'. $e->getMessage() .'</p>';

            }
        }

    }

//class (model)

class Bd {

    private $conexao;
    private $dashboard;

    public function __construct( Conexao $conexao, Dashboard $dashboard){
        
        $this->conexao = $conexao->conectar();
        $this->dashboard = $dashboard;

    }

    public function getNumeroVendas(){
        
    }

}

$dashboard = new Dashboard();
$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard)




?>