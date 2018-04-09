  <?php
  include('welcomeAdmin.php');
  ?>     


       <h1 align="center">Modifier le mot de passe d'un compte </h1>
    <table cellspacing='15px' border='0px' align="center">
    <form action = 'modifierParAdmin.php' method = 'post'>
    <tr>
        <td>Login du compte :</td><td> <input type = 'text' name = 'username'><p></td>
    </tr>
    <tr>
    	<td>Nouveau mot de passe :</td><td> <input type = 'password' name='password1'><p></td>
    </tr>
    <tr>
    	<td>Confirmer  mot de passe :</td><td> <input type = 'password' name='password2'><p></td>
    </tr>
        <tr>
    	<td>Saisir votre mot de passe :</td><td> <input type = 'password' name='password3'><p></td>
    </tr>
    <tr>
    	
    	<td align="right"><input type = 'submit' value="Modifier"></td>
    </tr>
    </form>
    </table>

   


</html>