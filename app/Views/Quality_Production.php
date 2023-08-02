
<head>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
   <!-- Datetimepicker -->
    <script src="<?php echo base_url(); ?>/assets/js/datetimepicker.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.min.css?version=<?php echo rand() ; ?>">
    <script src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/all-fontawesome.css?version=<?php echo rand() ; ?>"> -->
<style>
  /* filter css design */
  .filterbtnstyle{
    color:white;
    background-color:#005abc;
    /* opacity: 0.7; */
    height:2.4rem;
    margin-top:0.5rem;
    margin-right:0.6rem;
  }
  .filterbtnstyle:hover{
    color:white;
    background-color:#005abc;
    opacity: 0.8;
  }

   
  .icon_img_wh{
      width: 1.2rem;
      height: 1.2rem;
    }
    .icon_img_wh:hover{
      width: 1.2rem;
      height: 1.2rem;
      color:red;
    }
    .notes_check{
        height:1.8rem;
        width:1.8rem;
        display:flex;
        justify-content:center;
        align-items:center;
        background-color:white;
        border-radius:50%;
    }
    .notes_check:hover {
    
        cursor: pointer;
        background-color:#e6e6e6;
    }
      /* notes display property */
   .notes_display{
    min-height:4.8rem;
    max-width:10.9rem;
    min-width:10rem;
    background-color:white;
    margin-left:-15rem; 
    border:1px solid #e6e6e6;
    padding:0.7rem;
    border-radius:10px;
    display:none;
   }

</style>
<script type="text/javascript">
  var checkPastTime = function(inputDateTime) {
      var current = new Date($('.fromDate').val());
      month = '' + (current.getMonth() + 1);
      day = '' + current.getDate();
      year = current.getFullYear();
      if (month.length < 2)
          month = '0' + month;
      if (day.length < 2)
          day = '0' + day;
      c_date =  new Date([year, month, day].join('-'));

      if (typeof(inputDateTime) != "undefined" && inputDateTime !== null) {
          if (inputDateTime.getFullYear() < current.getFullYear()) {
              $('.toDate').datetimepicker('reset');
              //Terminate
          } else if ((inputDateTime.getFullYear() == current.getFullYear()) && (inputDateTime.getMonth() < current.getMonth())) {
              $('.toDate').datetimepicker('reset');
              //Terminate
          }

          if (inputDateTime.getDate() == current.getDate()) {
              if (inputDateTime.getHours() <= (current.getHours())) {
                  $('.toDate').datetimepicker('reset');
              }
              this.setOptions({
                  minTime:(parseInt(current.getHours())+parseInt(1)) + ':00',
                  minDate:c_date
              });
          } else {
              this.setOptions({
                  minTime: false,
                  minDate:c_date
              });
          }

          var tmp = new Date()
          if (inputDateTime.getDate() == tmp.getDate() && inputDateTime.getMonth()==tmp.getMonth()) {
              this.setOptions({
                  maxTime: (tmp.getHours())+ ':00',
              });
          } else {
              this.setOptions({
                  maxTime: false,
              });
          }
      }
  };

  var checkPastTime_F = function(inputDateTime) {
    var current = new Date();
      if (typeof(inputDateTime) != "undefined" && inputDateTime !== null) {
          if (inputDateTime.getDate() == current.getDate()) {
              if (inputDateTime.getHours() > (current.getHours())) {
                  $('.fromDate').datetimepicker('reset');
              }
              if (inputDateTime.getDate()==current.getDate() && inputDateTime.getMonth()==current.getMonth()) {
                this.setOptions({
                  maxTime: (current.getHours())+ ':00',
                });
              }
          } else {
              this.setOptions({
                  maxTime: false,
              });
          }
      }
  };
</script>
</head>
<div class="mr_left_content_sec">
  <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg" >
    <div class="container-fluid paddingm display_f justify_sb align_c">
      <p class="float-start fnt_fam mdl_header">Production Quality</p>
      <div class="d-flex" style="display: flex;align-items: center;">
                <div class="box rightmar" style="margin-right:0.5rem;">
                    <div style="padding-left:10px;padding-right:10px;height:2.3rem;border:1px solid #e6e6e6;border-radius:0.25rem;display:flex;justify-content:center;align-items:center;color:#C00000;"><p style="text-align:center;margin:auto;font-size:15px;font-weight:bold;"><span id="total_rejection_header"></span> Rejects</p></div>
                </div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist" style="border:1px solid #ced4ca;border-radius:0.25rem;padding:0.1rem;margin:auto;margin-right:0.5rem;">
                  <li class="nav-item" role="presentation"  >
                    <i class="fa fa-sitemap nav-link active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="padding:0.4rem;font-size:1.3rem;"></i>
                  </li>
                  <li class="nav-item" role="presentation">
                    <i class="fa fa-calculator nav-link"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="padding:0.4rem;font-size:1.3rem;width: 1.6rem;"></i>
                  </li>
                </ul>
              <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                <div class="input-box">
                  <input type="text" class="form-control fromDate" value="" step="1">
                  <label for="inputSiteNameAdd" class="input-padding ">From DateTime</label>
                </div>
              </div>
              <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                <div class="input-box">
                  <input type="text" class="form-control toDate" value="" step="1">
                  <label for="inputSiteNameAdd" class="input-padding ">To DateTime</label>
                </div>
              </div>

              <!-- overall filter btn -->
              <div class="box rightmar mar_r_box" >
                <button type="button" class="overall_filter_btn overall_filter_header_css"  >Apply Filter</button>
              </div>
        </div>
    </div>
  </nav>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
    <div class="grid-container_graph">
      <div class="row paddingm display_f align_c" style="height:max-content;width:100%;flex-direction:row;justify-content:space-evenly;margin-bottom:0.3rem;">
        <div class="grid-item_graph  paddingm" style="margin-top: 1.5rem;width:49%;margin-left:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0;">Cost of Poor Quality (COPQ) by Reason</p>
          </div>
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 20%;">
              <p class="paddingm headTitle total-margin" style="margin-left:0rem;">TOTAL</p>
              <p class="paddingm valueGraph" ><i class="fa fa-inr inr_font" aria-hidden="true" style="font-size:1rem;"></i><span class="paddingm COPQP" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:80%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing Reasons_COPQP">

                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_copq()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_copqp">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_copq">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing Reasons_COPQP">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_copq()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_copq">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_copq">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing Reasons_COPQP">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_copq()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_copq">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_copq">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="parent_graph_quality_opportunity parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_opportunity child-style">
              <canvas id="COPQP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item_graph  paddingm" style="margin-top: 1.5rem;width:49%;margin-right:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0;">Quality Rejection by Reason</p>
          </div> 
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 17%">
              <p class="paddingm headTitle total-margin" style="margin-left:0rem;">TOTAL</p>
              <p class="paddingm valueGraph" ><span class="paddingm  CRBR" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:83%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_crpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_crpr">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_crpr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_crpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_crpr">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_crpr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_crpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_crpr">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_crpr">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="parent_graph_quality_reason_wise parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_reason_wise child-style">
              <canvas id="QRBR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row paddingm" style="height: max-content;width:100%;display:flex;flex-direction:row;justify-content:space-evenly;alig-items:center;margin-bottom:0.3rem;">
        <div class="grid-item_graph  paddingm" style="width:49%;margin-left:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0rem;">Cost of Poor Quality (COPQ) by Machines</p>
          </div>
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 17%;">
              <p class="paddingm headTitle total-margin" style="margin-left:0;">TOTAL</p>
              <p class="paddingm valueGraph" ><i class="fa fa-inr inr_font" aria-hidden="true" style="font-size:1rem;"></i><span class="paddingm COPQM" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:83%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_copqm()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_copqm">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_copqm">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_copqm()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_copqm">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_copqm">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_copqm()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_copqm">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_copqm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="parent_graph_quality_machine_wise parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_machine_wise child-style">
              <canvas id="COPQM" height="110"></canvas>
            </div>  
          </div>
        </div>
        <div class="grid-item_graph   paddingm" style="width:49%;margin-right:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0rem;">Quality Rejection by Machines with Reasons</p>
          </div>
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 17%;">
              <p class="paddingm headTitle total-margin" style="margin-left:0;">TOTAL</p>
              <p class="paddingm valueGraph" ><span class="paddingm  CRBMR" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:83%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_qrmr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_qrmr">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_qrmr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_qrmr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_qrmr">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_qrmr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_qrmr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_qrmr">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_qrmr">
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <div class="parent_graph_quality_machine_reason parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_machine_reason child-style">
              <canvas id="CRBMR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row paddingm" style="height:max-content;width:100%;display:flex;flex-direction:row;justify-content:space-evenly;align-items:center;margin-bottom:0.5rem">
        <div class="grid-item_graph  paddingm" style="width:49%;margin-left:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0rem;">Cost of Poor Quality (COPQ) by Parts</p>
          </div>
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 17%;">
              <p class="paddingm headTitle total-margin" style="margin:0;">TOTAL</p>
              <p class="paddingm valueGraph" ><i class="fa fa-inr inr_font" aria-hidden="true" style="font-size:1rem;"></i><span class="paddingm CQRP" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:83%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_copqp()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_copqp">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_copqp">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_copqp()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_copqp">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_copqp">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_copqp()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_copqp">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_copqp">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="parent_graph_quality_parts parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_parts child-style">
              <canvas id="CQRP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item_graph  paddingm" style="width:49%;margin-right:0.5rem;height:18rem;">
          <div class="graph-div-header" style="margin-left:1rem;">
            <p class="paddingm fontBold financial_font" style="margin-left:0rem;">Quality Rejection by Parts with Reasons</p>
          </div>
          <div class="valueMarLeft" style="margin-left:1rem;">
            <div style="float: left;width: 17%;">
              <p class="paddingm headTitle total-margin" style="margin-left:0;">TOTAL</p>
              <p class="paddingm valueGraph" ><span class="paddingm  CQRPR" style="font-size:1rem;"></span></p>
            </div>
            <div style="float: left;width:83%;display:flex;flex-direction:row-reverse;justify-content:end;" class="filter_div">
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Reason</span>
                    <div class="filter_selectBox" onclick="multiple_drp_reason_qrpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="reason_text_qrpr">All Reasons</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_reason_qrpr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Machine</span>
                    <div class="filter_selectBox" onclick="multiple_drp_machine_qrpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="machine_text_qrpr">All Machines</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_machine_qrpr">
                    </div>
                  </div>
                </div>
              </div>

              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box indexing">
                  <div class="filter_multiselect filter_option" style="width:9rem;">
                    <span class="multi_select_label" style="">Part</span>
                    <div class="filter_selectBox" onclick="multiple_drp_qrpr()">
                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                        <div style="width: 80% !important">
                          <p class="paddingm" id="part_text_qrpr">All Parts</p>
                        </div>
                        <div class="dropdown-div" style=" width: 20% !important">
                          <i class="fa fa-angle-down icon-style"></i>
                        </div>
                      </div>
                    </div>
                    <div class="filter_checkboxes filter_part_qrpr">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="parent_graph_quality_part_reason parent_graph_div parent-style" style="padding-left:1rem;padding-right:1rem;">
            <div class="child_graph_quality_part_reason child-style">
              <canvas id="CQRPR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav" style="z-index:98;">
      <div class="container-fluid paddingm ">
        <div class="box rightmar" style="margin-left: 0.5rem;width: 10rem;">
            <div class="input-box" style="display: flex;font-size:12px;">
              <input type="number" class="form-control font_weight font_color" name="" id="pagination_val" style="width: 2rem;height:2rem;margin-right:0.5rem;padding:0;font-size:12px;text-align:center;">
              <div class="box rightmar center-align font_color font-size-lable" >
                <p class="paddingm">of <span id="total_pagination"></span> pages</p>
              </div>
            </div>
        </div>
          
        <div class="d-flex innerNav">
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp()">
                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                    <div style="width: 80% !important;">
                      <p class="paddingm" id="part_text">All Parts</p>
                    </div>
                    <div style="width: 80% !important;" class="dropdown-div">
                      <i class="fa fa-angle-down icon-style"></i>
                    </div>
                  </div>
                </div>
                <div class="filter_checkboxes filter_part">
                </div>
              </div>
              <label for="partNameFilter" class="input-padding">Part Name</label>
            </div>
          </div>

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_machine()">
                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                    <div style="width: 80% !important;">
                      <p class="paddingm" id="machine_text">All Machines</p>
                    </div>
                    <div style="width: 80% !important;" class="dropdown-div">
                      <i class="fa fa-angle-down icon-style"></i>
                    </div>
                  </div>
                </div>
                <div class="filter_checkboxes filter_machine">
                </div>
              </div>
              <label for="machineNameFilter" class="input-padding ">Machine Name</label>
            </div>
          </div> 
          
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_reason()">
                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                    <div style="width: 80% !important;">
                      <p class="paddingm" id="reason_text">All Reasons</p>
                    </div>
                    <div style="width: 80% !important;" class="dropdown-div">
                      <i class="fa fa-angle-down icon-style"></i>
                    </div>
                  </div>
                </div>
                <div class="filter_checkboxes filter_reason">
                </div>
              </div>
              <label for="reasonNameFilter" class="input-padding ">Reason</label>
            </div>
          </div> 

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_user()">
                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                    <div style="width: 80% !important;">
                      <p class="paddingm" id="user_text">All Users</p>
                    </div>
                    <div style="width: 80% !important;" class="dropdown-div">
                      <i class="fa fa-angle-down icon-style"></i>
                    </div>
                  </div>
                </div>
                <div class="filter_checkboxes filter_user">
                </div>
              </div>
              <label for="userNameFilter" class="input-padding ">Created by</label>
            </div>
          </div> 

          <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
          <button class="btn fo bn filterbtnstyle settings_nav_anchor float-end" style="margin-right:0.5rem;border-radius:0.25rem;margin-left: 0;margin-top: 0;margin-bottom: 0;" id="add_machine_button" onclick="getFilterval()">Apply Filter</button>
          <!-- </div> -->
          <div class="box rightmar" style="margin-right: 0.5rem;display: flex;justify-content: center;">
            <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;">
          </div>
        </div>
      </div>
    </nav>
    <div class="tableContent">
      <div class="settings_machine_header sticky-top fixtabletitle" style="top: 11.19rem !important;z-index:95;">
        <div class="row paddingm">
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM DATE</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">TO TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm marleft" >
            <p class="basic_header">PART NAME </p>
          </div>
          <div class="col-sm-2 p3 paddingm marleft">
            <p class="basic_header">MACHINE</p>
          </div>
          <div class="col-sm-2 p3 paddingm">
            <p class="basic_header">REJECT COUNTS</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">REASON</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED BY</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED AT</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">NOTES</p>
          </div>
        </div>
      </div>

      <div class="contentQualityFilter contentContainer paddingm " style="margin-bottom:0rem;">
      </div>
    </div>
    </div>
  </div>
 

