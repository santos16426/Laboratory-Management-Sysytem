function getage(){
      var dnow
      var bday
          var a 
          var checker
          var temp
          var yr
          var dt
          var gbday = document.getElementById("birthday").value

          bday = new Date(gbday)
          dnow = new Date()
          a = dnow.getFullYear() - bday.getFullYear()
          yr = bday.getFullYear() + a
          dt = (dnow.getMonth() + 1) + "/" + dnow.getDate() + "/" + dnow.getFullYear()
          checker = (bday.getMonth() + 1) + "/" + bday.getDate() + "/" + yr
         
          if(Date.parse(dt) < Date.parse(checker)){
       a = a - 1
          }
         if(a<0){
          a=0
         }

          document.getElementById("age").value=a;
  }
  function getage2(id){
      var dnow
      var bday
          var a 
          var checker
          var temp
          var yr
          var dt
          var gbday = document.getElementById("birthday"+id).value

          bday = new Date(gbday)
          dnow = new Date()
          a = dnow.getFullYear() - bday.getFullYear()
          yr = bday.getFullYear() + a
          dt = (dnow.getMonth() + 1) + "/" + dnow.getDate() + "/" + dnow.getFullYear()
          checker = (bday.getMonth() + 1) + "/" + bday.getDate() + "/" + yr
         
          if(Date.parse(dt) < Date.parse(checker)){
       a = a - 1
          }
         if(a<0){
          a=0
         }

          document.getElementById("age"+id).value=a;
  }
  function showCorpadd(){
  	var selectBox = document.getElementById('addpatienttype')
    var userInput = selectBox.options[selectBox.selectedIndex].value

    if(userInput == '2')
    {
      
      document.getElementById('addcorp').className = ('form-group')
      
    }
    else if(userInput == '1')
    {
     document.getElementById('addcorp').className = ('form-group hidden')
     
    }
  }