// creating app and injecting slider module
var app = angular.module("MyApp", ['rzModule'])

//creating controller
app.controller("searchController", function ($scope, $http) {


    //toggle menu
    $(".toggler").click(function(){
        if($(".toggler").hasClass("activeTogg")){
            
            $("#menu").removeClass("slideInLeft");
            $(".toggler").removeClass("activeTogg");
            $("#menu").addClass("slideOutLeft");
            setTimeout(function(){
                $("#menu").css("display","none");
            }, 1000)
            
            
        }
        else{
            $("#menu").show();
            $("#menu").removeClass("slideOutLeft");
            $(".toggler").addClass("activeTogg");
            $("#menu").addClass("slideInLeft");
            
            
        }
            
    });
            //ajax searching for min/max value of phone components
            $http.get("php/range.php")
                .then(function (result) {

                        // creating ajax variable
                        $scope.range = result.data;

                        //data needed to display sliders
                        //size range of phone
                        $scope.size = {
                            minValue: $scope.range[0]["sizeMinimum"],
                            maxValue: $scope.range[0]["sizeMaximum"],
                            options: {
                                floor: $scope.range[0]["sizeMinimum"],
                                ceil: $scope.range[0]["sizeMaximum"],
                                step: 0.1,
                                precision: 1
                            }
                        };
                        //RAM size
                        $scope.ram = {
                            minValue: $scope.range[1]["ramMinimum"],
                            maxValue: $scope.range[1]["ramMaximum"],
                            options: {
                                floor: $scope.range[1]["ramMinimum"],
                                ceil: $scope.range[1]["ramMaximum"],
                                step: 500
                            }
                        };

                        //memory size
                        $scope.memory = {
                            minValue: $scope.range[2]["memoryMinimum"],
                            maxValue: $scope.range[2]["memoryMaximum"],
                            options: {
                                floor: $scope.range[2]["memoryMinimum"],
                                ceil: $scope.range[2]["memoryMaximum"],
                                step: 10
                            }
                        };


                        //battery size
                        $scope.battery = {
                            minValue: $scope.range[3]["batteryMinimum"],
                            maxValue: $scope.range[3]["batteryMaximum"],
                            options: {
                                floor: $scope.range[3]["batteryMinimum"],
                                ceil: $scope.range[3]["batteryMaximum"],
                                step: 500
                            }
                        };

                        // display data from database
                        $http.get("php/display.php")
                            .then(function (response) {
                                $scope.phones = response.data;
                            });
                        $http.get("php/resolution.php")
                            .then(function (result) {
                                $scope.checks = result.data;
                                $scope.searchResolution = function(reso){
                                    console.log(reso)
                                }
                                });
                                //===== creating custom filters =====

                                //size of phone display filter
                                //if phone.size is between min and max, show this item
                                $scope.searchSize = function (item) {

                                    if (item.size >= $scope.size.minValue &&
                                        item.size <= $scope.size.maxValue) {

                                        return true;
                                    } else {
                                        return false;
                                    }
                                }

                                //size of phone RAM filter
                                //if phone.ram is between min and max, show this item
                                $scope.searchRam = function (item) {

                                    if (item.ram >= $scope.ram.minValue &&
                                        item.ram <= $scope.ram.maxValue) {

                                        return true;
                                    } else {
                                        return false;
                                    }
                                }



                                //size of phone memory filter
                                //if phone.memory is between min and max, show this item
                                $scope.searchMemory = function (item) {

                                    if (item.memory >= $scope.memory.minValue &&
                                        item.memory <= $scope.memory.maxValue) {

                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
                                //size of phone battery filter
                                //if phone.batt is between min and max, show this item
                                $scope.searchBattery = function (item) {

                                    if (item.battery >= $scope.battery.minValue &&
                                        item.battery <= $scope.battery.maxValue) {

                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
                                // ===== end of filters =====

                            }); // AJAX end
                });