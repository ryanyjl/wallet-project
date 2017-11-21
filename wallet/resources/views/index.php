<!DOCTYPE html>
<html lang="en" ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wallet Project</title>

        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script type="text/javascript" src="/js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Wallet Project</h1>
                      <p class="lead">User​ ​is​ ​already​ ​established​ ​as​ ​john@wallet.io.</p>
                      <p>Wallet​ ​details should​ ​show​ ​at​ ​least​ ​the​ ​wallet​ ​balance,​ ​and​ ​the​ ​three​ ​most​ ​recent​ ​transactions</p>
                      <p>Please refer <a href="#" style="text-decoration: underline;">here</a> for the readme.</p>
                      <hr>
                  <div ng-controller="GetWallet">
                        
                        <h4>{{data.email}}</h4>
                        <button type="button" class="btn btn-primary">
                          Balance <span class="badge badge-light">{{data.balance}}</span>
                        </button>
                        <hr>
                        <div class="page-title">
                            <h4><u>Wallet Details</u></h4>
                        </div>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">Debit</th>
                              <th scope="col">Credit</th>
                              <th scope="col">Created</th>
                              <th scope="col">Modified</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr ng-repeat="n in data.transactions track by $index">
                                <td>{{n.id}}</td>
                                <td>{{n.debit}}</td>
                                <td>{{n.credit}}</td>
                                <td>{{n.created_at}}</td>
                                <td>{{n.updated_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>