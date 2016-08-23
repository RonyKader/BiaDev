<div id="main-content" class="clearfix">
    <div id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>manager">Home</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>

            <li>
                Test Status
            </li>
        </ul><!--.breadcrumb-->
    </div>

    <div id="page-content" class="clearfix">
        <div class="page-header position-relative">
            <h1>
                 Test Status
            </h1>
        </div><!--/.page-header-->
		<?php if($success){?>
        <div class="alert alert-block alert-success">
                <p>
                    <strong>
                        <i class="icon-ok"></i>
                        Success!
                    </strong>
                    <?php echo $success;?>
                </p>
        </div>
        <?php }?>
        
        <?php if($error){?>
        <div class="alert alert-block alert-error">
                <p>
                    <strong>
                        <i class="icon-ok"></i>
                        Error!
                    </strong>
                    <?php echo $error;?>
                </p>
        </div>
        <?php }?>
                           
        <div class="row-fluid">
            <!--PAGE CONTENT BEGINS HERE-->

            <div class="row-fluid">
            
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat wi1dget-header-large">
                            <h4 class="lighter"> Test Status</h4>

                            
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row-fluid">
                                    <div class="step-content row-fluid position-relative">
                                        <div class="step-pane active" id="step1">
                                            
                                            <form class="form-horizontal"  method="post" action="" name="frm">
                                            	
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="id_collector">Collector:</label>

                                                    <div class="controls">
                                                       <select id="id_collector" name="id_collector" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($collectors as $c){?>
                                                            <option value="<?php echo $c->id;?>" <?php if($row['id_collector'] == $c->id){?> selected="selected"<?php }?>><?php echo $c->name;?></option>
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group">
                                                    <label class="control-label" for="stage">Stage:</label>

                                                    <div class="controls">
                                                       <select id="stage" name="stage" class="span4">
                                                       		<option value="">Select</option>
                                                            <option value="data_collection" <?php if($row['stage'] == "data_collection"){?> selected="selected"<?php }?>>Data Collection</option>
                                                            <option value="row_inspector" <?php if($row['stage'] == "row_inspector"){?> selected="selected"<?php }?>>Row Inspection</option>
                                                            <option value="copied_to_warehouse" <?php if($row['stage'] == "copied_to_warehouse"){?> selected="selected"<?php }?>>Copy to Warehouse</option>
                                                            <option value="summarization" <?php if($row['stage'] == "summarization"){?> selected="selected"<?php }?>>Summarization</option>
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group">
                                                    <label class="control-label" for="status">Status:</label>

                                                    <div class="controls">
                                                       <select id="status" name="status" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($status_values as $s){?>
                                                            <option value="<?php echo $s->id;?>"  <?php if($row['status'] == $s->id){?> selected="selected"<?php }?>><?php echo $s->display_text;?></option>
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="last_run">Last Successfull Run:</label>

                                                    <div class="controls">
                                                       <input type="text" name="last_run" id="last_run"  class="span4" value="<?php echo $row['last_run'];?>" />
                                                    </div>
                                                </div>
                                                 
                                                                                               
                                                <hr />
                                    
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
                                                </div>
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

    <div id="ace-settings-container">
        <div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
            <i class="icon-cog"></i>
        </div>

        <div id="ace-settings-box">
            <div>
                <div class="pull-left">
                    <select id="skin-colorpicker" class="hidden">
                        <option data-class="default" value="#438EB9">#438EB9</option>
                        <option data-class="skin-1" value="#222A2D">#222A2D</option>
                        <option data-class="skin-2" value="#C6487E">#C6487E</option>
                        <option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
                    </select>
                </div>
                <span>&nbsp; Choose Skin</span>
            </div>

            <div>
                <input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
                <label class="lbl" for="ace-settings-header"> Fixed Header</label>
            </div>

            <div>
                <input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
            </div>
        </div>
    </div><!--/#ace-settings-container-->
</div><!--/#main-content-->
<style>
.errorSummary ul li{
	color:#F00;
}
.lighter{
	width:98%;
}
</style>
		