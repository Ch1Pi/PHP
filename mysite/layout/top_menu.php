<header class="row">
            <div class="col-5 p-0">
                <img src="Photo/creditcard.png" alt="logo">
                <a href="index.php?action=main"><h1>EMPIRE</h1></a>
            </div>
            <div class="col-7 p-0">
                <nav>
                    <a href="#group">ГРУПОВІ ЗАНЯТТЯ</a>
                    <a href="#abonement">АБОНЕМЕНТ</a>
                    <a href="index.php?action=about">ПРО НАС</a>
                    <a href="#contact">КОНТАКТИ</a>
                    <?php
				if(!empty($_SESSION["user"]) && !empty($_SESSION["user"]["login"])){
			?>
			<a href="index.php?action=logout" class="last">ВИЙТИ</a>
			<?php
			} 
				else{
			?>
			<a href="index.php?action=login">УВІЙТИ</a>
			<?php
	
			}?>
                </nav>
            </div>
        </header>