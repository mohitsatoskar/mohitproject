<div class="container-fluid pd" ng-controller="uploadController">
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
                <form  enctype='multipart/form-data' data-ng-submit="submitData()" name="uploadImage">
                    <div class="col-lg-12 pd">

                        <div class="col-lg-6">
                            <div class="form-group"> 
                                <label for="name">Caption</label> 
                                <input type="text" class="form-control" tabindex="2" data-ng-model="SuploadData.gName" id="gName" name="gName" > 
                                <p class="help-block">Less then two words.</p>                                
                            </div> 
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> 
                                <label for="name">Description</label> 
                                <input type="text" class="form-control" tabindex="3" data-ng-model="SuploadData.gDesc" id="gDesc" name="gDesc" >                                                           
                                <p class="help-block">Long Description.</p>
                            </div> 
                        </div> 
                        
                    </div>
                    
                    
                    <div class="col-lg-12 pd"> 
                        <div class="col-lg-6">
                            <div class="form-group"> 
                                <label for="name">S3 Bucket Image Url </label> 
                                <input type="text" class="form-control" tabindex="4" data-ng-model="SuploadData.gImgUrl" id="gImgUrl" name="gImgUrl" >
                                <p class="help-block">Note: Use anyone of the functionality</p>
                            </div> 
                        </div>
                        <div class="col-lg-6">
                            <label for="inputfile">Direct Upload</label> 
                            <input type="file" id="gImgBlob" name="gImgBlob" tabindex="5" app-Filereader data-ng-model="SuploadData.gImgBlob"> 
                            <p class="help-block">Upload File less than 800kb</p>
                            <p class="help-block">Note: Use anyone of the functionality</p>
                        </div>
                    </div>
                    <div class="col-lg-12 text-right">
                        <input type="submit" tabindex="6" class="btn btn-primary save" value="Upload" />
                        <button type="button" tabindex="7" class="btn btn-danger" data-ng-click="close()">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="row mg-t-20">
                <div class="nu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="ck" data-sort="table">
                        <thead>
                            <tr>
                                <th class="header" >ID</th>
                                <th class="header" >Caption</th>                                
                                <th class="header" >Description</th>
                                <th class="header" >Image Url</th>
                                <th class="header" >Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-ng-repeat="p in GuploadData ">
                                <td>{{p.gId}}</td>
                                <td>{{p.gName}}</td>
                                <td>{{p.gDesc}}</td>
                                <td>{{p.gImgUrl}}</td>
                                <td><img data-ng-if="p.gImgBlob" src="{{p.gImgBlob}}" style="width:42px;"/><img data-ng-if="p.gImgUrl" src="{{p.gImgUrl}}" style="width:42px;"/></td>                            
                            </tr>
                        </tbody>
                    </table>
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
</div>