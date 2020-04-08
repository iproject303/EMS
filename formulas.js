
function calSalary(){


    $wh=+document.getElementById('work_hours').value;
    $ot=+document.getElementById('o/t_hours').value;
    $rph=+document.getElementById('rph').value;
    $rph_ot=+document.getElementById('rph_o/t').value;


    $total=($wh*$rph)+ ($ot*$rph_ot);
    
    return $total;
   
}

function selectAll() {
    $items = document.getElementsByName('deleteKey[]');
    $selectkey= document.getElementsByName('selectKey[]');
    for (var i = 0; i < $items.length; ++i) {
       
          if($selectkey[0].checked==true){

              $items[i].checked=true;

          }
          else{
            $items[i].checked = false;
          }
          
    }

}
  function checkDate() {
    var startDate = document.getElementById("s_date").value;
    var endDate = document.getElementById("e_date").value;

    if(startDate=="")
    {
      alert("Please select a start date");
      document.getElementById("e_date").value ="";
    }
    if ((Date.parse(endDate) < Date.parse(startDate))) {
      alert("Please select a date not below "+startDate);
      document.getElementById("e_date").value ="";
    }
    
  }

  function loadCombo()
{
  window.location.href = "payments.php";
}



function loadEmp(obj)
{
  
  var empidindex =obj.selectedIndex;
  $empid=obj.options[empidindex].text;  
  window.location.href = "payments.php?empid=" + $empid;
}
