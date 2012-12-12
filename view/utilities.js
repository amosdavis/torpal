$("ul .form_name_list").bind("click",(function(){//populates containerDiv with the html for the requested form when the form name is clicked

$.ajax({
  type: 'POST',
  url: "form_getter.php",
  async: false,
  data: "form_name="+$(this).html(),
  dataType: "html",
  contentType: "application/x-www-form-urlencoded",
  
  success: function(data){$("#page_content_holder").html(data);
  }});


}));

