<?php
      // Arquivo de "Regras de negócio": 
      // MODELO -> Operações para ter acesso ao BD e realizar CRUD !!

     /* criarmos uma classe para ter acesso ao BD e criarmos dois métodos  de consulta:
       1) consultar um determinado o registro através de um parâmetro "id" 
       2) consultar todos os registros sem parâmetro     
       3) um método para fazer inclusão de dados no BD 
       4) um método para fazer exclusão de dados no BD
       */
      
      //inserir o arquivo 'config.php'
      require_once 'config.php' ; // ou include 'config.php'
      
      /* Criamos uma class chama "Alunos"  */
      class Alunos 
    { 
        //1) um método para fazer consulta atráves do parâmetro $id
        public static function select(int $id)
        {
            //Criar duas variáveis para tabela e primeira coluna
            $tabela = "alunos"; //variável para nome da tabela
            $coluna = "codigo"; //variável para chave primaria
            
            // Conectando com o banco de dados através da classe (objeto) PDO
            // pegando as informações do config.php (variáveis globais)
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            // Usando comando sql que será executado no banco de dados para consultar um 
            // determinado registro 
            $sql = "select * from $tabela where $coluna = :id" ;
            
            //preparando o comando Select do SQL para ser executado usando método prepare()
            $stmt = $connPdo->prepare($sql);  

            //configurando (ou mapear) o parametro de busca
            $stmt->bindValue(':id' , $id) ;
           
            // Executando o comando select do SQL no banco de dados
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0) // se houve retorno de dados (Registros)
            {
                //imprimir usando : var_dump( $stmt->fetch(PDO::FETCH_ASSOC) );

                // retornando os dados do banco de dados através do método fetch(...)
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
                
            }else{// se não houve retorno de dados, jogar no classe Exception (erro)
                  // e mostrar a mensagem "Sem registro do aluno"                
                throw new Exception("Sem registro do aluno");
            }

        }
        
        //2) Um método para fazer consultado de todos os dados sem parâmetro
        public static function selectAll()
        {
            $tabela = "alunos"; //uma variável para nome da tabela "alunos"
            
            // conectando com o banco de dados através da classe (objeto) PDO
            // pegando as informações do config.php (variáveis globais)
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            //criar execução de consulta usando a linguagem SQL
            $sql = "select * from $tabela"  ;
            // preparando o comando Select do SQL para ser executado usando método prepare()
            $stmt = $connPdo->prepare($sql);
            // Executando o comando select do SQL no banco de dados
            $stmt->execute() ;

            if ($stmt->rowCount() > 0) // se houve retorno de dados (Registros)
            {
                // retornando os dados do banco de dados através do método fetchAll(...)
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            }else{
                throw new Exception("Sem registros");
            }

        }

        
        // 3) um método para fazer inclusão de dados no BD

        public static function insert($dados)
        {
            $tabela = "alunos"; //uma variável para nome da tabela "alunos"
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "insert into $tabela (nome,email,telefone) values (:nome,:email,:telefone)";
            $stmt = $connPdo->prepare($sql);
            //Mapear os parâmetros para obter os dados de inclusão
            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':email', $dados['email']);
            $stmt->bindValue(':telefone', $dados['telefone']);
            $stmt->execute() ;

            if ($stmt->rowCount() > 0) // se houve os dados (Registros)
            {                
                return 'Dados cadastrados com sucesso!' ;
            }else{
                throw new Exception("Erro ao inserir os dados");
            }
        }

        // 4) um método para fazer exclusão de dados no BD

        public static function delete($id)
        {
            $tabela = "alunos"; //uma variável para nome da tabela "alunos"
            $coluna = "codigo";
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "delete from $tabela where $coluna = :id";
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)

            {    return 'Dados excluidos com sucesso!';
                
            }else{   

                throw new Exception("Erro ao excluir os dados");
            }

        }

   //5) Um método para fazer atualização (alteração) de dados no BD

   public static function update($id,$dados)
   { 
       $tabela = "alunos"; //uma variável para nome da tabela "alunos"
       $coluna = "codigo"; //uma variável para nome "codigo"
       $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
       $sql = "update $tabela set nome=:nome,email=:email,telefone=:telefone where $coluna=:id";
       $stmt = $connPdo->prepare($sql);
       //Mapear os parâmetros para obter os dados de inclusão
       $stmt->bindValue(':id', $id);
       $stmt->bindValue(':nome', $dados['nome']);
       $stmt->bindValue(':email', $dados['email']);
       $stmt->bindValue(':telefone', $dados['telefone']);
       $stmt->execute() ;

       if ($stmt->rowCount() > 0) // se houve os dados (Registros)
       {                
           return 'Dados alterados com sucesso!' ;
       }else{
           throw new Exception("Erro ao alterar os dados");
       }
   }

    }