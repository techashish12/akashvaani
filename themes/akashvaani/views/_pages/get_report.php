<!--Report-->
  <link href="<?php echo base_url('/assets/reports/'); ?>/css/report.css" rel="stylesheet">
<style type="text/css">
.selectpicker{margin-top: 10px; padding: 0;font-size: 14px;}
</style>

<div class="col-md-12">
             <div class=" reportcontent">
        <h2 class="h2-responsive firsthead">The Story of my Life</h2>
                    
<div class="row">
  <div class="col-md-4 col-xs-12">
    
<!--Carousel Wrapper-->
<div id="carousel-example-3" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
    <!--Slides-->
    <div class="carousel-inner" role="listbox" style="height:350px;">
        <div class="carousel-item active">
    <p style="text-align:center;">Cover page</p>
            <div class="view hm-black-light">
                <img src="<?php echo base_url('/assets/astrology/img/cover-page.png'); ?>" alt="First slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
    <p style="text-align:center;">What's Inside</p>
            <div class="view hm-black-strong">
                <img src="<?php echo base_url('/assets/astrology/img/2nd-page.png'); ?>" alt="Second slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
    <p style="text-align:center;">Planetary Positions</p>
            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/planetary-postions.png'); ?>" alt="Third slide">
            </div>
        </div>
         <div class="carousel-item">
            <!--Mask color-->
    <p style="text-align:center;">Numerology Analysis</p>
            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/numerology.png'); ?>" alt="Third slide">
            </div>
        </div>
        
         <div class="carousel-item">
            <!--Mask color-->
    <p style="text-align:center;">Gemstone Suggestions</p>
            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/gemstones.png'); ?>" alt="Third slide">
            </div>
        </div>
        
         <div class="carousel-item">
            <!--Mask color-->
    <p style="text-align:center;">Manglik Analysis & More</p>
            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/manglik-dosha.png'); ?>" alt="Third slide">
            </div>
        </div>
    </div>


    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
       <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>

<!-- Modal -->
<div id="sample" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sample Report</h4>
      </div>
      <div class="modal-body">
        <p><img src="<?php echo base_url('/assets/astrology/img/2nd page 595px840px.jpg'); ?>" alt="Sample Report"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="sample2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sample Report</h4>
      </div>
      <div class="modal-body">
        <p><img src="<?php echo base_url('/assets/astrology/img/report-cover-2nd-page.png'); ?>" alt="Sample Report"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--/.Carousel Wrapper-->
  </div>
  <div class="col-md-1 col-xs-12"></div>
  <div class="col-md-7 col-xs-12" style="padding-top: 10px;">
                    <!--Excerpt-->
                    <h2 class="h2-responsive center-on-small-only product-name" style="padding: 0 0 10px;"><strong>Your lifetime guide (25 pages)</strong></h2>
                    
                    <p>Your horoscope or Kundali gives you an insight into your Personality & life path. The method of Kundali is developed by ancient sages, which has been an important tool since ages and still  very relevant in today's times for making human life better.</p>
                    
                    <p>This birth Report is specially designed to give you analysis based on your Charts.This is a beautiful piece of booklet about you. You can keep as lifetime guide.</p>
                                        
                    
                    <div class="col-md-12" style="padding: 0">
                    <span>Introductory Price</span>  
                    <span class="cancel-price"><strike> Rs.500/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.299/-</span> 
                    <span class="pdf">(PDF)  <a class="waves-effect waves-light" data-toggle="modal" data-target="#sample" style="text-decoration:underline;">Quick Detail</a></span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0;  text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/report');?>"  class="btn waves-effect waves-light buy_now_basic">Buy Now</a></div>          
                   <div class="col-md-4 col-xs-6"><a id="button2" href="<?=base_url('/full-reports');?>" class="btn waves-effect waves-light">See Details</a></div>
                   
                   <div class="col-md-4 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select')); ?></div>
		</div>
                    <div style="display:none;   ">    
                    <div class="col-md-12">
                    <h4 style="color:#ff3366;">Special Commentary</h4> 
                    <p>The story of my Life report & Commentary on your <?=$page_name;?>  (2 years Next) + Special <?=$page_name;?> issue you want to ask. by Expert Astrologer.</p>
                    </div>
                    <div class="col-md-12" style="padding: 0">
                    <span>Special Price</span>  
                    <span class="cancel-price">299 + 399 =<strike> Rs. 698/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.599/-</span> 
                    <span class="pdf"> (PDF) <a class="waves-effect waves-light" data-toggle="modal" data-target="#sample2" style="text-decoration:underline;">Quick Detail</a></span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions?report=1&ctype='.$ctype);?>"  class="btn waves-effect waves-light">Buy Now</a></div>          
                   <div class="col-md-4 col-xs-6"><a id="button2" href="<?=base_url('/full-extended-reports');?>" class="btn waves-effect waves-light">See Details</a></div>
                   <div class="col-md-4 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select_ext')); ?></div>
		  </div>         
                        </div>
                    
                    <div style="clear: both;"></div>