</div>

 <!-- preloader -->
  <div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
      <span class="loading">Awaiting Completion...</span>
    </div>
  </div>
  <!-- preloader end -->

<script type="text/javascript">

  var copq_hide = 0;

  var filter_array = [];
 
  function getFilterval(){
    var part=[];
    var machine =[];
    var reason= [];
    var user= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }


    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }


    // User Values...
    var user_flag=0;
    $.each($("input[name='user_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        user_flag =1;
      }
      else{
        user.push($(this).val());
      }
    });
    if (user_flag==1) {
      user=[];
      $.each($("input[name='user_filter_val']"), function(){
      if (($(this).val() != "all")) {
        user.push($(this).val());
      }
    });
    }
    
    getTableData(part,machine,reason,user);
  }

  var dt = new Date();
  $('.fromDate').datetimepicker({  
    format:'Y-m-d H:00',
    // minDate : '0',
    maxDate: new Date(),
    onChangeDateTime:checkPastTime_F,
    onShow:checkPastTime_F,
  });

  $('.toDate').datetimepicker({
    format:'Y-m-d H:00',
    onChangeDateTime:checkPastTime,
    onShow:checkPastTime,
    maxDate: new Date()
  });

    var now = new Date();

  var fdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + (now.getHours()-1)).slice(-2)+":00";

  //One week back
  now.setDate(now.getDate() - 6);
  var tdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + now.getHours()).slice(-2)+":00";
  $('.toDate').val(fdate);
  $('.fromDate').val(tdate);

/* temporary hide for this function
  $(document).on('blur','.fromDate',function(){
    $("#overlay").fadeIn(300);
    myFun();
    
  });
  $(document).on('blur','.toDate',function(){
    $("#overlay").fadeIn(300);
    myFun();
    // getFilterval();
  });

  */

  // overall apply filter button function 
  $(document).on('click','.overall_filter_btn',function(event){
    event.preventDefault();
    $("#overlay").fadeIn(300);
    $('.contentQualityFilter').empty();
    myFun();
  });

  $(document).ready(function(){
    $("#overlay").fadeIn(300);
    myFun();
  });

  async function myFun(){
      f = $('.fromDate').val(); 
      t = $('.toDate').val();

      if ((new Date(f) >= new Date(t)) || (t=="")) {
        var x = new Date(f)
        t = x.setHours(x.getHours() + 1);
        t= new Date(t);
        var tdate = t.getFullYear()+"-"+("0" + (parseInt(t.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + t.getDate()).slice(-2)+" "+("0" + t.getHours()).slice(-2)+":00:00";
        $('.toDate').val(tdate);
        t = $('.toDate').val();
      }

    var f_t = new Date(f);
    var t_t = new Date(t);
    var c_t = new Date();
    if (c_t.getFullYear()==f_t.getFullYear() && c_t.getMonth() == f_t.getMonth() && c_t.getDate()==f_t.getDate() && (f_t.getHours()+2) >= c_t.getHours()) {
      var k = f_t.setHours(c_t.getHours()-2);
      var y = f_t.setHours(c_t.getHours()-1);
      k = new Date(k);
      y = new Date(y);
      var fdate = k.getFullYear()+"-"+("0" + (parseInt(k.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + k.getDate()).slice(-2)+" "+("0" + k.getHours()).slice(-2)+":00:00";

      var tdate = k.getFullYear()+"-"+("0" + (parseInt(y.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + y.getDate()).slice(-2)+" "+("0" + y.getHours()).slice(-2)+":00:00";

      $('.fromDate').val(fdate);
      $('.toDate').val(tdate);
      f = $('.fromDate').val();
      t = $('.toDate').val();
    }
    await getfilterdata();
    await copqp();
    await qrbr();
    await copqm();
    await crbmr();
    await qualitybyparts();
    await qualitybyreasonparts();
    getFilterval();
    $("#overlay").fadeOut(300);
  }
  

function multiple_drp() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part').css("display") == "none") {
      $('.filter_part').css("display","block");
  } else {
      $('.filter_part').css("display","none");
  }
}


function multiple_drp_machine() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine').css("display") == "none") {
      $('.filter_machine').css("display","block");
  } else {
      $('.filter_machine').css("display","none");
  }
}

function multiple_drp_reason() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason').css("display") == "none") {
      $('.filter_reason').css("display","block");
  } else {
      $('.filter_reason').css("display","none");
  }
}

