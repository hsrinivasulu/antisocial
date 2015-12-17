<!DOCTYPE html>

<html>

    <head>

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
    
        <div class="container">
            
            <div id="top">
            
                <h1><?= WEBNAME ?></h1>
                <!-- TODO: Put in navbar -->
            
            </div>
            
            <div id = "middle">