<div>
  <hr />
                    <!--Excerpt-->
                    <h2 class="h2-responsive center-on-small-only product-name" style="padding: 0 0 10px;"><strong>The story of your life (Extended)-70 pages</strong></h2>
                    <p><strong>Your life answers and Guide- Planets and effects on your life</strong></p>
                    <p>In addition to the above report. It is a detailed report about your personality, covers answers regarding various aspects of your life like Your Intelligence, education, Mind, Will power & emotions, Wealth, Knowledge, marriage, comfort.</p>
                    
                    <p>Your life answers and Guide- Planets and effects on your life.</p>
                    <p style="color:#00CC99; font-weight: bold;">Beautiful & Consolidated Life Report.</p>                    
                    
                    <div class="col-md-12" style="padding: 0">
                    <span>Introductory Price</span>  
                    <span class="cancel-price"><strike> Rs.1299/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.599/-</span> 
                    <span class="pdf"> (PDF) <a class="waves-effect waves-light" data-toggle="modal" data-target="#sample2" style="text-decoration:underline;">Quick Detail</a></span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/report');?>"  class="btn waves-effect waves-light buy_now_extended">Buy Now</a></div>          
                   <div class="col-md-5 col-xs-6"><a id="button2" href="<?=base_url('/full-extended-reports');?>" class="btn waves-effect waves-light">See Details</a></div>
                   <div class="col-md-3 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select_ext')); ?></div>
		  </div>
                    <div style="clear: both;"></div>
                    <div class="col-md-12">
                    <h4 style="color:#ff3366;">Special Commentary</h4> 
                    <p style="font-weight:bold;color:#be7426;">The story of my Life report & Commentary on your <?=$page_name;?> (2 years Next) + Special <?=$page_name;?>  issue you want to ask. by Expert Astrologer.</p>
                    </div>
                    <div class="col-md-12" style="padding: 0">
                    <span>Special Price</span>  
                    <span class="cancel-price">599 + 599 =<strike> Rs. 1198/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.799/-</span> 
                    <span class="pdf"> (PDF) <a class="waves-effect waves-light" data-toggle="modal" data-target="#sample2" style="text-decoration:underline;">Quick Detail</a></span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;" >  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions?report=1&ctype='.$ctype);?>"  class="btn waves-effect waves-light">Buy Now</a></div>          
                   <div class="col-md-5 col-xs-6"><a id="button2" href="<?=base_url('/full-extended-reports');?>" class="btn waves-effect waves-light">See Details</a></div>
                   <div class="col-md-3 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select_ext')); ?></div>
		  </div>  	    
                </div>
    </div>
</div>
</div>
	
<script type="text/javascript">
$('.buy_now_basic').click(function(e){
window.location.href = '<?php echo base_url('/report?lg=');?>' + $('#langauge_select :selected').val()+ '&type=story_of_life_basic_report';
 e.preventDefault();
});
$('.buy_now_extended').click(function(e){
window.location.href = '<?php echo base_url('/report?lg=');?>' + $('#langauge_select_ext :selected').val()+ '&type=story_of_life_extended_report';
 e.preventDefault();
});
</script>
	</div>
            
            
           

<!--Report-->

             <div class="container reportcontent">
            <hr />
        <h2 class="h2-responsive firsthead">Ask Any Question about your <?=ucfirst($page_name);?>.</h2>
                    
