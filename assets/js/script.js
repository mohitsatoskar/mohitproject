app = angular.module('mohit', []);
app.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    }]);


// create the controller and inject Angular's $scope
app.controller('uploadController', ['$scope', '$http', 'Data', function($scope, $http, Data) {
        $scope.SuploadData = {};
        $scope.GuploadData = {};
        $scope.menuName = 'Upload Image';
        $scope.menuDesc = 'Uploading Images with S3 Bucket';
        $scope.alertName = "";
        $scope.alertMsg = "";

        $(window).load(function() {
            $scope.gridview(); //on website load it show image
        });
        
        //alert msg after success or error
        $scope.msgFun = function() {
            $('.alertmsg').css('display', 'block').delay(5000).queue(function(n) {
                $('.alertmsg').css('display', 'none');
                n();
            });
        };
        
        //inserting upload data
        $scope.submitData = function() {
            $http.post(site_url + "User_controller/AUploadS/", $scope.SuploadData).success(function(data) {
                setTimeout(function() {
                    $scope.SuploadData = null;
                    $scope.msgFun(); //it show alert msg
                    $scope.gridview(); //on website load it show image
                    $scope.alertMsg = "Insert Successfully!";
                    $scope.alertName = "success";
                }, 2000);
            });

        };
        //fetch images records.
        $scope.gridview = function() {
            //we have use angularjs services for fetching data
            Data.getuploaddata().success(function(data) {
                $scope.GuploadData = data;
            });
        };

    }]);

// create the controller and inject Angular's $scope
app.controller('mainController', ['$scope', '$http', 'Data', function($scope, $http, Data) {
        $scope.allImageData = {};
        $scope.menuName = 'Images';
        $scope.menuDesc = 'Listed Images';
        $scope.alertName = "";
        $scope.alertMsg = "";

        $(window).load(function() {
            $scope.gridview(); //on website load it show image
        });

        $scope.gridview = function() {
            //we have use angularjs services for fetching data
            Data.getuploaddata().success(function(data) {
                $scope.allImageData = data;
            });
        };
        
        //on image click it show details information of image
        $scope.imgClick = function($id){
            $('.modal-body').empty();
            var title = $('#thumbnail'+$id).attr("title");            
            $('.modal-title').html(title);
            var desc = $('#thumbnail'+$id).parent('a').attr("desc");
            $('.modal-desc').html(desc); 
            var src = $('#thumbnail'+$id).attr("src");
            $('#modal-src').html('<img src="'+src+'" style="width:100%"/>');
            $('#myModal').modal({show: true});
        };
          

    }]);

//to file type data, this attributes is required
app.directive('appFilereader', function($q) {
    var slice = Array.prototype.slice;
    return {
        restrict: 'A',
        require: '?ngModel',
        link: function(scope, element, attrs, ngModel) {
            if (!ngModel)
                return;
            ngModel.$render = function() {
            };
            element.bind('change', function(e) {
                var element = e.target;
                $q.all(slice.call(element.files, 0).map(readFile))
                        .then(function(values) {
                            if (element.multiple)
                                ngModel.$setViewValue(values);
                            else
                                ngModel.$setViewValue(values.length ? values[0] : null);
                        });
                function readFile(file) {
                    var deferred = $q.defer();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        deferred.resolve(e.target.result);
                    };
                    reader.onerror = function(e) {
                        deferred.reject(e);
                    };
                    reader.readAsDataURL(file);
                    return deferred.promise;
                }
            }); //change
        } //link
    }; //return
});


app.service('Data', function($http) {
    //get image records from controller
    this.getuploaddata = function() {
        return $http.get(site_url + "User_controller/AGetimages/");
    };

});

