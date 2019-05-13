<?php

class DB {

	private $usuario;
	private $conexao;

	public function __construct(Conexao $conexao, Usuario $usuario) {
		$this->conexao = $conexao->conectar();
		$this->usuario = $usuario;
	}

	public function inserir() {
		$sql = "INSERT INTO usuario (nome) VALUES (:nome)";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':nome', $this->usuario->__get('nome'));
		if ($stmt->execute()) {
			echo 'Salvado com sucesso';
		} else {
			echo 'Erro ao salvar';
		}
	}

	public function deletar() {
		$sql = "DELETE FROM usuario WHERE id = :id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':id', $this->usuario->__get('id'));
		if ($stmt->execute()) {
			echo 'Deletado com sucesso';
		} else {
			echo 'Erro ao deletar';
		}
	}

	public function consultar() {
		$sql = "SELECT id,nome FROM usuario WHERE id = :id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':id', $this->usuario->__get('id'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function alterar() {
		$sql = "UPDATE usuario SET nome = :nome WHERE id = :id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':nome', $this->usuario->__get('nome'));
		$stmt->bindValue(':id', $this->usuario->__get('id'));
		if ($stmt->execute()) {
			echo "Alterado com sucesso!";
		} else {
			echo 'Erro ao fazer a alteração';
		}
	}
}