<div class="row">
  <div class="col-md-4 col-xs-12">
 <img src="<?php echo base_url('/assets/img/free-question.png'); ?>" alt="One question related marriage kundali milan" class="img-fluid">
  </div>
  <div class="col-md-1"> </div>
  <div class="col-md-7 col-xs-12" style="padding-top: 30px;">
  
                      <h2 class="h2-responsive center-on-small-only product-name"><strong><?=ucfirst($page_name);?> Issues</strong></h2>
	                <!--Excerpt-->
                        <p>You can ask any question regarding your <?=$page_name;?>. Questions like <span style="color:#be7426;"><?=implode(', ', $like_questions); ?></span>
            </p>
            <p>Expert Astrologers will answer your Questions. You will receive answers in form of voice recording.</p>
    		<h4 style="color:#00CC99;"><strong>100% Privacy. Incredibly Simple. Satisfaction Guaranteed.</strong></h4>	 
            <br />               
                    <div class="col-md-12" style="padding: 0">
                    <span>Introductory Price</span>  
                    <span class="cancel-price"><strike> Rs.399/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.299/-</span> 
                    <span class="pdf">(Rs.100 Off)</span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions');?>"  class="btn waves-effect waves-light buy_now">Ask Now</a></div>    
                   
                    <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button2" href="<?=base_url('/consult-online');?>"  class="btn waves-effect waves-light buy_now">See Details</a></div>          
                    <div style="clear:both;"></div>
		</div>

            <div class="col-md-12" style="padding: 0"><h4 style="color:#ff3366;"><strong>Special offer</strong></h4>
                <br>   </div>
            <div class="col-md-12" style="padding: 0">
                <span><b>Set of three Questions</b></span>  
                <span class="currnt-price" style="color:#0000FF;">Rs.499/-</span> 
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions?type=3');?>"  class="btn waves-effect waves-light buy_now">Ask Now</a></div>    
                   
                    <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button2" href="<?=base_url('/consult-online');?>"  class="btn waves-effect waves-light buy_now ">See Details</a></div>          
           
		</div>
           <div style="clear: both;">&nbsp;</div>
                  <div class="col-md-12" style="padding: 0">
                    
                      <span><b>Set of five Questions</b></span>  
                    <span class="currnt-price" style="color:#0000FF;">Rs.799/-</span> 
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions?type=5');?>"  class="btn waves-effect waves-light buy_now">Ask Now</a></div>    
                   
                    <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button2" href="<?=base_url('/consult-online');?>"  class="btn waves-effect waves-light buy_now">See Details</a></div>          
           
		</div>
            
                </div>

			</div>
		</div>


<?php if(!$hide_kundali_section): ?>

  <div class="container reportcontent">
            <hr />
        <h2 class="h2-responsive firsthead">Kundali Matching</h2>
                    
<div class="row">
  <div class="col-md-4 col-xs-12">
    <!--Carousel Wrapper-->
<div id="carousel-example-4" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
 <!--Slides-->
    <div class="carousel-inner" role="listbox" style="height:350px;">
        <div class="carousel-item active">
            <div class="view hm-black-light">
                <img src="<?php echo base_url('/assets/img/kundali/kundali-matching-Front Cover.png'); ?>" alt="First slide">
            </div>
        </div>
        <div class="carousel-item">
            <div class="view hm-black-light">
                <img src="<?php echo base_url('/assets/astrology/img/slider-1.png'); ?>" alt="First slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->

            <div class="view hm-black-strong">
                <img src="<?php echo base_url('/assets/astrology/img/slider-2.png'); ?>" alt="Second slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->

            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/slider-3.png'); ?>" alt="Third slide">
            </div>
        </div>
         <div class="carousel-item">
            <!--Mask color-->

            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/slider-4.png'); ?>" alt="Third slide">
            </div>
        </div>
        
         <div class="carousel-item">

            <div class="view hm-black-slight">
                <img src="<?php echo base_url('/assets/astrology/img/slider-5.png'); ?>" alt="Third slide">
            </div>
        </div>
        
         
    </div>

</div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-4" role="button" data-slide="prev">
       <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-4" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <div class="col-md-1"> </div>
  <div class="col-md-7 col-xs-12" style="padding-top: 30px;">
  
                      <h2 class="h2-responsive center-on-small-only product-name"><strong>Kundali Matching</strong></h2>
                      <p>The kundali making for matching is a method which can give info about your 