function multiple_drp_user() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_user').css("display") == "none") {
      $('.filter_user').css("display","block");
  } else {
      $('.filter_user').css("display","none");
  }
}

function multiple_drp_reason_copq() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_copq').css("display") == "none") {
      $('.filter_reason_copq').css("display","block");
  } else {
      $('.filter_reason_copq').css("display","none");
  }
}

function multiple_drp_machine_copq() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_copq').css("display") == "none") {
      $('.filter_machine_copq').css("display","block");
  } else {
      $('.filter_machine_copq').css("display","none");
  }
}

function multiple_drp_copq() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_copq').css("display") == "none") {
      $('.filter_part_copq').css("display","block");
  } else {
      $('.filter_part_copq').css("display","none");
  }
}


function multiple_drp_reason_crpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_crpr').css("display") == "none") {
      $('.filter_reason_crpr').css("display","block");
  } else {
      $('.filter_reason_crpr').css("display","none");
  }
}

function multiple_drp_machine_crpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_crpr').css("display") == "none") {
      $('.filter_machine_crpr').css("display","block");
  } else {
      $('.filter_machine_crpr').css("display","none");
  }
}

function multiple_drp_crpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_crpr').css("display") == "none") {
      $('.filter_part_crpr').css("display","block");
  } else {
      $('.filter_part_crpr').css("display","none");
  }
}

function multiple_drp_reason_copqm() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_copqm').css("display") == "none") {
      $('.filter_reason_copqm').css("display","block");
  } else {
      $('.filter_reason_copqm').css("display","none");
  }
}

function multiple_drp_machine_copqm() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_copqm').css("display") == "none") {
      $('.filter_machine_copqm').css("display","block");
  } else {
      $('.filter_machine_copqm').css("display","none");
  }
}

function multiple_drp_copqm() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_copqm').css("display") == "none") {
      $('.filter_part_copqm').css("display","block");
  } else {
      $('.filter_part_copqm').css("display","none");
  }
}

function multiple_drp_reason_copqp() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_copqp').css("display") == "none") {
      $('.filter_reason_copqp').css("display","block");
  } else {
      $('.filter_reason_copqp').css("display","none");
  }
}

function multiple_drp_machine_copqp() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_copqp').css("display") == "none") {
      $('.filter_machine_copqp').css("display","block");
  } else {
      $('.filter_machine_copqp').css("display","none");
  }
}

function multiple_drp_copqp() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_copqp').css("display") == "none") {
      $('.filter_part_copqp').css("display","block");
  } else {
      $('.filter_part_copqp').css("display","none");
  }
}

function multiple_drp_reason_qrmr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_qrmr').css("display") == "none") {
      $('.filter_reason_qrmr').css("display","block");
  } else {
      $('.filter_reason_qrmr').css("display","none");
  }
}

function multiple_drp_machine_qrmr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_qrmr').css("display") == "none") {
      $('.filter_machine_qrmr').css("display","block");
  } else {
      $('.filter_machine_qrmr').css("display","none");
  }
}

function multiple_drp_qrmr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_qrmr').css("display") == "none") {
      $('.filter_part_qrmr').css("display","block");
  } else {
      $('.filter_part_qrmr').css("display","none");
  }
}


function multiple_drp_reason_qrpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason_qrpr').css("display") == "none") {
      $('.filter_reason_qrpr').css("display","block");
  } else {
      $('.filter_reason_qrpr').css("display","none");
  }
}

function multiple_drp_machine_qrpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine_qrpr').css("display") == "none") {
      $('.filter_machine_qrpr').css("display","block");
  } else {
      $('.filter_machine_qrpr').css("display","none");
  }
}

function multiple_drp_qrpr() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part_qrpr').css("display") == "none") {
      $('.filter_part_qrpr').css("display","block");
  } else {
      $('.filter_part_qrpr').css("display","none");
  }
}



$(document).on('click','.inbox_part',function(event){
  var index = $('.inbox_part').index(this);
  if(index==0 && $( ".filter_part_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val').length;
  var l2 = $('.filter_part_val:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val');
  jQuery('.filter_part_val').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text').text('No Part');
  }

});


$(document).on('click','.inbox_part_copq',function(event){
  var index = $('.inbox_part_copq').index(this);
  if(index==0 && $( ".filter_part_val_copq:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_copq").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_copq:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_copq").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_copq:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_copq:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_copq:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_copq').length;
  var l2 = $('.filter_part_val_copq:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_copq:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_copq');
  jQuery('.filter_part_val_copq').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_copq').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_copq').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_copq').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_copq').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_copq').text('No Part');
  }

});



$(document).on('click','.inbox_machine',function(event){
  var index = $('.inbox_machine').index(this);
  if(index==0 && $( ".filter_machine_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val').length;
  var l2 = $('.filter_machine_val:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val:eq(0)").prop( "checked", false );
  }


  
  // machine count
  var machine_count = 0;
  var check_if = $('.filter_machine_val');
  jQuery('.filter_machine_val').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text').text(parseInt(machine_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_machine();
      $('#machine_text').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text').text(parseInt(machine_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#machine_text').text('No Machine');
  }

});


$(document).on('click','.inbox_machine_copq',function(event){
  var index = $('.inbox_machine_copq').index(this);
  if(index==0 && $( ".filter_machine_val_copq:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_copq").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_copq:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_copq").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_copq:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_copq:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_copq:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_copq').length;
  var l2 = $('.filter_machine_val_copq:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_copq:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_copq');
  jQuery('.filter_machine_val_copq').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_copq').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_copq').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_copq').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_copq').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_copq').text('No Machine');
  }

});

$(document).on('click','.inbox_reason',function(event){
  var index = $('.inbox_reason').index(this);
  if(index==0 && $( ".filter_reason_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val').length;
  var l2 = $('.filter_reason_val:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val:eq(0)").prop( "checked", false );
  }

  
  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val');
  jQuery('.filter_reason_val').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text').text('No Reason');
  }
});


$(document).on('click','.inbox_reason_copq',function(event){
  var index = $('.inbox_reason_copq').index(this);
  if(index==0 && $( ".filter_reason_val_copq:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_copq").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_copq:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_copq").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_copq:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_copq:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_copq:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_copq').length;
  var l2 = $('.filter_reason_val_copq:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_copq:eq(0)").prop( "checked", false );
  }

  
  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_copq');
  jQuery('.filter_reason_val_copq').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_copq').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_copqp').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_copqp').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_copqp').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_copqp').text('No Reason');
  }
});



$(document).on('click','.inbox_reason_crpr',function(event){
  var index = $('.inbox_reason_crpr').index(this);
  if(index==0 && $( ".filter_reason_val_crpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_crpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_crpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_crpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_crpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_crpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_crpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_crpr').length;
  var l2 = $('.filter_reason_val_crpr:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_crpr:eq(0)").prop( "checked", false );
  }

  
  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_crpr');
  jQuery('.filter_reason_val_crpr').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_crpr').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_crpr').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_crpr').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_crpr').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_crpr').text('No Reason');
  }
});

$(document).on('click','.inbox_part_crpr',function(event){
  var index = $('.inbox_part_crpr').index(this);
  if(index==0 && $( ".filter_part_val_crpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_crpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_crpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_crpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_crpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_crpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_crpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_crpr').length;
  var l2 = $('.filter_part_val_crpr:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_crpr:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_crpr');
  jQuery('.filter_part_val_crpr').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_crpr').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_crpr').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_crpr').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_crpr').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_crpr').text('No Part');
  }

});

$(document).on('click','.inbox_machine_crpr',function(event){
  var index = $('.inbox_machine_crpr').index(this);
  if(index==0 && $( ".filter_machine_val_crpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_crpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_crpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_crpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_crpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_crpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_crpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_crpr').length;
  var l2 = $('.filter_machine_val_crpr:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_crpr:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_crpr');
  jQuery('.filter_machine_val_crpr').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_crpr').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_crpr').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_crpr').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_crpr').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_crpr').text('No Machine');
  }

});


$(document).on('click','.inbox_reason_copqm',function(event){
  var index = $('.inbox_reason_copqm').index(this);
  if(index==0 && $( ".filter_reason_val_copqm:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_copqm").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_copqm:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_copqm").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_copqm:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_copqm:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_copqm:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_copqm').length;
  var l2 = $('.filter_reason_val_copqm:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_copqm:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_copqm');
  jQuery('.filter_reason_val_copqm').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_copqm').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_copqm').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_copqm').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_copqm').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_copqm').text('No Reason');
  }
});

$(document).on('click','.inbox_part_copqm',function(event){
  var index = $('.inbox_part_copqm').index(this);
  if(index==0 && $( ".filter_part_val_copqm:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_copqm").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_copqm:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_copqm").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_copqm:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_copqm:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_copqm:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_copqm').length;
  var l2 = $('.filter_part_val_copqm:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_copqm:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_copqm');
  jQuery('.filter_part_val_copqm').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_copqm').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_copqm').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_copqm').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_copqm').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_copqm').text('No Part');
  }
});

$(document).on('click','.inbox_machine_copqm',function(event){
  var index = $('.inbox_machine_copqm').index(this);
  if(index==0 && $( ".filter_machine_val_copqm:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_copqm").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_copqm:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_copqm").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_copqm:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_copqm:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_copqm:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_copqm').length;
  var l2 = $('.filter_machine_val_copqm:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_copqm:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_copqm');
  jQuery('.filter_machine_val_copqm').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_copqm').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_copqm').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_copqm').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_copqm').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_copqm').text('No Machine');
  }

});



