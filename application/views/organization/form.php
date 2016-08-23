<div id="main-content" class="clearfix">
    <div id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo site_url();?>">Home</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>

            <li>
                <a href="<?php echo site_url('organization');?>">Insurance</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>
            <li class="active"><?php if($action == 'edit'){?>Edit<?php }else{?>Add<?php }?></li>
        </ul><!--.breadcrumb-->

        <!--<div id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="input-small search-query" id="nav-search-input" autocomplete="off" />
                    <i class="icon-search" id="nav-search-icon"></i>
                </span>
            </form>
        </div>--><!--#nav-search-->
    </div>

    <div id="page-content" class="clearfix">
        

        <div class="row-fluid">
            <!--PAGE CONTENT BEGINS HERE-->

            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                       
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row-fluid">
                                    <div class="step-content row-fluid position-relative">
                                        <div class="step-pane active" id="step1">
                                          
											
                                            <?php if(validation_errors()){?>
                                            <div class="errorSummary"><p>Please fix the following input errors:</p>
                                                <ul>
                                               		<?php echo validation_errors('<li>', '</li>'); ?>
                                                </ul>
                                            </div>
                                            <?php }?>
                                            <form class="form-horizontal"  method="post" action="" name="frm">
                                            	
                                                 <div class="control-group  <?php if(form_error('organization')){?>error<?php }?>">
                                                    <label class="control-label" for="organization_name">Insurance Name:</label>

                                                    <div class="controls">
                                                       <input type="text" id="organization_name" name="organization_name" class="span6" value="<?php echo $row['organization_name']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="organization_short_name"> Short Name:</label>

                                                    <div class="controls">
                                                         <input type="text" id="organization_short_name" name="organization_short_name" class="span6" value="<?php echo $row['organization_short_name']?>">
                                                       
                                                    </div>
                                                </div>
                                                 <div class="control-group">
                                                    <label class="control-label" for="address">Address:</label>

                                                    <div class="controls">
                                                         <input type="text" id="address" name="address" class="span6" value="<?php echo $row['address']?>">
                                                       
                                                    </div>
                                                </div>
                                              	  
                                                                                               
                                                <hr />
                                    
                                                 <?php  if($this->session->userdata('roles_insert')==1) {?>
                                                <div class="form-actions">
                                                   
                                                    <button class="btn btn-info" type="submit">
                                                        <i class="icon-ok bigger-110"></i>
                                                        Submit
                                                    </button>
                    
                                                    &nbsp; &nbsp; &nbsp;
                                                    <button class="btn" type="reset">
                                                        <i class="icon-undo bigger-110"></i>
                                                        Reset
                                                    </button>
                                     <?php } ?>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div><!--/widget-main-->
                        </div><!--/widget-body-->
                    </div>
                </div>
            </div>

            <!--PAGE CONTENT ENDS HERE-->
        </div><!--/row-->
    </div><!--/#page-content-->

   
</div><!--/#main-content-->
</div>
<style>
.errorSummary ul li{
	color:#F00;
}
.lighter{
	width:98%;
}
</style>
		