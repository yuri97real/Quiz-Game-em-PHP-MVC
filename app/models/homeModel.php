<?php

    use app\core\Model;

    class homeModel extends Model {

        public function getUsersInformation() {

            $pdo = Model::getConn();
            $sql = "SELECT NOME, EMAIL, SCORE FROM JOGO.USUARIOS ORDER BY SCORE DESC";

            $result = $pdo->prepare($sql);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getAllQuestions() {

            $pdo = Model::getConn();
            $sql = "SELECT * FROM JOGO.QUESTOES";

            $result = $pdo->prepare($sql);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getScoreUser($ID) {

            $pdo = Model::getConn();
            $sql = "SELECT SCORE FROM JOGO.USUARIOS WHERE ID = $ID";

            $result = $pdo->prepare($sql);
            $result->execute();
            $result = $result->fetch(\PDO::FETCH_ASSOC);

            return $result["SCORE"];

        }

        public function updateScore($score, $id) {

            $pdo = Model::getConn();
            $sql = "UPDATE JOGO.USUARIOS SET SCORE = $score WHERE ID = $id";

            $result = $pdo->prepare($sql);
            $result->execute();

        }

    }

?>