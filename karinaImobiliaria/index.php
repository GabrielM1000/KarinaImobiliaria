<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Karina Imobiliaria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="icon" href="img/logo.png">
</head>
<body>
  <div class="container" >
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login" >
        <form action="login.php" method="Post" > 
          <h1>Login</h1> 
          <p> 
            <label for="email_login">E-mail</label>
            <input id="email_login" name="email_login" required="required" type="text" placeholder="ex. contato@misael.com"/>
          </p>
           
          <p> 
            <label for="senha_login">Senha</label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="ex. Senha" /> 
          </p>
          <p> 
            <input type="submit" value="Entrar" name="login" /> 
          </p>
        </form>
      </div>
    </div>
  </div>  
</body>
</html>