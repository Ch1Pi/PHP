<?php 
    $flag=false;
    if(!empty($_POST)){ 
        $result = $mysqli->query("SELECT * FROM users WHERE login = '$_POST[log]';");
        $user = $result->fetch_assoc();
        if($user && password_verify($_POST["password"],$user["password"])){  
            $_SESSION["user"] = ["id"=>$user["id"], "login"=>$user["login"], "isAdmin"=>$user["admin"]];
            $flag=true;
            header("Location: index.php?action=index");
        }
        if(!$flag){
            ?>
                <div class="error">
                    <p>
                        Невірно введений логін або пароль. Спробуйте ще раз. 
                    </p>
                </div>
            <?php
        }
    }

?>

<div class="login">
    <div class="inside1">    
        <form action="index.php?action=login" method="POST">
            <div>
                <span class="title">Авторизація</span></br>
            </div>
            <div class="mt">
                <label>Логін</label>
                <input type="text" name="log">
            </div>
            <div class="password">
                <label>Пароль</label>
                <input type="password" name="password">
            </div>
            <div class="btn">
                <input type="submit" value="Увійти"/>
            </div>
            <div class="info">
                <p>Не маєте аккаунта? Зареєструйтесь</p>
            </div>
        
            <button><a href="index.php?action=registration">Зареєструватись</a></button>
            
        </form>
    </div>
</div>