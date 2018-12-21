
 
 <!DOCTYPE html>
  <html>
  <?php
   require('headera.php');
    ?>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
       <script type="text/javascript" src="js/javas.js"></script>
        
<style>
            .card { 
			background: linear-gradient(180deg, #d20a28, #8c2332);
               /* background-color:#8c2332;*/
               
				margin-left: 30%;
                margin-right: 30%;
                margin-top: 10%;
    padding: 3%;
               
}        
    body{
background-image: url(img/Fondo_HWW.png);
		 background-color: #fff;
	min-height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
	background-size: cover;
    }
	.btn{
		color: #8c2332;
	}
	
            </style>

  
<!--        contenedor-->
        <main>
          <!--        Aqui comienza nav-->
       <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center">HAFELE DE MEXICO S.A. DE C.V.</a>
      
      
    </div>
  </nav>
        <!-- Page Content goes here -->
        <div class="card z-depth-5">
        <h3>Cobranza hafele</h3>
        <h5>Login</h5>
        <form action="validacion.php" onsubmit="return " method="post">
           <div class="row">
            
                <div class="input-field col s12">
                    <input id="user" name="usuario" type="text" id="usuario" class="validate">
                    <label for="user">Usuario: (HMX****)</label>
                </div>
            
           
                <div class="input-field col s12">
                    <input type="password" name="password" id="password" class="validate">
                    <label for="password">Contrase&ntilde;a</label>
                </div>
                  
             </div>
            <div class="row">
                <div class="input-field col s12 center pulse">
                    <button class="waves-effect waves-red btn white" type="submit" name="entrar">Entrar
                    <i class="material-icons right">send</i>
                    
                    </button>
                </div>
            </div>
            
             </form>
        </div>
     
      
        </main>
    </body>
  </html>
 