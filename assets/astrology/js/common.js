function showserviceDiv(){document.getElementById("serviceDiv").style.display="block"}function showserviceDiv1(){document.getElementById("serviceDiv1").style.display="block"}function linkselect(e){document.getElementById("mydiv").value=e}function openNav(){document.getElementById("mySidenav").style.width="240px",$("#mySidenav").addClass("active")}function closeNav(){document.getElementById("mySidenav").style.width="0",$("#mySidenav").removeClass("active")}function showDiv100(){document.getElementById("dateDiv").style.display="block"}function showDiv(){document.getElementById("dateDiv").style.display="block"}function showgirlDiv(){document.getElementById("girldateDiv").style.display="block"}function showDiv1(){document.getElementById("monthDiv").style.display="block"}function showgirlDiv1(){document.getElementById("girlmonthDiv").style.display="block"}function showDiv2(){document.getElementById("yearDiv").style.display="block"}function showgirlDiv2(){document.getElementById("girlyearDiv").style.display="block"}function showDiv3(){document.getElementById("hourDiv").style.display="block"}function showgirlDiv3(){document.getElementById("girlhourDiv").style.display="block"}function showDiv4(){document.getElementById("minuteDiv").style.display="block"}function showgirlDiv4(){document.getElementById("girlminuteDiv").style.display="block"}function dateselect(e){document.getElementById("mydiv").value=e,$("#datelabel").addClass("active")}function girldateselect(e){document.getElementById("mydiv5").value=e,$("#girldatelabel").addClass("active")}function monthselect(e){document.getElementById("mydiv1").value=e,$("#monthlabel").addClass("active")}function girlmonthselect(e){document.getElementById("mydiv6").value=e,$("#girlmonthlabel").addClass("active")}function yearselect(e){document.getElementById("mydiv2").value=e,$("#yearlabel").addClass("active")}function girlyearselect(e){document.getElementById("mydiv7").value=e,$("#girlyearlabel").addClass("active")}function hourselect(e){document.getElementById("mydiv3").value=e,$("#hourlabel").addClass("active")}function girlhourselect(e){document.getElementById("mydiv8").value=e,$("#girlhourlabel").addClass("active")}function minuteselect(e){document.getElementById("mydiv4").value=e,$("#minutelabel").addClass("active")}function girlminuteselect(e){document.getElementById("mydiv9").value=e,$("#girlminutelabel").addClass("active")}function addQsn(e){var t=$("#"+e.className).html();$("."+e.className).css("opacity","0.6"),$("."+e.className).css("pointer-events","none"),$(".selected_list").append("<li id=q"+e.className+' class="list-group-item justify-content-between">'+t+'<span class="tag red float-xs-right"><a class="q'+e.className+'" onClick=qsnRemove(this); style="color:#fff">Remove(✖)</a></span></li>');var i=$("ul.selected_list li").length;$("#total").html(i),$(".empty").css("display","none")}function qsnRemove(e){var t=e.className.substring(1,e.className.length);$("#"+e.className).remove(),$("."+t).css("opacity",""),$("."+t).css("pointer-events","");var i=$("ul.selected_list li").length;$("#total").html(i),0==i&&$(".empty").css("display","block")}function addOwn(){var e=$("ul.selected_list li").length+1,t=$("#own").val();t?($(".selected_list").append("<li id=b"+e+' class="list-group-item justify-content-between">Q'+e+".<question>"+t+'</question><span class="tag red float-xs-right"><a class=b'+e+' onClick=removeOwn(this); style="color:#fff">Remove(✖)</a></span></li>'),$("#own").val("")):bootbox.alert("Please enter your quetion."),$("#total").html(e),$(".empty").css("display","none")}function removeOwn(e){$("#"+e.className).remove();var t=$("ul.selected_list li").length;$("#total").html(t),0==t&&$(".empty").css("display","block")}function showDivkundali(){document.getElementById("dateDivkundali").style.display="block"}function dateselectkundali(e){document.getElementById("mydivkundali").value=e,$("#datelabelkundali").addClass("active")}function showDiv1kundali(){document.getElementById("monthDivkundali").style.display="block"}function monthselectkundali(e){document.getElementById("mydiv1kundali").value=e,$("#monthlabelkundali").addClass("active")}function showDiv2kundali(){document.getElementById("yearDivkundali").style.display="block"}function yearselectkundali(e){document.getElementById("mydiv2kundali").value=e,$("#yearlabelkundali").addClass("active")}function showDiv3kundali(){document.getElementById("hourDivkundali").style.display="block"}function hourselectkundali(e){document.getElementById("mydiv3kundali").value=e,$("#hourlabelkundali").addClass("active")}function showDiv4kundali(){document.getElementById("minuteDivkundali").style.display="block"}function minuteselectkundali(e){document.getElementById("mydiv4kundali").value=e,$("#minutelabelkundali").addClass("active")}function isValidEmailAddress(e){return/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(e)}$("#prompt").click(function(e){$("#bottom").css("display","none")}),$(document).click(function(e){"mydiv"!=e.target.id&&$("#serviceDiv").hide()}),$(document).click(function(e){"mydiv"!=e.target.id&&$("#serviceDiv1").hide()}),$("#full_consult").on("click",function(){$("#step1").removeClass("active"),$("#step3").removeClass("active"),$("#step4").removeClass("active"),$("#pane21").removeClass("active in"),$("#pane23").removeClass("active in"),$("#pane24").removeClass("active in"),$("#step2").addClass("active"),$("#pane22").addClass("active in"),$("#stepper2").removeClass("active"),$("#stepper2").addClass("completed"),$("#stepper3").removeClass("completed"),$("#stepper3").addClass("active"),$("#stepper4").removeClass("completed"),$("#stepper4").addClass("active")}),$("#next1").on("click",function(){""==$(".selected_list").html()?bootbox.alert("Please select questions.").find(".modal-content").css({"margin-top":function(){return($(window).height()-$(".modal-dialog").height())/2+"px"}}):(window.scrollTo(0,0),$("#step1").removeClass("active"),$("#pane21").removeClass("active in"),$("#step2").addClass("active"),$("#pane22").addClass("active in"),$("#stepper2").removeClass("active"),$("#stepper2").addClass("completed"),$("#questions").val($(".selected_list").html()))}),$("#next2").on("click",function(){""==$("#name").val()?bootbox.alert("Please enter your name.").find(".modal-content").css({"margin-top":function(){return($(window).height()-$(".modal-dialog").height())/2+"px"}}):""!=$("#email").val()&&" "!=$("#email").val()&&isValidEmailAddress($("#email").val())?""==$("#form2").val()?bootbox.alert("Please enter your phone number.").find(".modal-content").css({"margin-top":function(){return($(window).height()-$(".modal-dialog").height())/2+"px"}}):(window.scrollTo(0,0),$("#pane23").addClass("active in"),$("#pane22").removeClass("active in"),$("#step2").removeClass("active"),$("#step3").addClass("active"),$("#stepper3").removeClass("active"),$("#stepper3").addClass("completed")):bootbox.alert("Please enter your email.").find(".modal-content").css({"margin-top":function(){return($(window).height()-$(".modal-dialog").height())/2+"px"}})}),$("#prev1").on("click",function(){window.scrollTo(0,0),$("#pane21").addClass("active in"),$("#pane22").removeClass("active in"),$("#stepper2").removeClass("completed"),$("#stepper2").addClass("active")}),$("#next3").on("click",function(){}),$("#prev2").on("click",function(){window.scrollTo(0,0),$("#pane22").addClass("active in"),$("#pane23").removeClass("active in"),$("#stepper3").removeClass("completed"),$("#stepper3").addClass("active")}),$("#next4").on("click",function(){window.scrollTo(0,0),$("#pane25").addClass("active in"),$("#pane24").removeClass("active in"),$("#step4").removeClass("active"),$("#step5").addClass("active")}),$("#prev3").on("click",function(){window.scrollTo(0,0),$("#pane23").addClass("active in"),$("#pane24").removeClass("active in"),$("#stepper4").removeClass("completed"),$("#stepper4").addClass("active")}),$("#next5").on("click",function(){window.scrollTo(0,0),$("#pane26").addClass("active in"),$("#pane25").removeClass("active in"),$("#step5").removeClass("active"),$("#step6").addClass("active")}),$("#prev4").on("click",function(){window.scrollTo(0,0),$("#pane25").addClass("active in"),$("#pane26").removeClass("active in")}),$("body").click(function(e){"fa fa-bars"==e.target.className&&openNav()}),$("body").click(function(e){e.offsetX>240&&closeNav()}),$(document).click(function(e){"mydiv"!=e.target.id&&$("#dateDiv").hide()}),$(document).click(function(e){"mydiv5"!=e.target.id&&$("#girldateDiv").hide()}),$(document).click(function(e){"mydiv1"!=e.target.id&&$("#monthDiv").hide()}),$(document).click(function(e){"mydiv6"!=e.target.id&&$("#girlmonthDiv").hide()}),$(document).click(function(e){"mydiv2"!=e.target.id&&$("#yearDiv").hide()}),$(document).click(function(e){"mydiv7"!=e.target.id&&$("#girlyearDiv").hide()}),$(document).click(function(e){"mydiv3"!=e.target.id&&$("#hourDiv").hide()}),$(document).click(function(e){"mydiv8"!=e.target.id&&$("#girlhourDiv").hide()}),$(document).click(function(e){"mydiv4"!=e.target.id&&$("#minuteDiv").hide()}),$(document).click(function(e){"mydiv9"!=e.target.id&&$("#girlminuteDiv").hide()}),$(function(){$("a.read_more").click(function(e){e.preventDefault(),$(this).parents(".q1").find(".more_text").show(),$(this).parents(".q1").find(".read_more").hide()}),$("a.read_less").click(function(e){e.preventDefault(),$(this).parents(".q1").find(".more_text").hide(),$(this).parents(".q1").find(".read_more").show()})}),$(function(){$("a.read_more1").click(function(e){e.preventDefault(),$(this).parents(".q2").find(".more_text1").show(),$(this).parents(".q2").find(".read_more1").hide()}),$("a.read_less1").click(function(e){e.preventDefault(),$(this).parents(".q2").find(".more_text1").hide(),$(this).parents(".q2").find(".read_more1").show()})}),$(function(){$("a.read_more2").click(function(e){e.preventDefault(),$(this).parents(".q3").find(".more_text2").show(),$(this).parents(".q3").find(".read_more2").hide()}),$("a.read_less2").click(function(e){e.preventDefault(),$(this).parents(".q3").find(".more_text2").hide(),$(this).parents(".q3").find(".read_more2").show()})}),$(function(){$("a.read_more3").click(function(e){e.preventDefault(),$(this).parents(".q4").find(".more_text3").show(),$(this).parents(".q4").find(".read_more3").hide()}),$("a.read_less3").click(function(e){e.preventDefault(),$(this).parents(".q4").find(".more_text3").hide(),$(this).parents(".q4").find(".read_more3").show()})}),$(function(){$("a.read_more4").click(function(e){e.preventDefault(),$(this).parents(".q5").find(".more_text4").show(),$(this).parents(".q5").find(".read_more4").hide()}),$("a.read_less4").click(function(e){e.preventDefault(),$(this).parents(".q5").find(".more_text4").hide(),$(this).parents(".q5").find(".read_more4").show()})}),$(function(){$("a.read_more5").click(function(e){e.preventDefault(),$(this).parents(".q6").find(".more_text5").show(),$(this).parents(".q6").find(".read_more5").hide()}),$("a.read_less5").click(function(e){e.preventDefault(),$(this).parents(".q6").find(".more_text5").hide(),$(this).parents(".q6").find(".read_more5").show()})}),$(function(){$("a.read_more6").click(function(e){e.preventDefault(),$(this).parents(".q7").find(".more_text6").show(),$(this).parents(".q7").find(".read_more6").hide()}),$("a.read_less6").click(function(e){e.preventDefault(),$(this).parents(".q7").find(".more_text6").hide(),$(this).parents(".q7").find(".read_more6").show()})}),$(function(){$("a.read_more7").click(function(e){e.preventDefault(),$(this).parents(".q8").find(".more_text7").show(),$(this).parents(".q8").find(".read_more7").hide()}),$("a.read_less7").click(function(e){e.preventDefault(),$(this).parents(".q8").find(".more_text7").hide(),$(this).parents(".q8").find(".read_more7").show()})}),$(function(){$("a.read_more8").click(function(e){e.preventDefault(),$(this).parents(".q9").find(".more_text8").show(),$(this).parents(".q9").find(".read_more8").hide()}),$("a.read_less8").click(function(e){e.preventDefault(),$(this).parents(".q9").find(".more_text8").hide(),$(this).parents(".q9").find(".read_more8").show()})}),$(function(){$("a.read_more9").click(function(e){e.preventDefault(),$(this).parents(".q10").find(".more_text9").show(),$(this).parents(".q10").find(".read_more9").hide()}),$("a.read_less9").click(function(e){e.preventDefault(),$(this).parents(".q10").find(".more_text9").hide(),$(this).parents(".q10").find(".read_more9").show()})}),$("#pane131").click(function(){$("#earlytab").addClass("active"),$("#latetab").removeClass("active"),$("#denialtab").removeClass("active")}),$("#pane132").click(function(){$("#earlytab").removeClass("active"),$("#latetab").addClass("active"),$("#denialtab").removeClass("active")}),$("#pane133").click(function(){$("#earlytab").removeClass("active"),$("#latetab").removeClass("active"),$("#denialtab").addClass("active")}),$(".closeresult").click(function(){$("#collapseResult").removeClass("collapse in"),$("#collapseResult").addClass("collapse")}),$(document).click(function(e){"mydivkundali"!=e.target.id&&$("#dateDivkundali").hide()}),$(document).click(function(e){"mydiv1kundali"!=e.target.id&&$("#monthDivkundali").hide()}),$(document).click(function(e){"mydiv2kundali"!=e.target.id&&$("#yearDivkundali").hide()}),$(document).click(function(e){"mydiv3kundali"!=e.target.id&&$("#hourDivkundali").hide()}),$(document).click(function(e){"mydiv4kundali"!=e.target.id&&$("#minuteDivkundali").hide()});