$(document).on('click','.inbox_reason_copqp',function(event){
  var index = $('.inbox_reason_copqp').index(this);
  if(index==0 && $( ".filter_reason_val_copqp:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_copqp").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_copqp:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_copqp").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_copqp:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_copqp:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_copqp:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_copqp').length;
  var l2 = $('.filter_reason_val_copqp:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_copqp:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_copqp');
  jQuery('.filter_reason_val_copqp').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_copqp').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_copqp').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_copqp').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_copqp').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_copqp').text('No Reason');
  }
});

$(document).on('click','.inbox_part_copqp',function(event){
  var index = $('.inbox_part_copqp').index(this);
  if(index==0 && $( ".filter_part_val_copqp:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_copqp").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_copqp:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_copqp").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_copqp:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_copqp:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_copqp:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_copqp').length;
  var l2 = $('.filter_part_val_copqp:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_copqp:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_copqp');
  jQuery('.filter_part_val_copqp').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_copqp').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_copqp').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_copqp').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_copqp').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_copqp').text('No Part');
  }
});

$(document).on('click','.inbox_machine_copqp',function(event){
  var index = $('.inbox_machine_copqp').index(this);
  if(index==0 && $( ".filter_machine_val_copqp:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_copqp").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_copqp:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_copqp").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_copqp:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_copqp:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_copqp:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_copqp').length;
  var l2 = $('.filter_machine_val_copqp:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_copqp:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_copqp');
  jQuery('.filter_machine_val_copqp').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_copqp').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_copqp').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_copqp').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_copqp').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_copqp').text('No Machine');
  }
});

$(document).on('click','.inbox_reason_qrmr',function(event){
  var index = $('.inbox_reason_qrmr').index(this);
  if(index==0 && $( ".filter_reason_val_qrmr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_qrmr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_qrmr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_qrmr").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_qrmr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_qrmr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_qrmr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_qrmr').length;
  var l2 = $('.filter_reason_val_qrmr:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_qrmr:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_qrmr');
  jQuery('.filter_reason_val_qrmr').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_qrmr').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_qrmr').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_qrmr').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_qrmr').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_qrmr').text('No Reason');
  }
});

$(document).on('click','.inbox_part_qrmr',function(event){
  var index = $('.inbox_part_qrmr').index(this);
  if(index==0 && $( ".filter_part_val_qrmr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_qrmr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_qrmr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_qrmr").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_qrmr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_qrmr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_qrmr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_qrmr').length;
  var l2 = $('.filter_part_val_qrmr:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_qrmr:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_qrmr');
  jQuery('.filter_part_val_qrmr').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_qrmr').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_qrmr').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_qrmr').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_qrmr').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_qrmr').text('No Part');
  }
});

$(document).on('click','.inbox_machine_qrmr',function(event){
  var index = $('.inbox_machine_qrmr').index(this);
  if(index==0 && $( ".filter_machine_val_qrmr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_qrmr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_qrmr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_qrmr").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_qrmr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_qrmr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_qrmr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_qrmr').length;
  var l2 = $('.filter_machine_val_qrmr:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_qrmr:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_qrmr');
  jQuery('.filter_machine_val_qrmr').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_qrmr').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_qrmr').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_qrmr').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_qrmr').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_qrmr').text('No Machine');
  }
});

$(document).on('click','.inbox_reason_qrpr',function(event){
  var index = $('.inbox_reason_qrpr').index(this);
  if(index==0 && $( ".filter_reason_val_qrpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val_qrpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val_qrpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val_qrpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val_qrpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val_qrpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val_qrpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val_qrpr').length;
  var l2 = $('.filter_reason_val_qrpr:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val_qrpr:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val_qrpr');
  jQuery('.filter_reason_val_qrpr').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val_qrpr').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text_qrpr').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text_qrpr').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text_qrpr').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text_qrpr').text('No Reason');
  }
});

$(document).on('click','.inbox_part_qrpr',function(event){
  var index = $('.inbox_part_qrpr').index(this);
  if(index==0 && $( ".filter_part_val_qrpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val_qrpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val_qrpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val_qrpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val_qrpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val_qrpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val_qrpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val_qrpr').length;
  var l2 = $('.filter_part_val_qrpr:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val_qrpr:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val_qrpr');
  jQuery('.filter_part_val_qrpr').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val_qrpr').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text_qrpr').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text_qrpr').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text_qrpr').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text_qrpr').text('No Part');
  }
});

$(document).on('click','.inbox_machine_qrpr',function(event){
  var index = $('.inbox_machine_qrpr').index(this);
  if(index==0 && $( ".filter_machine_val_qrpr:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val_qrpr").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val_qrpr:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val_qrpr").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val_qrpr:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val_qrpr:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val_qrpr:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val_qrpr').length;
  var l2 = $('.filter_machine_val_qrpr:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val_qrpr:eq(0)").prop( "checked", false );
  }

  var machine_count = 0;
  var check_if = $('.filter_machine_val_qrpr');
  jQuery('.filter_machine_val_qrpr').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val_qrpr').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text_qrpr').text(parseInt(machine_count)-1+' Selected');
      }else{
      reset_machine();
      $('#machine_text_qrpr').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text_qrpr').text(parseInt(machine_count)+' Selected');
  }else {
    $('#machine_text_qrpr').text('No Machine');
  }
});

$(document).on('click','.copq_filter',function(event){
  copqp();
});
$(document).on('click','.crpr_filter',function(event){
  qrbr();
});
$(document).on('click','.copqm_filter',function(event){
  copqm();
});
$(document).on('click','.qrmr_filter',function(event){
  crbmr();
});
$(document).on('click','.qrpr_filter',function(event){
  qualitybyreasonparts();
});
$(document).on('click','.cpqp_filter',function(event){
 qualitybyparts();
});




$(document).on('click','.inbox_user',function(event){
  var index = $('.inbox_user').index(this);
  if(index==0 && $( ".filter_user_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_user_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_user_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_user_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_user_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_user_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_user_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_user_val').length;
  var l2 = $('.filter_user_val:checked').length;
  if (l2 < l1) {
    $( ".filter_user_val:eq(0)").prop( "checked", false );
  }

  
  
  // user  count
  var user_count = 0;
  var check_if = $('.filter_user_val');
  jQuery('.filter_user_val').each(function(index){
    if (check_if[index].checked===true) {
      user_count = parseInt(user_count)+1;
    }
  });

  var user_len = $('.filter_user_val').length;
  user_len = parseInt(user_len)-1;
  if (parseInt(user_count)>=parseInt(user_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#user_text').text(parseInt(user_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_created();
      $('#user_text').text('All');
    }
  }else if(((parseInt(user_count)<parseInt(user_len))) && (parseInt(user_count)>0)){
    $('#user_text').text(parseInt(user_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#user_text').text('No users');
  }
});



function qualitybyreasonparts() {
  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_qrpr']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_qrpr']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_qrpr']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_qrpr']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_qrpr']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_qrpr']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#CQRPR').remove();
    $('.child_graph_quality_part_reason').append('<canvas id="CQRPR"></canvas>');
    $('.chartjs-hidden-iframe').remove();
    
    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunitypartsreason'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        reason:reason,
        machine:machine,
        part:part
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();

        $('#total_rejection_header').text(res.GrandTotal);
        // res=res["QualityOpportunity"]
        $(".CQRPR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          
        // Find the Reason Names as Lables..........

        var totalVal =[];
        res['Total'].forEach(function(t){
            totalVal.push(parseInt(t));
        });

        var totalVal_percentage =[];
        res['Total'].forEach(function callback(value, index) {
          if (index == 0) {
            totalVal_percentage.push(parseInt((parseInt(value)/parseInt(res.GrandTotal))*100));
          }else if (index == (res['Total'].length-1)) {
            totalVal_percentage.push(100);
          }
          else{
            var temp =  parseInt((parseInt(value)/parseInt(res.GrandTotal))*100);
            totalVal_percentage.push(totalVal_percentage[index-1]+parseInt(temp));
          }
        });

        for (let i = 0; i < totalVal.length; i++) {
          let lowest = i
          for (let j = i + 1; j < totalVal.length; j++) {
            if (totalVal[j] < totalVal[lowest]) {
              lowest = j
            }
          }
          if (lowest !== i) {
            // Swap
            ;[totalVal[i], totalVal[lowest]] = [totalVal[lowest], totalVal[i]]
          }
        }

        var lab = [];
        res['Part_List'].forEach(function(t){
          lab.push(t);
        });
        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= lab.length;
          if (len < 8) {
            lab.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_part_reason').css("width"))+parseInt(l*5*16);
            $('.child_graph_quality_part_reason').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }
        oppCost = [
          {
            label:"Total",
            type: "line",
            backgroundColor: "white",
            borderColor: "#7f7f7f",
            borderWidth: 1, 
            lineColor:"black",
            borderWidth: 1,
            showLine : true,
            fill: false,
            percentage_data:totalVal_percentage,
            // reject:totalReject, 
            data:totalVal_percentage,
            // partName:partNameTotal,
            pointRadius: 7,
            yAxisID: 'A',  
          }           
        ];

        var x=1;
        res['Part'].forEach(function(item){
          var ar=[];
          item['part_1'].forEach(function(val){
            ar.push(val['reject']);
          });
          oppCost.push({
            label: item.reason,
            type: "bar",
            backgroundColor: color[x],
            borderColor: color[x],
            borderWidth: 1,
            fill: true,
            // reject:a,
            data: ar,
            percentage_data:0,
            // partName:partNameHover,
            categoryPercentage:category_percent,
            barPercentage:bar_space,
            yAxisID: 'B',
          });
          x=x+1;
        });
              var ctx = document.getElementById("CQRPR").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: lab,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    A:{
                        type: 'linear',
                        position: 'right',
                        suggestedMin: 0,
                        suggestedMax: 100,
                        display:true,
                        grid:{
                          display:false
                        },
                        // For Percentage.....
                        ticks: {
                          callback: function(value, index, values) {
                            return value + '%';
                          }
                        },
                      },
                    B:{
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true,
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                      },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_oppcost_reaosn_part_tooltip,
                  }
                },
              },
            });
          },
      error:function(er){

        reject(er);
          // alert("Sorry!Try Agian!!!!");
      }
    });
  }); 
  
}

