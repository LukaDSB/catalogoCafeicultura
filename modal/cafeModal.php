<?php
class CafeModal {
    private $servername = "localhost";
    private $username = "root";
    private $password = "*Movorurari123";
    private $dbname = "projetocafe";
    public $conn;


    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getTiposDeCafe() {
        $sql = "SELECT nome FROM tiposdecafe";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getCafes() {
        $sql = "SELECT * FROM cafes";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function excluirCafe($id) {
        $sql = "DELETE FROM cafes WHERE idcafes = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    // public function cadastrarCafe($nome, $descricao) {
    //     $sql = "INSERT INTO cafes (nome, descricao) VALUES (?, ?)";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("ss", $nome, $descricao);
    //     $stmt->execute();
    // }

    public function cadastrarCafe($nome, $descricao, $imagem) {
        // Preparar a query de inserção
        $sql = "INSERT INTO cafes (nome, descricao, imagem) VALUES (?, ?, ?)";
    
        // Preparar a declaração para evitar SQL Injection
        if ($stmt = $this->conn->prepare($sql)) {
            // Vincular os parâmetros (s: string, s: string, s: string)
            $stmt->bind_param("sss", $nome, $descricao, $imagem);
    
            // Executar a query
            if ($stmt->execute()) {
                return true; // Sucesso
            } else {
                return false; // Falha
            }
    
            // Fechar a declaração
            $stmt->close();
        } else {
            return false; // Falha ao preparar a query
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
