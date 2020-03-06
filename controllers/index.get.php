<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Snippy</title>

    <!-- Scripts -->

    <!-- Styles -->
    <link href="/assets/chota.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/cm/lib/codemirror.css">
</head>
<body class="padding-top">
    <div id="app">
        <p><textarea name="code"></textarea></p>
    </div>
    <script src="/assets/cm/lib/codemirror.js"></script>    
    <script >
    CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        // mode: "htmlmixed"
    });        
    </script>    
</body>
</html>
