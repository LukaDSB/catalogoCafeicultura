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

    public function cadastrarCafe($nome, $descricao, $imagem) {
        $sql = "INSERT INTO cafes (nome, descricao, imagem) VALUES (?, ?, ?)";
    
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("sss", $nome, $descricao, $imagem);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    
            $stmt->close();
        } else {
            return false;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
