<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <div class="modal-header">
        <p class="payment_head">Payment Summary</p>
        <?php if($button): ?>
        <a href="<?=base_url('/thankyou');?>" type="button" class="btn btn-primary float-xs-right">Done</a>
        <?php else: ?>
                 <?php if(strtoupper($cccode) == 'US'){ ?>
 <a target="_parent" href="<?=base_url('/service/pay_now/'.$optionsdata['booking_id']);?>" type="button" class="btn btn-primary paynowpaypalbutton waves-effect waves-light float-xs-right" >Pay Now</a>

     <?php }else{ ?>
 <a href="javascript:void();" type="button" class="btn btn-primary paynowbutton waves-effect waves-light float-xs-right" id="paynowbutton">Pay Now</a>


     <?php } ?>
        <?php  endif; ?>        
            </div>
        <hr>
        <div class="row">
          <div class="col-xs-6">
            <address>
              Name - <?php echo $data['first_name'];?><br>
              E-Mail - <?php echo $data['email'];?><br>
              Contact no. - (+91)<?php echo $data['phone'];?><br>
            </address>
          </div>
           <div class="col-xs-6">
            <address class="float-xs-right">
              <p class="price_text">Total - <?=get_currency();?><?php echo $totalprice; ?>/-</p>
              <?php if($free_question):?>
               <div>(One question is free.)</div>
              <?php endif; ?> 
            </address>
          </div>
        </div>
     
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Your Questions</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                                <tr>
                                  <td><strong>Question Asked</strong></td>
                                   <td></td>
                                  <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                </thead>
                <tbody>
                  
             <?php foreach ($questions as $key => $question):?>                                     
                  <tr>
                    <td>
                      <b><?php echo $question['question'] ?></b>                      
                    </td>
                     <td></td>
                    <td class="text-right"><?php if(!$special): ?> <?=get_currency();?><?php echo number_format($question['price'], 2); ?>                                
                    <?php else: if($key == 0){ echo get_currency().number_format($question['price'], 2);} endif;?></td>
                  </tr>
              <?php endforeach; ?>               
                  <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                    <td class="thick-line text-right"><?=get_currency();?><?php echo $subprice; ?></td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right"><?=get_currency();?><?=$totalprice; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
          <div class="modal-footer">
      <!--<button id="prev3" type="button" class="btn prv">Prev</button>-->
       <?php if(strtoupper($cccode) == 'IN'){ ?>
 <a href="javascript:void();" type="button" class="btn btn-primary paynowbutton waves-effect waves-light" id="paynowbutton">Pay Now</a>

     <?php }else{ ?>

 <a target="_parent" href="<?=base_url('/service/pay_now/'.$optionsdata['booking_id']);?>" type="button" class="btn btn-primary paynowpaypalbutton waves-effect waves-light" >Pay Now</a>

     <?php } ?>
     
      </div>
         </div>
        </div>
      </div>
    </div>
</div>
 <?php if($button): ?>
<script type="text/javascript"> 
 
 $( document ).ready(function() {
   $('#paynowbutton').text('Done');
   $('#paynowbutton').attr('href', '<?=base_url('/thankyou');?>');
     
   });
 </script>
<?php else: ?>
<script type="text/javascript">
$('.paynowbutton').click(function(){
parent.$('<form method="post" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"><input type="hidden" name=encRequest value="<?php echo html_entity_decode($encrypted_data, ENT_QUOTES, "utf-8");?>"><input type="hidden" name="access_code" value="<?php echo $access_code; ?>"></form>').appendTo('body').submit();
//$('#paynow').submit();
});
</script>
 <?php  endif; ?>  
</div>