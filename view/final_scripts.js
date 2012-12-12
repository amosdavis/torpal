<script type="text/javascript">/*jquery-1.4.2.js is included in the header*/
getTechList();
getMessages();

$("#chat_submit_button").click(function(){
// if ($("[name=touser]").val() != 0){
//     $("#message_area").load( "post_messages.php", {"fromuser":$("[name=fromuser]").val(), "touser":$("[name=touser]").val(),"message":$("[name=message]").val()}, function() {
//       alert('Message Sent');
//       });
 if ($("[name=touser]").val() != 0){
$.ajax({
            type: "POST",
            url: "post_messages.php",
	    data: {"fromuser":$("[name=fromuser]").val(), "touser":$("[name=touser]").val(),"message":$("[name=message]").val()},
            async: true, /* This is not an AJAX request if it is set to false*/
            cache: false,
            timeout:10000, /* Timeout after 30 seconds*/

            success: function(data){ 
// 		$('#message_area').append(data); 
//                 getMessages();	
            }
        });
$("[name=message]").val("");

}
else {alert("Please select a person to chat with.");}
});

// the jquery function .live('Event',function(){... is used to access dynamically generated events

function getTechList(){

      $.get('tech_list.php', function(data) {
	$('.available').html(data);
      //   alert('Tech list retrieved');
      });
}

// setInterval ( "getMessages()", 5000 );

function getMessages(){

$.ajax({
            type: "POST",
            url: "get_messages.php",
	    data: {"tech":"5275"},
            async: true, /* This is not an AJAX request if it is set to false*/
            cache: false,
            timeout:30000, /* Timeout after 30 seconds*/

            success: function(data){ 
		$('#message_area').append(data); 
                getMessages();
		
            }
        });






/*
      $.post('get_messages.php',{"tech":"5275"}, function(data) {

        $('#message_area').append(data);
      //       alert("Data Loaded: " + data);
      });*/

}


  //This function creates an ajax call to the server when a tech's name is clicked and creates the chat window 
  $('span #tech_name').live('click',function() {
  $('#message_submission_form input[name=touser]').val($(this).attr('title'));
  $('#message_area').append("<span style='color:gray; font-size:small;'>" + "Chatting with -- " + $(this).attr('title') + "</span></br>");
  // alert("hello");

  });



//BEGIN COPIED JAVASCRIPT FOR DROP DOWN MENUS
var timeout    = 500;
var closetimer = 0;
var ddmenuitem = 0;

function ddmenus_open()
{  ddmenus_canceltimer();
   ddmenus_close();
   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

function ddmenus_close()
{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function ddmenus_timer()
{  closetimer = window.setTimeout(ddmenus_close, timeout);}

function ddmenus_canceltimer()
{  if(closetimer)
   {  window.clearTimeout(closetimer);
      closetimer = null;}}

$(document).ready(function()
{  $('#ddmenus > li').bind('mouseover', ddmenus_open)
   $('#ddmenus > li').bind('mouseout',  ddmenus_timer)});

document.onclick = ddmenus_close;

//END COPIED JAVASCRIPT

</script>

