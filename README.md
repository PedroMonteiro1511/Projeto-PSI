# Projeto-PSI

Credenciais de acesso:

  -Admin -  Username : MonteiroAdmin , Password : admin123.
  
  -Gestor -  Username : Monteiro, Password : admin123.
  
  -Guest - Só pode ver as vendas e os leilões , nao pode perticipar nem leiloar.
  
  -User Comum -  Username : MonteiroNormal , Password : normal123.
  
  
É necessário fazer Login com o gestor no backend para ter acesso á 'Área de gestor'. 


Testes:

Base de dados para testes localizada na pasta do projeto "yii2tests".

Em casos raros , existe a possiblidade de erro em relação ao id do user , neste caso criar 2 utilizadores na base de dados "yii2tests" um com id:2 username:MonteiroTeste e
outro com id:3 username:Monteiro.

  Unitários: 4 FRONTEND
  
      -userTest  -- php vendor/bin/codecept run unit userTest -c -frontend
        -Testes para:
         -Criar Utilizador.
         -Validar Username.
         -Validar Password.
         -Validar Email.
         -Testar Alteração do username.
         -Testar Alteração da password.
         -Testar Alteração do email.
         -Testar Apagar o Utilizador.

      -ofertaTest  -- php vendor/bin/codecept run unit ofertaTest -c -frontend
       -Testes para:
        -Criar uma oferta.
        -Alterar o montante de uma oferta
      
      
      -leilaoTest  -- php vendor/bin/codecept run unit leilaoTest -c -frontend
      Testes para:
        -Criar um leilão.
        -Alterar o titulo do leilão.
        -Alterar a descrição do leilão.
        -Validar o campo Preço base.
      
      
      -venda test  -- php vendor/bin/codecept run unit vendaTest -c -frontend
      Testes para:
        -Criar uma venda.
        -Alterar o titulo da venda.
        -Alterar a descrição da venda.
        -Validar o campo Preço.
        
        
      
  Funcionais: 3 FRONTEND
  
     -leiloesCest  -- php vendor/bin/codecept run functional leiloesCest -c -frontend
      Testes para:
        -Criar uma oferta a um leilão.
        -Criar um leilão.
        -Alterar um Leilão.
        -Apagar um Leilão.
        

      -LoginValidationCest  -- php vendor/bin/codecept run functional LoginValidationCest -c -frontend
      Testes para:
        -Login sem campos preenchidos.
        -Login sem preencher o username.
        -Login sem preencher a password.
        -Login Válido.
        -Login com dados Incorretos.
        
        
      
      -vendasCest  -- php vendor/bin/codecept run functional vendasCest -c -frontend
      Testes para:
        -Aceder á pagina de detalhes do autor da venda.
        -Criar uma venda.
        -Alterar os dados de uma Venda.
        -Apagar uma Venda.
      
  Funcionais: 2 BACKEND
  
     -LoginBackendCest  -- php vendor/bin/codecept run functional LoginBackendCest -c -backend
      Testes para:
        -Login com utilizador admin (Login Works)
        -Login com utilizador nao autorizado a aceder ao backend (LoginFails)
        

      -UserCest  -- php vendor/bin/codecept run functional UserCest -c -frontend
      Testes para:
        -Criar um utilizador novo
        -Tentar criar um utilizador sem preencher os campos
      
      
