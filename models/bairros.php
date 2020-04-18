<?php

class bairros extends model {

    

    
    public function listarBairros() {
        try {
            $array = array();
            $sql = "SELECT * FROM bairros ORDER BY bairro_nome";
          
          //  $sql = "SELECT * FROM bairros b INNER JOIN loja_has_bairros lb ON b.id_bairro=lb.id_bairros GROUP BY b.id_bairro";
            $sql = $this->db->prepare($sql);
            
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    

    

       
    public function ListarObairro($bairro){
        try{
           
                                  
          $sql="select * from loja where bairro=:bairro";
             $sql=$this->db->prepare($sql);
            $sql->bindValue(':bairro', $bairro);
          
            $sql->execute();
            if($sql->rowCount()>0){
           
          
               $resul=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
           
        } catch (Exception $ex) {
  echo "Falhou:" . $ex->getMessage();
        }
    }
    
    
    
    
    
    public function cadastrarBairro($bairro) {
        try {
          
//remove acentos,numero,virgula, espaço por traço e tudo minusculo
            //    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
            $bairro= ucfirst(trim(strtolower($bairro)));  
            $sql = "INSERT INTO bairros SET bairro_nome=:bairro ";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':bairro',$bairro);
                $sql->execute();
                if ($sql->rowCount() > 0) {



                    
                }else{
                    return "Não foi possivel cadastrar, verifique o campo!";
                }
            
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

  

    public function pesquisarBairro($palavra) {
        try {
            $array = array();
            $sql = "SELECT bairro FROM loja WHERE bairro LIKE :palavra";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra . "%");
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    
   

   
    

       
    public function qtdPorBairro(){
        try{
           
             
            
          $sql="select bairros(count) from loja";
             $sql=$this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);
          
            $sql->execute();
            if($sql->rowCount()>0){
           
          
               $resul=$sql->fetch(PDO::FETCH_ASSOC);
         // $palavra= implode(",",$resul['palavrachave']); 
          $palavra= explode(",", $resul['palavrachave']);
          print_r($palavra);
          foreach ($palavra as $value) {
               $sql="insert into palavra_chave set pchave_nome=:pchave_nome,id_loja=:id_loja";
               $value=trim($value);
            $sql=$this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);
            $sql->bindValue(':pchave_nome',$value);
            $sql->execute();
          }
           if($sql->rowCount()>0){
                
            }
         }else{
             
         }
         
           
           
        } catch (Exception $ex) {
  echo "Falhou:" . $ex->getMessage();
        }
    }
    
    
    
    
    
    public function slugNotRepetir($titulo, $id_loja) {
        try {
            if (isset($titulo) && !empty($titulo)) {

                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                $sql = "SELECT slug FROM loja WHERE slug='$slug' AND id_loja !='$id_loja' ";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                if ($sql->rowCount() == 0) {



                    return $slug;
                }
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarClientes() {

        try {
            $sql = "SELECT * FROM clientes INNER JOIN lojas ON lojas.clientes_id_clientes=clientes.id_clientes";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarCliente($id) {
        $array = array();
        try {
            $sql = "SELECT * FROM clientes WHERE id=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function getName($id) {

        try {
            $sql = "SELECT nome FROM clientes WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();
                $nome = $array['nome'];
                return $nome;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarPorRamo() {
        try {
            $array = array();
            $sql = "SELECT * FROM ramo ORDER BY nome ASC";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function buscarLoja($palavra) {
        try {


            $array = array();
            echo $sql = "SELECT * FROM loja WHERE nome_fantasia LIKE '%$palavra%'";
            $sql = $this->db->prepare($sql);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            } else {
                echo 'nao foi';
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarLojas() { 
        $array = array();
        $sql = 'SELECT *,ramo.nome as nome_ramo,loja.funcionamento FROM loja '
                . 'left join ramo on ramo.id_ramo=loja.ramo WHERE loja.status =0 AND loja.anuncio_site=1 ';
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        }
        //verificar arquivo
    }

    public function getDados($id_loja) {
        try {
            $array = array();
            $sql = "SELECT * FROM loja l LEFT JOIN url_imagens u ON l.id_loja= u.loja_id_loja "
                    . "LEFT JOIN url_equipes e ON e.loja_id_loja=l.id_loja "
                    . "WHERE l.id_loja=:id_loja GROUP BY l.id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function totalFotos($id_loja) {
        try {

            $sql = "SELECT COUNT(loja_id_loja)as total FROM url_imagens WHERE loja_id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetch();
                return $total['total'];
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarFotos($id_loja) {
        try {
            $total = array();
            $sql = "SELECT * FROM url_imagens WHERE loja_id_loja=:id_loja ORDER BY id_url_imagens ASC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetchAll();
                return $total;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

}
