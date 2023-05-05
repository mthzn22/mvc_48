<?php
    namespace App\models;

use Core\model\Model;

    class UsuarioModel extends Model{
        //atributos do banco de dados 
        private $id;
        private $nome;
        private $sobrenome;
        private $email;
        private $senha;
        private $imagem;
        private $nivel;
        private $ativo;
        private $deleted_at;
        private $update_at;
        private $created_at;

        //getters and setters
        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function autenticar(){
            $query = "select id, nome, sobrenome, nivel, email, ativo, imagem from usuarios where email 
		    = :email and senha = :senha";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->execute();

        if($stmt -> rowCount()){
		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        
		if ($usuario['id'] != '' && $usuario['nome'] != '') {
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
			$this->__set('sobrenome', $usuario['sobrenome']);
			$this->__set('nivel', $usuario['nivel']);
			$this->__set('email', $usuario['email']);
			$this->__set('ativo', $usuario['ativo']);
			$this->__set('imagem', $usuario['imagem']);
		}
        
    }
    
    return $this;

        }
    }
?>