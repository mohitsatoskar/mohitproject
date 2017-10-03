<div class="container-fluid pd" data-ng-controller="mainController">
    <div class="container">

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
            <?php $this->load->view('user/layout/navbar'); ?>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" >
            <div class="row mg-t-5">
                <div class="brv">
                    <div class="brw">
                        <h6 class="bry">{{menuName}}</h6>
                        <h2 class="brx">{{menuDesc}}</h2>
                    </div>
                </div>
                <hr class="dividerline mg-b-10">
            </div>

            <div class="row forms">
                <div class="brv">
                    <div class="brw">
                        <!--{{allImageData|json}}-->
                        <!--allImageData is json array. Each record is fetch by angularjs ng-repeat-->
                        <div class="galImage" data-ng-repeat="image in allImageData">
                            <div class="well" data-ng-if="image.gId" style="width:200px;height:200px;">
                                <a href="" data-ng-if="image.gImgUrl" title="{{image.gName}}" desc="{{image.gDesc}}" ng-click="imgClick(image.gId);">
                                    <img id="thumbnail{{image.gId}}" title="{{image.gName}}" src="{{image.gImgUrl}}" alt="{{image.gName}}" width="100%" >                                            
                                </a>
                                <a href="" data-ng-if="image.gImgBlob" title="{{image.gName}}" desc="{{image.gDesc}}" ng-click="imgClick(image.gId);">
                                    <img id="thumbnail{{image.gId}}" title="{{image.gName}}" src="{{image.gImgBlob}}" alt="{{image.gName}}" width="100%">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-capitalize"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div id="modal-src" class="modal-body "></div>
                    <div class="col-md-12 description">
                        <h4 class="modal-desc text-capitalize"></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="alertmsg">
            <div data-ng-if="alertMsg !== ''">
                <div class="alert alert-{{alertName === 'error' ? 'danger' : 'success'}}" >
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{alertName === 'error' ? 'Error!' : 'Success!'}}</strong> {{alertMsg}}
                </div>                    
            </div>                
        </div>

    </div>
</div>