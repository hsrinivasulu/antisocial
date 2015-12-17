<!DOCTYPE html>

<html>

    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        
        <?php if (isset($title)): ?>
            <title><?= WEBNAME . ": " . filter($title) ?></title>
        <?php else: ?>
            <title><?= WEBNAME ?></title>
        <?php endif ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        
    </head>
    
    <body>
            
        <div id="top">