// Quality Rejection by Parts with Reasons
function quality_oppcost_reaosn_part_tooltip(context){
  let tooltipEl = document.getElementById('tooltip-quality_oppcost_partreason');

  // Create element on first render
  if (!tooltipEl) {
    tooltipEl = document.createElement('div');
    tooltipEl.id = 'tooltip-quality_oppcost_partreason';
    document.body.appendChild(tooltipEl);
  }
  tooltipEl.classList.add("global");

  // Hide if no tooltip
  const tooltipModel = context.tooltip;
  if (tooltipModel.opacity === 0) {
    tooltipEl.style.opacity = 0;
    return;
  }

  // Set caret Position
  tooltipEl.classList.remove('above', 'below', 'no-transform');
  if (tooltipModel.yAlign) {
    tooltipEl.classList.add(tooltipModel.yAlign);        
  } else {
    tooltipEl.classList.add('no-transform');
  }

  function getBody(bodyItem) {
    return bodyItem.lines;
  }

  // Set Text
  if (tooltipModel.body) {
        
    const titleLines = tooltipModel.title || [];
    const bodyLines = tooltipModel.body.map(getBody);
    var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
    var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);

    let innerHtml = '<div>';

      innerHtml += '<div class="grid-container">';
      if (parseInt(percentage)>0) {
          innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
          innerHtml += '<div class="grid-item title-bold"><span></span></div>';
          innerHtml += '<div class="content-text sub-title"><span></span></div>';
          innerHtml += '<div class="grid-item title-bold"><span></span></div>';
          innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
          innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
      }
      else{
          innerHtml += '<div class="grid-container">';
          innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
          innerHtml += '<div class="grid-item title-bold"><span></span></div>';
          innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
          innerHtml += '<div class="grid-item title-bold"><span></span></div>';

          innerHtml += '<div class="grid-item content-text" style="height:max-content;"><p>Rejection Count</p></div>';  
          innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
      }
    

      innerHtml += '</div>';
      innerHtml += '</div>';
      tooltipEl.innerHTML = innerHtml;
  }

  const position = context.chart.canvas.getBoundingClientRect();
  const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

  // Display, position, and set styles for font
  tooltipEl.style.opacity = 1;
  tooltipEl.style.position = 'absolute';
  tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
  tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
  tooltipEl.style.font = bodyFont.string;
  tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
  tooltipEl.style.pointerEvents = 'none';
}


function copqp() {

  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_copq']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_copq']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_copq']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_copq']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_copq']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_copq']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#COPQP').remove();
    $('.child_graph_quality_opportunity').append('<canvas id="COPQP"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunity'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        machine:machine,
        part:part,
        reason:reason
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();

        $(".COPQP").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));

        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          
        // Find the Reason Names as Lables..........
        var reasonList =[];
        res['Reason'].forEach(function(res){
            reasonList.push(res);
        });

        var totalVal =[];
        var partNameTotal=[];
        var temp_data = 0;
        var percentage_arr = [];

        // res['Total'].forEach(function(t){
        res['Total'].forEach(function callback(value, index) {
            totalVal.push(value);
            partNameTotal.push("Total");

            if (index == 0) {
              percentage_arr.push(parseInt((parseInt(value)/parseInt(res.GrandTotal))*100));
            }else if (index == (res['Total'].length-1)) {
              percentage_arr.push(100);
            }
            else{
              var temp =  parseInt((parseInt(value)/parseInt(res.GrandTotal))*100);
              percentage_arr.push(percentage_arr[index-1]+parseInt(temp));
            }
        });

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= reasonList.length;
          if (len < 8) {
            reasonList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);
            var w= parseInt($('.parent_graph_quality_opportunity').css("width"))+parseInt(l*5*16);
            $('.child_graph_quality_opportunity').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }

        oppCost = [{
          
          type: 'line',
          label: 'Percentage',
          data:percentage_arr,
          percentage_data: percentage_arr,
          backgroundColor: 'white',
          borderColor: "#7f7f7f", 
          pointBorderColor: "#d9d9ff",  
          borderWidth: 1, 
          showLine : true,
          fill: false,
          lineColor:"black",
          pointRadius:7,
          yAxisID: 'A',
        },
          {
            label:"Total",
            type: "bar",
            backgroundColor: "#0075F6",
            percentage_data: 0,
            borderColor: "#d9d9ff",
            borderWidth: 1,
            showLine : false,
            fill: false,
            // reject:totalReject, 
            data:totalVal,
            partName:partNameTotal,
            categoryPercentage:1.0,
            barPercentage:0.5,
            yAxisID: 'B',  
          }           
        ];
              var ctx = document.getElementById("COPQP").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: reasonList,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    A:{
                      type: 'linear',
                      position: 'right',
                      // beginAtZero: true,
                      suggestedMin: 0,
                      suggestedMax: 100,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Percentage.....
                      ticks: {
                        callback: function(value, index, values) {
                          return value + '%';
                        }
                      },
                    },
                    B:{
                      type: 'linear',
                      position: 'left',
                      beginAtZero: true,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                    },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        ticks: { 
                          color: '#A6A6A6', 
                          beginAtZero: true 
                        }
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_opportunity_tooltip,
                  },
                },
              },
            });
          },
      error:function(er){
        // alert("Sorry!Try Agian!!!!");
        reject(er);
      }
    }); 

  });
}

// Cost of Poor Quality (COPQ) by Reason
function quality_opportunity_tooltip(context){
  let tooltipEl = document.getElementById('tooltip-rejection__reason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-rejection__reason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
     
        let innerHtml = '<div>';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
        }else{
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
        } 
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }
    
    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}

function qualitybyparts() {
  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_copqp']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_copqp']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_copqp']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_copqp']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_copqp']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_copqp']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#CQRP').remove();
    $('.child_graph_quality_parts').append('<canvas id="CQRP"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunityparts'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        reason:reason,
        part:part,
        machine:machine
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();

        // res=res["QualityOpportunity"]
        $(".CQRP").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          

        var totalVal =[];
        var partNameTotal=[];
        var temp_data = 0;
        var percentage_arr = [];
        res['Part'].forEach(function callback(value, index) {
            totalVal.push(value['cost']);
            partNameTotal.push(value['part_name']);

            if (index == 0) {
              percentage_arr.push(parseInt((parseInt(value['cost'])/parseInt(res.GrandTotal))*100));
            }else if (index == (res['Part'].length-1)) {
              percentage_arr.push(100);
            }
            else{
              var temp =  parseInt((parseInt(value['cost'])/parseInt(res.GrandTotal))*100);
              percentage_arr.push(percentage_arr[index-1]+parseInt(temp));
            }
        });

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= partNameTotal.length;
          if (len < 8) {
            partNameTotal.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_parts').css("width"))+parseInt(l*5*16);
            $('.child_graph_quality_parts').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }


        oppCost = [
          {
            type: 'line',
            label: 'Percentage',
            data:percentage_arr,
            percentage_data: percentage_arr,
            backgroundColor: 'white',
            borderColor: "#7f7f7f", 
            pointBorderColor: "#d9d9ff",  
            borderWidth: 1, 
            showLine : true,
            fill: false,
            lineColor:"black",
            pointRadius:7,
            yAxisID: 'A',
          },
          {
            label:"Total",
            type: "bar",
            backgroundColor: "#0075F6",
            percentage_data: 0,
            borderColor: "#d9d9ff",
            borderWidth: 1,
            showLine : false,
            fill: false,
            // reject:totalReject, 
            data:totalVal,
            partName:partNameTotal,
            // pointRadius: 7,
            categoryPercentage:category_percent,
            barPercentage:bar_space,
            yAxisID: 'B',
          }           
        ];

              var ctx = document.getElementById("CQRP").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: partNameTotal,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    A:{
                      type: 'linear',
                      position: 'right',
                      // beginAtZero: true,
                      suggestedMin: 0,
                      suggestedMax: 100,
                      display:true,
                        grid:{
                          display:false
                        },
                      // For Percentage.....
                        ticks: {
                          callback: function(value, index, values) {
                            return value + '%';
                          }
                        },
                      },
                      B:{
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true,
                        display:true,
                        grid:{
                          display:false
                        },
                        // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                      },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        ticks: { 
                          color: '#A6A6A6', 
                          beginAtZero: true 
                        }
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_part_wise_cost_tooltip,
                  }
                },
              },
            });
          },
      error:function(er){
        reject(er);
        // alert("Sorry!Try Agian!!!!");
      }
    }); 
  });
}
// Cost of Poor Quality (COPQ) by Parts tooltip function
function quality_part_wise_cost_tooltip(context){
  let tooltipEl = document.getElementById('tooltip-rejection__partreason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-rejection__partreason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
     
        let innerHtml = '<div>';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
        }else{
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
        }  
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}


