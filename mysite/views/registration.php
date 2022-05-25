<?php 
    if(!empty($_POST)){ 
        $flag = true;
        if(isset($_POST["login"]) && (preg_match("/[!,.@#$%^&*()+=~?`><№;:]/",$_POST["login"]) || strlen($_POST["login"]) < 4)){
        ?>
            <div class='error'>
                <p>Введіть коректний логін. Логін може містити 
                лише латинські та кириличні літери (великі та малі), цифри,
                нижнє підкреслення та дефіс. Довжина логіну має складати
                не менше 4 символів.
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["password"]) && (!preg_match("/[A-ZА-Я]/",$_POST["password"]) || !preg_match("/[a-zа-я]/",$_POST["password"]) || !preg_match("/\d/",$_POST["password"]) || strlen($_POST["password"]) < 7)){
        ?>
            <div class='error'>
                <p>Пароль має містити в собі малі та великі літери, а також цифри.
                    Довжина паролю також має складати не менше 7 символів. 
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["repeatpassword"]) && !($_POST["password"]==$_POST["repeatpassword"])){
        ?>
            <div class='error'>
                <p>
                    Паролі не співпадають
                </p>
            </div>
        <?php
            $flag=false;
        }

        if(isset($_POST["email"]) && !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$_POST["email"])){
        ?>
            <div class='error'>
                <p>
                    Введіть коректну електронну пошту
                </p>
            </div>
        <?php  
        $flag=false;
        }

        if(isset($_POST["languages"]) && $_POST["languages"]=="none"){
        ?>
            <div class='error'>
                <p>
                    Виберіть мову
                </p>
            </div>
        <?php  
        $flag=false;
        }

        if($flag){
       
            $hash_password = password_hash($_POST["password"],PASSWORD_BCRYPT);
            $query = "INSERT INTO users(login,password,email,language)
                VALUES(".'"'.$_POST["login"].'","'.$hash_password.'","'.$_POST["email"].'","'.$_POST["languages"].'");';
            $mysqli->query($query);
            $mysqli->close();
            require_once("./views/registration_successful.php");
            die;
        }
    }
?>


<div class="reg">
	<div class='inside1'>
        <form action="index.php?action=registration" method="POST">
            <div>
                <span class="title">Реєстрація</span></br>
            </div>
            <div class="mt">
                <label>Логін</label>
                <input type="text" name="login">
            </div>
            <div class="password">
                <label>Пароль</label>
                <input type="password" name="password">
            </div>
            <div class="secontpassword">
                <label>Повторіть пароль</label>
                <input type="password" name="repeatpassword">
            </div>
            <div class="email">
                <label>Електронна пошта</label>
                <input type="text" name="email">
            </div>
            <div class="lng">
                <label>Мова</label>
                <select name="languages">
                    <option value="none">Оберіть мову</option>
                    <?php 
                        $languages = file_get_contents("./views/languages.json");
                        $array = json_decode($languages,true);
                        
                        
                        foreach($array as $key=>$el){
                        ?>
                            <option value="<?php echo $key; ?>"><?php echo $el; ?></option>
                        <?php 
                        }
                        ?>
                </select>
            </div></br>
            <div class="btn">
                <input type="submit" value="Зареєструватись"/>
            </div>
        </form>
    </div>
</div>
