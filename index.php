<!doctype html>
<html lang="pl" ng-app="MyApp">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smartphones</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- AngularJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular.js"></script>

    <!-- scripts -->
    <script src="js/scripts.js"></script>

    <!-- slider directive -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.0.0/rzslider.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.0.0/rzslider.min.css">

</head>

<body ng-controller="searchController">
    <div class="container-fluid">
        <div class="row">
            <!--left menu-->
            <ul class="nav flex-column col-xs-12 col-sm-4 col-md-3 col-lg-2 custom-nav">

                <li class="nav-item custom-center">
                    <label for="name">Nazwa modelu</label>
                    <input type="text" class="form-control form-control-sm" id="name" ng-model="name" placeholder="Szukaj...">
                </li>
                <li class="nav-item custom-center">
                    Przekątna ekranu (Cale)
                    <rzslider class="custom-slider" rz-slider-model="size.minValue" rz-slider-high="size.maxValue" rz-slider-options="size.options"></rzslider>

                </li>

                <li class="nav-item custom-center">
                    Pamięć RAM (MB)
                    <rzslider class="custom-slider" rz-slider-model="ram.minValue" rz-slider-high="ram.maxValue" rz-slider-options="ram.options"></rzslider>

                </li>

                <li class="nav-item custom-center">
                    Pamięć wewnętrzna (GB)
                    <rzslider class="custom-slider" rz-slider-model="memory.minValue" rz-slider-high="memory.maxValue" rz-slider-options="memory.options"></rzslider>

                </li>

                <li class="nav-item custom-center">
                    Pojemność baterii (mAh)
                    <rzslider class="custom-slider" rz-slider-model="battery.minValue" rz-slider-high="battery.maxValue" rz-slider-options="battery.options"></rzslider>

                </li>
                <li class="nav-item custom-center">
                    <div>Rozdzielczość ekranu</div>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="720x1" value="option1">
                            <label class="form-check-label" for="720x1">720x1440px</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="720x2" value="option2">
                            <label class="form-check-label" for="720x2">720x1920px</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="720x3" value="option1">
                            <label class="form-check-label" for="720x3">720x1920px</label>
                        </div>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="720x4" value="option2">
                            <label class="form-check-label" for="720x4">720x1440px</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="480x1" value="option1">
                            <label class="form-check-label" for="480x1">480x960px</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="480x2" value="option2">
                            <label class="form-check-label" for="480x2">480x960px</label>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- end of menu-->
            <!--  -->

            <div class="container-fluid col-lg-9">
                <div class="row justify-content-lg-center">
                   <div class="col-lg-9">Znaleziono {{ count.length}} / {{ phones.length}} elementow.</div>
                    <div ng-repeat="phone in phones | filter: phone.name = name | filter: searchSize | filter: searchRam | filter: searchBattery | filter: searchMemory
                       | limitTo: 9 as count" class="col-lg-3 custom-card">
                        <div>Nazwa: {{phone.name}}</div>
                        <div>System: {{phone.system}}</div>
                        <div>Ram: {{phone.ram}}MB</div>
                        <div>Memory: {{phone.memory}}GB</div>
                        <div>Battery: {{phone.battery}}mAh</div>
                        <div>Resolution: {{phone.resolution}}</div>
                        <div>Ekran: {{phone.size}}&quot;</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>

</html>
