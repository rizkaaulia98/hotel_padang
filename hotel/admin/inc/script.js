function add(){
  $('#l_form').append('<input type="text" class="form-control" name="fasilitas[]" value="" style="margin-bottom:3px;" required>');
}
function addroom(){
  $('#l_form').append('<tr class="xx"><td ><input type="text" class="form-control" name="name[]" value="" style="margin-bottom:3px;" required></td><td ><select type="text" class="form-control" name="id_type[]" value="" style="margin-bottom:3px;" required></td><td><input type="text" class="form-control" name="price[]" value="" style="margin-bottom:3px;" required></td><td ><input type="number" class="form-control" name="available[]" value="" style="margin-bottom:3px;" required></td></tr>');
}
function adds(){
  $('#l_form').append('<tr class="xx"><td ><input type="text" class="form-control" name="roomtype[]" value="" style="margin-bottom:3px;" required></td></tr>');
}
// ini masih belum fixed
function rem(){
  var x = document.getElementById("l_form");
  var y = x.getElementsByClassName("xx");
  var last_y = y[y.length - 1];
  if (y.length>1){
    last_y.remove();
  }
}
