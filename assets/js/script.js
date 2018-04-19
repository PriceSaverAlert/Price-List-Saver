var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "home.php"
    })
    .when("/login", {
        templateUrl : "login.php"
    })
    .when("/registration", {
        templateUrl : "registration.php"
    });
});