function crbmr() {
  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_qrmr']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_qrmr']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_qrmr']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_qrmr']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_qrmr']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_qrmr']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#CRBMR').remove();
    $('.child_graph_quality_machine_reason').append('<canvas id="CRBMR"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunityMachineReason'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        machine:machine,
        part:part,
        reason:reason
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();

        // res=res["QualityOpportunity"]
        $(".CRBMR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          
        // Find the Reason Names as Lables..........
        var machineTotal =[];
        var percentage_arr = [];
        res['Total'].forEach(function callback(value, index) {
            machineTotal.push(value);
            if (index == 0) {
              percentage_arr.push(parseInt((parseInt(value)/parseInt(res.GrandTotal))*100));
            }else if (index == (res['Total'].length-1)) {
              percentage_arr.push(100);
            }
            else{
              var temp =  parseInt((parseInt(value)/parseInt(res.GrandTotal))*100);
              percentage_arr.push(percentage_arr[index-1]+parseInt(temp));
            }
        });

        for (let i = 0; i < machineTotal.length; i++) {
          let lowest = i
          for (let j = i + 1; j < machineTotal.length; j++) {
            if (machineTotal[j] < machineTotal[lowest]) {
              lowest = j
            }
          }
          if (lowest !== i) {
            // Swap
            ;[machineTotal[i], machineTotal[lowest]] = [machineTotal[lowest], machineTotal[i]]
          }
        }

        var machineList =[];
        res['Machine_name'].forEach(function(res){
            machineList.push(res);
        });

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= machineList.length;
          if (len < 8) {
            machineList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_machine_reason').css("width"))+parseInt(l*5*16);
            $('.child_graph_quality_machine_reason').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }

        oppCost = [
          {
            label:"Total" ,
            type: "line",
            backgroundColor: color[0],
            borderColor: "#7f7f7f",
            pointBorderColor: "#d9d9ff",   
            borderWidth: 1, 
            showLine : true,
            fill: false, 
            data:percentage_arr,
            pointRadius: 7,
            borderWidth: 1, 
            lineColor:"black",
            yAxisID: 'A',  
            percentage_data:percentage_arr,
          }           
        ];

        var x = 1;
        res['Rejection'].forEach(function(reasonWise){
          var arr=[];
          reasonWise['Machine'].forEach(function(machineWise){
            arr.push(machineWise['Rejection']);
          });
          oppCost.push({
            label: reasonWise.Reason,
            type: "bar",
            backgroundColor: color[x],
            borderColor: color[x],
            borderWidth: 1,
            fill: true,
            data: arr,
            percentage_data:0,
            categoryPercentage:category_percent,
            barPercentage:bar_space,
            yAxisID: 'B',  
          });
          x=x+1;
        });

              var ctx = document.getElementById("CRBMR").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: machineList,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    // y: {
                    //     display:false,
                    //     beginAtZero:true,
                    //     stacked:true
                    // },
                    A:{
                        type: 'linear',
                        position: 'right',
                        // beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 100,
                        display:true,
                        grid:{
                          display:false
                        },
                        // For Percentage.....
                        ticks: {
                          callback: function(value, index, values) {
                            return value + '%';
                          }
                        },
                      },
                    B:{
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true,
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                      },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        ticks: { 
                          color: '#A6A6A6', 
                          beginAtZero: true 
                        }
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_opportuntiycost_reason_machine_tooltip,
                  }
                },
              },
            });
          },
      error:function(er){
          // alert("Sorry!Try Agian!!!!");
          reject(er);
      }
    }); 
  });
}
//  Quality Rejection by Machines with Reasons tooltip function
function quality_opportuntiycost_reason_machine_tooltip(context){
  let tooltipEl = document.getElementById('tooltip-rejection__machinereason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-rejection__machinereason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);

        let innerHtml = '<div>';
          innerHtml += '<div class="grid-container">';
          if (parseInt(percentage)>0) {
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>'; 
          }
          else{
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="grid-item content-text margin-top"><span>Rejection Count</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
          
          }
         
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}

function copqm() {
  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_copqm']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_copqm']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_copqm']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_copqm']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_copqm']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_copqm']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#COPQM').remove();
    $('.child_graph_quality_machine_wise').append('<canvas id="COPQM"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunityMachine'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        machine: machine,
        part: part,
        reason:reason
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();

        // res=res["QualityOpportunity"]
        $(".COPQM").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          
        // Find the Reason Names as Lables..........
        var machineList =[];
        res['Machine'].forEach(function(res){
            machineList.push(res);
        });

        var machineTotal=[];
        var temp_data = 0;
        var percentage_arr = [];

        res['MachineCost'].forEach(function callback(value, index) {
            machineTotal.push(value);
            if (index == 0) {
              percentage_arr.push(parseInt((parseInt(value)/parseInt(res.GrandTotal))*100));
            }else if (index == (res['MachineCost'].length-1)) {
              percentage_arr.push(100);
            }
            else{
              var temp =  parseInt((parseInt(value)/parseInt(res.GrandTotal))*100);
              percentage_arr.push(percentage_arr[index-1]+parseInt(temp));
            }
        });

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= machineList.length;
          if (len < 8) {
            machineList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_machine_wise').css("width"))+parseInt(l*18*16);
            $('.child_graph_quality_machine_wise').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }

        oppCost = [{
          type: 'line',
          label: 'Percentage',
          data:percentage_arr,
          percentage_data: percentage_arr,
          backgroundColor: 'white',
          borderColor: "#7f7f7f", 
          pointBorderColor: "#d9d9ff",  
          borderWidth: 1, 
          showLine : true,
          fill: false,
          lineColor:"black",
          pointRadius:7,
          yAxisID: 'A',
        },
          {
            label: "partName",
            type: "bar",
            backgroundColor: "#0075F6",
            percentage_data: 0,
            borderColor: "#004b9b",
            borderWidth: 1,
            fill: true,
            // reject:a,
            data: machineTotal,
            // partName:partNameHover,
            categoryPercentage:category_percent,
            barPercentage:bar_space,
            yAxisID: 'B',
          }           
        ];

              var ctx = document.getElementById("COPQM").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: machineList,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    A:{
                      type: 'linear',
                      position: 'right',
                      // beginAtZero: true,
                      suggestedMin: 0,
                      suggestedMax: 100,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Percentage.....
                      ticks: {
                        callback: function(value, index, values) {
                          return value + '%';
                        }
                      },
                    },
                    B:{
                      type: 'linear',
                      position: 'left',
                      beginAtZero: true,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                    },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        ticks: { 
                          color: '#A6A6A6', 
                          beginAtZero: true 
                        }
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_machine_oppcost,
                  }
                },
              },
            });
          },
      error:function(er){
        reject(er);
          // alert("Sorry!Try Agian!!!!");
      }
    }); 

  });
}
// Cost of Poor Quality (COPQ) by Machines tooltip function
function quality_machine_oppcost(context){
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-rejection_machine_reason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-rejection_machine_reason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
     
        let innerHtml = '<div>';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
          }else{
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
          }
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}


function qrbr() {
  return new Promise(function(resolve,reject){

  
    var part=[];
    var machine =[];
    var reason= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_crpr']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val_crpr']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_crpr']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val_crpr']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_crpr']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val_crpr']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }

    if(reason.length ==0 || machine.length ==0 || part.length ==0){
      return;  
    }

    $('#QRBR').remove();
    $('.child_graph_quality_reason_wise').append('<canvas id="QRBR"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Production_Quality/qualityOpportunityRejectionWise'); ?>",
      type: "POST",
      dataType: "json",
      data:{
        from:f,
        to:t,
        reason:reason,
        part:part,
        machine:machine
      },
      success:function(res){
        resolve(res);
        // $('#qualityOpportunity').remove();
        // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        // $('.chartjs-hidden-iframe').remove();
        // res=res["QualityOpportunity"]
        $(".CRBR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
          "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
          "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
          "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
          "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
          "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
          "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
          "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
          "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
          "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
          "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
        ];
          
        // Find the Reason Names as Lables..........
        var reasonList =[];
        res['Reason'].forEach(function(res){
            reasonList.push(res);
        });

        var totalVal =[];
        var partNameTotal=[];
        var temp_data = 0;
        var percentage_arr = [];

        res['Rejection'].forEach(function callback(value, index) {
            totalVal.push(value);
            partNameTotal.push("Total");

            if (index == 0) {
              percentage_arr.push(parseInt((parseInt(value)/parseInt(res.GrandTotal))*100));
            }else if (index == (res['Rejection'].length-1)) {
              percentage_arr.push(100);
            }
            else{
              var temp =  parseInt((parseInt(value)/parseInt(res.GrandTotal))*100);
              percentage_arr.push(percentage_arr[index-1]+parseInt(temp));
            }
        });

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= reasonList.length;
          if (len < 8) {
            reasonList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_reason_wise').css("width"))+parseInt(l*5*16);
            $('.child_graph_quality_reason_wise').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }

        oppCost = [{
          type: 'line',
          label: 'Percentage',
          data:percentage_arr,
          percentage_data: percentage_arr,
          backgroundColor: 'white',
          borderColor: "#7f7f7f", 
          pointBorderColor: "#d9d9ff",  
          borderWidth: 1, 
          showLine : true,
          fill: false,
          lineColor:"black",
          pointRadius:7,
          yAxisID: 'A',

        },
          {
            label:"Total",
            type: "bar",
            backgroundColor: "#0075F6",
            percentage_data: 0,
            borderColor: "#d9d9ff",
            borderWidth: 1,
            showLine : false,
            fill: false,
            // reject:totalReject, 
            data:totalVal,
            partName:partNameTotal,
            // pointRadius: 7,
            categoryPercentage:category_percent,
            barPercentage:bar_space,
            yAxisID: 'B',
          }           
        ];

          // oppCost.push({
          //   label: "partName",
          //   type: "bar",
          //   backgroundColor: "#004b9b",
          //   borderColor: color[x],
          //   borderWidth: 1,
          //   fill: true,
          //   // reject:a,
          //   data: totalVal,
          //   // partName:partNameHover,
          //   categoryPercentage:category_percent,
          //   barPercentage:bar_space,
          // });
              var ctx = document.getElementById("QRBR").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: reasonList,
                  datasets:oppCost
              },
              
              options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    // y: {
                    //     display:false,
                    //     beginAtZero:true,
                    //     stacked:true
                    // },
                    A:{
                      type: 'linear',
                      position: 'right',
                      // beginAtZero: true,
                      suggestedMin: 0,
                      suggestedMax: 100,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Percentage.....
                      ticks: {
                        callback: function(value, index, values) {
                          return value + '%';
                        }
                      },
                    },
                    B:{
                      type: 'linear',
                      position: 'left',
                      beginAtZero: true,
                      display:true,
                      grid:{
                        display:false
                      },
                      // For Rupee Symbol.....
                        ticks: {
                          callback: function(value, index, values) {
                            return '₹' + value;
                          }
                        },
                    },
                    x:{
                        display:true,
                        grid:{
                          display:false
                        },
                        stacked:true,
                        ticks: { 
                          color: '#A6A6A6', 
                          beginAtZero: true 
                        }
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: quality_rejection_reason_cost,
                  }
                },
              },
            });
          },
      error:function(er){
        reject(er);
          // alert("Sorry!Try Agian!!!!");
      }
    });

  });

}
// Quality Rejection by Reason tooltip function
function  quality_rejection_reason_cost(context){
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-rejection_reason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-rejection_reason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
     
        let innerHtml = '<div>';
          // innerHtml += '<div class="grid-container">';
          if (parseInt(percentage)>0) {
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
          }else{
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Rejection Count</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
          }
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}

