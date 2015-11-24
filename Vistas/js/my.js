function fetch_select(val) {
   $.ajax({
     type: 'POST',
     url: '../Vistas/fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response;
     }
   });

}


function upperCase(t){
  var eleVal = document.getElementById(t.id);
  eleVal.value= eleVal.value.toUpperCase().replace(/ /g,'');
}