Mental and Physical compatibility, Longevity of the marriage , Nature, Health according to Astrology, Childbirth, Separative tendencies and financial standings.
</p>
                  <!--Excerpt-->
                        <p>You are going to receive a detail report about you and the person you intend to take the relationship ahead. The report will cover important <span style="color:#be7426;">Horoscope charts, Manglik status, Ashtakoot Guna milan, Relationship parameters match analysis and personality Analysis.</span>
            </p>

        <h4 style="color:#00CC99;"><strong>100% Privacy. Incredibly Simple. Satisfaction Guaranteed.</strong></h4>   
            <br />               
                    <div class="col-md-12" style="padding: 0">
                    <span>Introductory Price</span>  
                    <span class="cancel-price"><strike> Rs.699/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.399/-</span> 
                    <span class="pdf">(Rs.300 Off)</span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1"  href="<?=base_url('/questions');?>"  class="btn waves-effect waves-light match_mnaking_report">Buy Now</a></div>    
                   
                    <div class="col-md-5 col-xs-6" style="padding:0px;"><a id="button2" href="<?=base_url('/match-making-report');?>"  class="btn waves-effect waves-light buy_now">See Details</a></div>          
                   <div class="col-md-3 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select_match')); ?></div>

                    <div style="text-align: left;">

                     <div class="col-md-12">
                            <br>
                      <br>
                    <h4 style="color:#ff3366;">Special Commentary</h4> 
                    <p style="font-weight:bold;color:#be7426;">There will be commentary  by esteemed astrologer after analysing the chart in detail of each individual and will give commentary, if two people should go for marriage and will suggest remedy if there are issues in the kundali.</p>
                    </div>
                    <div class="col-md-12" style="padding: 0">
                    <span>Special Price</span>  
                    <span class="cancel-price">399 + 399 =<strike> Rs. 798/-</strike></span> 
                    <span class="currnt-price" style="color:#0000FF;">Rs.699/-</span> 
                    <span class="pdf"> (PDF) <a class="waves-effect waves-light" data-toggle="modal" data-target="#sample2" style="text-decoration:underline;">Quick Detail</a></span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;" >  
                   <div class="col-md-4 col-xs-6" style="padding:0px;"><a id="button1" href="<?=base_url('/questions?report=3&ctype='.$ctype);?>"  class="btn waves-effect waves-light">Buy Now</a></div>          
                   <div class="col-md-5 col-xs-6"><a id="button2" href="<?=base_url('/match-making-report');?>" class="btn waves-effect waves-light">See Details</a></div>
                   <div class="col-md-3 col-xs-12"><?php echo form_dropdown('select_langiage', unserialize(LANGUAGES) ,'', array('class' => 'form-control  selectpicker', 'id' => 'langauge_select_ext')); ?></div>
                 </div>
  </div>         
  </div>  
  </div>    
 <div style="clear:both;"></div>
    </div>
      </div>



<script type="text/javascript">
$('.match_mnaking_report').click(function(e){
window.location.href = '<?php echo base_url('/report?lg=');?>' + $('#langauge_select_match :selected').val()+ '&type=matchmaking_report';
 e.preventDefault();
});

</script>


<?php endif; ?>





<!--full consultations-->



             <div class="container reportcontent" style="display:none;">
             <hr class="firstheadhr">
        <h2 class="h2-responsive firsthead">Get Full Consultation. Talk to Astrologer.</h2>
                    
<div class="row">
  <div class="col-md-4 col-xs-12">
 <img src="<?php echo base_url('/assets/astrology/img/full-consultation-400px-300px.png'); ?>" alt="free-question" class="free  question related marriage kundali milan">

  </div>
  <div class="col-md-1"> </div>
  <div class="col-md-7 col-xs-12" style="padding-top: 30px;">
  
                      <h2 class="h2-responsive center-on-small-only product-name"><strong>Discuss your life issues in <?=$page_name;?> in Detail.</strong></h2>
	                <!--Excerpt-->
<p>Astrology is an important tool whenever you need a guidance for your future. You always want to find someone have deep knowledge of the subject, who can understand your problem and have a genuine intention to help you for your future. We just want to tell you that you are at the right place.
</p>
<p style="color:#333333;"><strong>Highly Qualified, Experienced & Empathetic Professionals. Discuss as many Life issues as you want. No Time Limit. Tried & Tested Remedies.</strong></p>
<h4 style="color:#00CC99;"><strong>100% Privacy. Simple & Safe Payment. Satisfaction Guaranteed.</strong></h4>	 
<p>Conversation via phone. Your preferred time. </p>
         <br />               
                    <div class="col-md-12" style="padding: 0">
                    <span>Introductory Price</span>  
                    <span class="cancel-price"><strike> Rs.1499/-</strike></span> 
                    <span class="currnt-price">Rs.1100/-</span> 
                    <span class="pdf">(Rs.399 Off)</span>  
                    </div>
                  <div class="col-md-12" style="padding:10px 0; text-align: center;">  
                   <div class="col-md-4 col-xs-12" style="padding:0px;"><a id="button1" href="<?=base_url('/full-consultation');?>"  class="btn waves-effect waves-light buy_now pull-left">Book Now</a></div>          
           
				   </div>
                </div>

			</div>
		</div>
</div>
</div>
<div style="clear:both;"></div>