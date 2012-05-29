<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/common.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/slider/slider.css" />
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/slider/noscript.css" />
	</noscript>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/tag.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/not_implemented.js"></script>

    
	<title>Cooz Cooz</title>
</head>
<body>
	<?php
        include("header.php");
    ?>
	<div id="content" class="roundedBorders">
        <h2>Cadastrar Receita</h2>
        <form method="POST" action="">

            <label for="name">Título</label>
            <input type="text" name="name" id="name" /><br />

            <label for="ingredients">Ingredientes</label>
            <input type="text" name="ingredients" id="ingredients" /><br />

            <label for="time">Tempo de Preparo</label>
            <input type="text" name="time" id="time" /><br />

            <label for="directions">Modo de preparo</label>
            <textarea type="text" name="directions" id="directions"></textarea><br />

            <label for="level">Dificuldade</label>
            <select id="level" name="level">
                <option value="MF">Muito fácil</option>
                <option value="F">Fácil</option>
                <option value="N">Normal</option>
                <option value="D">Difícil</option>
                <option value="MD">Muito Difícil</option>
            </select><br />
            
            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo" /><br />
            
            <input type="button" class="notImplemented" value="Enviar" />
        </form>
	</div>
</body>
</html>
