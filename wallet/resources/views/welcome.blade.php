<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script type="text/javascript" src="/js/index.js"></script>
    </head>
    <body>
        <div ng-controller="Hello">
            <p>The ID is {{greeting.id}}</p>
            <p>The content is {{greeting.content}}</p>
        </div>
    </body>
</html>