$(document).on('click','#graph-cont',function(event){
  $("#graph-container-div").css("display","block");
  $("#table-container").css("display","none");
});
$(document).on('click','#table-cont',function(event){
  $("#graph-container-div").css("display","none");
  $("#table-container").css("display","block");
});




 function getfilterdata() {

  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){

  
    $('.filter_part').empty();
    $('.filter_part_copq').empty();
    $('.filter_machine').empty();
    $('.filter_machine_copq').empty();
    $('.filter_reason').empty();
    $('.filter_reason_copq').empty();
    $('.filter_reason_crpr').empty();
    $('.filter_machine_crpr').empty();
    $('.filter_part_crpr').empty();
    $('.filter_reason_copqm').empty();
    $('.filter_machine_copqm').empty();
    $('.filter_part_copqm').empty();
    $('.filter_reason_copqp').empty();
    $('.filter_machine_copqp').empty();
    $('.filter_part_copqp').empty();
    $('.filter_machine_qrmr').empty();
    $('.filter_reason_qrmr').empty();
    $('.filter_part_qrmr').empty();
    $('.filter_reason_qrpr').empty();
    $('.filter_machine_qrpr').empty();
    $('.filter_part_qrpr').empty();


    $('.filter_user').empty();
    // $('.filter_machine_copq').empty();
    // $('.filter_part_copq').empty();

    
    $.ajax({
      url: "<?php echo base_url('Production_Quality/getfilterdata'); ?>",
      type: "POST",
      dataType: "json",
      success:function(res){
        resolve(res);
        // Part Filter
        var elements = $();
        $('.filter_part').append('<div class="inbox inbox_part" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val" name="part_filter_val" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part').append('<div class="inbox inbox_part" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val" name="part_filter_val" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        }); 


        // Part Filter COPQ
        $('.filter_part_copq').append('<div class="inbox inbox_part_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copq" name="part_filter_val_copq" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_copq').append('<div class="inbox inbox_part_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copq" name="part_filter_val_copq" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });     

        // Machine Filter
        var elements1 = $();
        $('.filter_machine').append('<div class="inbox inbox_machine" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val" name="machine_filter_val" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine').append('<div class="inbox inbox_machine" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val" name="machine_filter_val" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        // Machine Filter COPQ
        var elements_copq_machine = $();
        $('.filter_machine_copq').append('<div class="inbox inbox_machine_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copq" name="machine_filter_val_copq" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_copq').append('<div class="inbox inbox_machine_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copq" name="machine_filter_val_copq" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        // Reason Filter
        var elements2 = $();
        $('.filter_reason').append('<div class="inbox inbox_reason" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val" name="reason_filter_val" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason').append('<div class="inbox inbox_reason" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val" name="reason_filter_val" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        // Reason Filter
        var elements_copq = $();
        $('.filter_reason_copq').append('<div class="inbox inbox_reason_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copq" name="reason_filter_val_copq" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_copq').append('<div class="inbox inbox_reason_copq copq_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copq" name="reason_filter_val_copq" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        // CRBR......
        $('.filter_reason_crpr').append('<div class="inbox inbox_reason_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_crpr" name="reason_filter_val_crpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_crpr').append('<div class="inbox inbox_reason_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_crpr" name="reason_filter_val_crpr" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        $('.filter_machine_crpr').append('<div class="inbox inbox_machine_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_crpr" name="machine_filter_val_crpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_crpr').append('<div class="inbox inbox_machine_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_crpr" name="machine_filter_val_crpr" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        $('.filter_part_crpr').append('<div class="inbox inbox_part_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_crpr" name="part_filter_val_crpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_crpr').append('<div class="inbox inbox_part_crpr crpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_crpr" name="part_filter_val_crpr" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        }); 

        // COPQM......
        $('.filter_reason_copqm').append('<div class="inbox inbox_reason_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copqm" name="reason_filter_val_copqm" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_copqm').append('<div class="inbox inbox_reason_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copqm" name="reason_filter_val_copqm" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        $('.filter_machine_copqm').append('<div class="inbox inbox_machine_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copqm" name="machine_filter_val_copqm" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_copqm').append('<div class="inbox inbox_machine_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copqm" name="machine_filter_val_copqm" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        $('.filter_part_copqm').append('<div class="inbox inbox_part_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copqm" name="part_filter_val_copqm" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_copqm').append('<div class="inbox inbox_part_copqm copqm_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copqm" name="part_filter_val_copqm" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        }); 


        // COPQP......
        $('.filter_reason_copqp').append('<div class="inbox inbox_reason_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copqp" name="reason_filter_val_copqp" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_copqp').append('<div class="inbox inbox_reason_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_copqp" name="reason_filter_val_copqp" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        $('.filter_machine_copqp').append('<div class="inbox inbox_machine_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copqp" name="machine_filter_val_copqp" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_copqp').append('<div class="inbox inbox_machine_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_copqp" name="machine_filter_val_copqp" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        $('.filter_part_copqp').append('<div class="inbox inbox_part_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copqp" name="part_filter_val_copqp" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_copqp').append('<div class="inbox inbox_part_copqp cpqp_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_copqp" name="part_filter_val_copqp" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        }); 

        // QRMR......
        $('.filter_reason_qrmr').append('<div class="inbox inbox_reason_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_qrmr" name="reason_filter_val_qrmr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_qrmr').append('<div class="inbox inbox_reason_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_qrmr" name="reason_filter_val_qrmr" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        $('.filter_machine_qrmr').append('<div class="inbox inbox_machine_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_qrmr" name="machine_filter_val_qrmr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_qrmr').append('<div class="inbox inbox_machine_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_qrmr" name="machine_filter_val_qrmr" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        $('.filter_part_qrmr').append('<div class="inbox inbox_part_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_qrmr" name="part_filter_val_qrmr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_qrmr').append('<div class="inbox inbox_part_qrmr qrmr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_qrmr" name="part_filter_val_qrmr" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        }); 


        // QRMR......
        $('.filter_reason_qrpr').append('<div class="inbox inbox_reason_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_qrpr" name="reason_filter_val_qrpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Reason'].forEach(function(item){
          $('.filter_reason_qrpr').append('<div class="inbox inbox_reason_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_reason_val_qrpr" name="reason_filter_val_qrpr" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        $('.filter_machine_qrpr').append('<div class="inbox inbox_machine_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_qrpr" name="machine_filter_val_qrpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Machine'].forEach(function(item){
          $('.filter_machine_qrpr').append('<div class="inbox inbox_machine_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_machine_val_qrpr" name="machine_filter_val_qrpr" value="'+item.machine_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        $('.filter_part_qrpr').append('<div class="inbox inbox_part_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_qrpr" name="part_filter_val_qrpr" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Part'].forEach(function(item){
          $('.filter_part_qrpr').append('<div class="inbox inbox_part_qrpr qrpr_filter" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_part_val_qrpr" name="part_filter_val_qrpr" value="'+item.part_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });


        // User Filter
        var elements3 = $();
        $('.filter_user').append('<div class="inbox inbox_user" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_user_val" name="user_filter_val" value="all" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">All</p>'
                                  +'</div>'
                                +'</div>');
        res['Created_By'].forEach(function(item){
          $('.filter_user').append('<div class="inbox inbox_user" style="display: flex;">'
                                  +'<div style="float: left;width: 20%;" class="center-align">'
                                    +'<input class="checkbox_part filter_user_val" name="user_filter_val" value="'+item.user_id+'" type="checkbox" checked/>'
                                  +'</div>'
                                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                      +'<p class="inbox-span paddingm">'+item.user_id+"-"+item.first_name+'</p>'
                                  +'</div>'
                                +'</div>');
        });

        // myFun();
        // getFilterval();
        // $("#overlay").fadeOut(300);
      },
      error:function(er){
        // alert("Something went wrong!");
        reject(er);
      }
    });

  });
}

function getTableData(part,machine,reason,user){
    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    filter_array =[];
    $.ajax({
      url: "<?php echo base_url('Production_Quality/gettablefilterdata'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        part:part,
        machine:machine,
        reason:reason,
        user:user,
        from:f,
        to:t,
      },
      success:function(res){
        res.forEach(function(value, index) {
          filter_array.push(value);
        });
       
        if(filter_array.length<=0){
          $("#pagination_val").val(1);
          $('#total_pagination').text('1');
          $('.contentQualityFilter').append('<div style="margin-top:1rem;display:flex;flex-direction:row;justify-content:center;align-items:center;height:1.4rem;color:#a6a6a6;font-weight:500;">No Records Found...</div>');
        }else{
          $("#pagination_val").val(1);
          filter_table_data();
        }
        
      },
      error:function(er){
        // alert("Something went wrong!");
      }
    });
  
}

$('#pagination_val').on('change', function(event) {
  filter_table_data();
});

function filter_table_data(){
  $('.contentQualityFilter').empty();
  var pagination_length=50;
  total_pagination = Math.ceil((filter_array.length)/(pagination_length));
  $("#total_pagination").html(total_pagination);
  var x = $("#pagination_val").val();
  filter_array.forEach(function(value, index) {
    if ((index > (x*pagination_length)-(pagination_length+1)) && (index < (x*pagination_length))) {
      var elements = $();

      var notes_msg = "";
      if (value['notes']===undefined) {
        notes_msg = " ";
      }else if(value['notes'] === ""){
        notes_msg = " ";
      }
      else{
        notes_msg = value['notes'];
      }
      elements = elements.add('<div id="settings_div">'
                  +'<div class="row paddingm" style="height:3.8rem;">'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['from_date']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['from_time']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['to_time']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['part_name']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="rejection_font_color">'+value['machine_name']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="rejection_color">'+value['total_reject']+'</p></div>' 
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['reason_name']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['user_name']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['updated_at']+'</p></div>'
                    // +'<div class="col-sm-1 col " style="justify-content:center;"><div class="rejection_font_color"><img src="<?php echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" style="height:1.4rem;width:1.4rem;"></div></div>'
                    +'<div class="col-sm-1 col " style="justify-content:center;"><div class="rejection_font_color notes_check"><img src="<?php echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" style="height:1.4rem;width:1.4rem;" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"></div></div>'
                    +'<div class="notes_display" style="">'
                            +'<p >'+notes_msg+'</p>'
                    +'</div>'
                  +'</div>'
                +'</div>');
      $('.contentQualityFilter').append(elements);
    }
  });
}


// mouse up function dropdown outside click remove function  
$(document).mouseup(function(event){

  // part dropdown outside click
  var part_check = $('.filter_part');
  if (!part_check.is(event.target) && part_check.has(event.target).length==0) {
    part_check.hide();
    
  }

  // part dropdown outside click
  var part_check_copq = $('.filter_part_copq');
  if (!part_check_copq.is(event.target) && part_check_copq.has(event.target).length==0) {
    part_check_copq.hide();
  }

  // machine dropdown outside click
  var machine_check = $('.filter_machine');
  if (!machine_check.is(event.target) && machine_check.has(event.target).length==0) {
    machine_check.hide();
  }
  // machine dropdown outside click
  var machine_check_copq = $('.filter_machine_copq');
  if (!machine_check_copq.is(event.target) && machine_check_copq.has(event.target).length==0) {
    machine_check_copq.hide();
  }

  // reason dropdown outside click
  var reason_check = $('.filter_reason');
  if (!reason_check.is(event.target) && reason_check.has(event.target).length==0) {
    reason_check.hide();
  }

  // reason dropdown outside click
  var reason_check_copq = $('.filter_reason_copq');
  if (!reason_check_copq.is(event.target) && reason_check_copq.has(event.target).length==0) {
    reason_check_copq.hide();
  }
  

  // created by dropdown outside click
  var created_check = $('.filter_user');
  if (!created_check.is(event.target) && created_check.has(event.target).length==0) {
    created_check.hide();
  }



    // part dropdown outside click
  var part_check_crpr = $('.filter_part_crpr');
  if (!part_check_crpr.is(event.target) && part_check_crpr.has(event.target).length==0) {
    part_check_crpr.hide();
  }

  // machine dropdown outside click
  var machine_check_crpr = $('.filter_machine_crpr');
  if (!machine_check_crpr.is(event.target) && machine_check_crpr.has(event.target).length==0) {
    machine_check_crpr.hide();
  }

    // reason dropdown outside click
  var reason_check_crpr = $('.filter_reason_crpr');
  if (!reason_check_crpr.is(event.target) && reason_check_crpr.has(event.target).length==0) {
    reason_check_crpr.hide();
  }


   // part dropdown outside click
  var part_check_copqm = $('.filter_part_copqm');
  if (!part_check_copqm.is(event.target) && part_check_copqm.has(event.target).length==0) {
    part_check_copqm.hide();
  }

  // machine dropdown outside click
  var machine_check_copqm = $('.filter_machine_copqm');
  if (!machine_check_copqm.is(event.target) && machine_check_copqm.has(event.target).length==0) {
    machine_check_copqm.hide();
  }

    // reason dropdown outside click
  var reason_check_copqm = $('.filter_reason_copqm');
  if (!reason_check_copqm.is(event.target) && reason_check_copqm.has(event.target).length==0) {
    reason_check_copqm.hide();
  }



   // part dropdown outside click
  var part_check_copqp = $('.filter_part_copqp');
  if (!part_check_copqp.is(event.target) && part_check_copqp.has(event.target).length==0) {
    part_check_copqp.hide();
  }

  // machine dropdown outside click
  var machine_check_copqp = $('.filter_machine_copqp');
  if (!machine_check_copqp.is(event.target) && machine_check_copqp.has(event.target).length==0) {
    machine_check_copqp.hide();
  }

    // reason dropdown outside click
  var reason_check_copqp = $('.filter_reason_copqp');
  if (!reason_check_copqp.is(event.target) && reason_check_copqp.has(event.target).length==0) {
    reason_check_copqp.hide();
  }

     // part dropdown outside click
  var part_check_qrpr = $('.filter_part_qrpr');
  if (!part_check_qrpr.is(event.target) && part_check_qrpr.has(event.target).length==0) {
    part_check_qrpr.hide();
  }

  // machine dropdown outside click
  var machine_check_qrpr = $('.filter_machine_qrpr');
  if (!machine_check_qrpr.is(event.target) && machine_check_qrpr.has(event.target).length==0) {
    machine_check_qrpr.hide();
  }

    // reason dropdown outside click
  var reason_check_qrpr = $('.filter_reason_qrpr');
  if (!reason_check_qrpr.is(event.target) && reason_check_qrpr.has(event.target).length==0) {
    reason_check_qrpr.hide();
  }


  // part dropdown outside click
  var part_check_qrmr = $('.filter_part_qrmr');
  if (!part_check_qrmr.is(event.target) && part_check_qrmr.has(event.target).length==0) {
    part_check_qrmr.hide();
  }

  // machine dropdown outside click
  var machine_check_qrmr = $('.filter_machine_qrmr');
  if (!machine_check_qrmr.is(event.target) && machine_check_qrmr.has(event.target).length==0) {
    machine_check_qrmr.hide();
  }

    // reason dropdown outside click
  var reason_check_qrmr = $('.filter_reason_qrmr');
  if (!reason_check_qrmr.is(event.target) && reason_check_qrmr.has(event.target).length==0) {
    reason_check_qrmr.hide();
  }

});

// undo button
$(document).on('click','.undo',function(event){
  event.preventDefault();

  reset_part();
  reset_machine();
  reset_reason();
  reset_created();
  getFilterval();

});

// reset part
function reset_part(){
  var machine_arr = $('.filter_part_val');
  jQuery('.filter_part_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#part_text').text('All Parts');
}

// reset machine 
function reset_machine(){
  var machine_arr = $('.filter_machine_val');
  jQuery('.filter_machine_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#filter_machine_val').text('All Machine');
}

// reset reason
function reset_reason(){
  var reason_arr = $('.filter_reason_val');
  jQuery('.filter_reason_val').each(function(index){
    reason_arr[index].checked=true;
  });
  $('#reason_text').text('All Machine');
}

// reset created by
function reset_created(){
  var created_arr = $('.filter_user_val');
  jQuery('.filter_user_val').each(function(index){
    created_arr[index].checked=true;
  });
  $('#user_text').text('All Machine');
}


// Graph Filters......

// Reason Filters......


// notes hover function
function notes_hover(ele){
    var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
    var index_val = els.indexOf(event.currentTarget);
    //   alert(index_val);
    $('.notes_display:eq('+index_val+')').css('display','block');
}



function mouse_out_check(ele1){
  var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
  var index_val1 = els.indexOf(event.currentTarget);
  $('.notes_display:eq('+index_val1+')').css("display","none");
}

</script>

<!-- <script src="<?php echo base_url(); ?>/assets/js/all-fontawesome.js?version=<?php echo rand() ; ?>"></script> -->