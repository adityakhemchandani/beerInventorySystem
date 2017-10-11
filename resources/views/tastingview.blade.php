<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>My Bourbon Whiskey Tastings</title>
   <link rel="stylesheet" href="Project I_Matthew_Martin.css" media="screen and (min-width:801px)"/>
   <link rel="stylesheet" href="Project I_Matthew_Martin-mini.css" media="screen and (max-width:800px)"  />
   <meta name="viewport" content="width=device-width" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
</head>
 <body>
  <header>
    <h1>My Bourbon Whiskey Tastings</h1>
    <nav>
      <ul id="menu">
    	  <li><a href="#">About Us</a></li>
        <li><a href="https://www.google.com/search?hl=en&q=bourbon&gws_rd=ssl">Search for Bourbon</a></li>
        <li><a href="View_My_Collection.php">My Collection</a></li>
      </ul> 
    </nav>
  </header>
<article class="left">
    <section>
      
      <table id="table">
        <script type="text/javascript">

          $(document).ready(function(){
            console.log ("made it to get javascript");
           $.get('MySession',function(data){
              var sessionID = data;
              console.log(sessionID);
              $("#menu").append(
              '<li>Your Session ID is: '+sessionID+'</li>');
              });   
              
            
            
            $.get('tasting',function(data){ 
            //console.log ("made it to get json");  
            //console.log (data); 
            generateTable(data, $('table'));
            });

            $("#mainForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              if (id == ""){
                //console.log ("prevented default");
                $.post('tasting', $("#mainForm").serialize(), function(data){
                //console.log("past post");
                $.get('tasting',function(data){  
                generateTable(data, $('table'));
                document.getElementById("mainForm").reset();
                $( "#id" ).val("");
                //clearForm(id);
                });
                });
              }
              else {
                
                $.ajax({url:'tasting/'+id, data:$("#mainForm").serialize(), type: 'PUT', success: function(data){
                  $.get('tasting',function(data){  
                    generateTable(data, $('table'));
                    document.getElementById("mainForm").reset();
                    $( "#id" ).val("");
                  });
                }
              });

              } 
            });

            $("#table").on('click', '.delete', function(event){
              event.preventDefault();
              var id = $(this).val();
              $.ajax({url:'tasting/'+id, type: 'DELETE', success: function(data){
                $.get('tasting',function(data){  
                generateTable(data, $('table'));
                });
                }
              });
            // });
            });


            $("#table").on('click', '.update', function(event){
              var id = $(this).val();
              console.log(id);
              populateform(id);
              
              
              });
            

            $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });


          });
           

        function generateTable (data, target){
        clearContainer(target);  
        var tableHtml = '<table><thead><tr><th>Delete</th><th>ID</th><th>Date</th><th>Category</th><th>Distillery Name</th><th>Location</th><th>Rating</th><th>Notes</th><th>Action</th></tr></thead>';

          $.each(data,function(i,dat){ 
          tableHtml += '<tr><td><button class="delete" value='+dat.id+'>Delete</button></td><td>'+dat.id+'</td><td>'+dat.date+'</td><td>'+dat.category+'</td><td>'+dat.distilleryname+'</td><td>'+dat.location+'</td><td>'+dat.rating+'</td><td>'+dat.notes+'</td><td><button class="update" value='+dat.id+'>Update</button></td></tr>';
          });

        tableHtml += '</table>';

        $(target).append(tableHtml);
        }



        function populateform(data)
        {
           var frm = $("#mainForm");
           var num = data;
           //console.log(num);
           //$(document).ready(function(){
            $.get('tasting/'+num,function(data){
              $.each(data,function(i,dat){
                //console.log(dat.date);
                $( "#date" ).val(dat.date);
                //$( "#category" ).val(dat.category);
                if(dat.category == "Bourbon") {  $("#bourbon").attr("checked",dat); };
                if(dat.category == "Whiskey") {  $("#whiskey").attr("checked",dat); };
                if(dat.category == "") {  $("#whiskey").attr("checked",false); };
                if(dat.category == "") {  $("#bourbon").attr("checked",false); };
                $( "#distilleryname" ).val(dat.distilleryname);
                $( "#location" ).val(dat.location);
                $( "#rating" ).val(dat.rating);
                $( "#notes" ).val(dat.notes);
                //$( "#addwishlist" ).val(dat.addwishlist);
                //if(dat.addwishlist == "yes") {  $("#addwishlist").attr("checked",dat); };
                //$( "#photo" ).val(dat.photo);
                $( "#id" ).val(dat.id);
              });


            });
          //});
        }

        function clearContainer(container){
          container.html('');
        }

        function clearForm(container){
            var frm = $("#mainForm");
            var num = data;
           //console.log(num);
           //$(document).ready(function(){
           // $.getJSON('index.php?id='+num,function(data){
             // $.each(data,function(i,dat){
                //console.log(dat.date);
                frm.$( "#date" ).val("");
                //$( "#category" ).val(dat.category);
                if(dat.category == "Bourbon") {  $("#bourbon").attr("checked",false); };
                if(dat.category == "Whiskey") {  $("#whiskey").attr("checked",false); };
                if(dat.category == "") {  $("#whiskey").attr("checked",false); };
                if(dat.category == "") {  $("#bourbon").attr("checked",false); };
                $( "#distilleryname" ).val("");
                $( "#location" ).val("");
                $( "#rating" ).val("");
                $( "#notes" ).val("");
                //$( "#addwishlist" ).val(dat.addwishlist);
                //if(dat.addwishlist == "yes") {  $("#addwishlist").attr("checked",false); };
                //$( "#photo" ).val(dat.photo);
                $( "#id" ).val("");
  
        }
       
       </script>
      </table>
    </section>
       
  </article>
  <aside>
        <div class="box">
           <h3>Tasting Information</h3>
            <form name='mainForm' id='mainForm'>
    <fieldset>
       <legend>Enter a Tasting</legend>
       <label id=reqlabel>* Required Fields</label>
       <p> 
         <label>Date:</label><label id=reqlabel>*</label>
         <input type="text" id="date" name="date" required class="required" placeholder="mm/dd/yyyy"/>
      </p>
       <br/>
       <p>
            <label>Type (Not sure? see Bourbon 101):</label><label id=reqlabel>*</label><br/>
            <input type="radio" name="category" id="bourbon" value="Bourbon">Bourbon<br />
            <input type="radio" name="category" id="whiskey" value="Whiskey">Whiskey<br />
       </p>
       <br/>    
       <p>
         <label>Distillery Name:</label><label id=reqlabel>*</label>
         <input type="text" id="distilleryname" name="distilleryname" placeholder="Enter Distillery Name" required class="required"/>
       </p>
       <br/>
       <p>
         <label>Country:</label>
         <select name="location" id="location">
           <option>Choose a country</option>
           <option>United States</option>
           <option>Canada</option>
           <option>Ireland</option>
           <option>Scotland</option>
           <option>Japan</option>
           <option>Other</option>
          </select>
       </p>
       <br/>
       <p><label>Taste Rating:</label></p> 
       <p>Never Again 
         <input type="range" min="0" max="10" step="1" id="rating" name="rating"/>
       Delicious</p> 
      </p>
      <br/>
       <p>
       <label>Tasting Notes: </label><br/>
       <textarea placeholder="Describe your tasting experience" rows="5" cols="45" id="notes" name="notes"></textarea>
     </p>
     <br/>  
     <!--  <p>
          <label>Add to Wish List: </label>
          <input type="checkbox" id="addwishlist" name="addwishlist" value="yes">
      </p>
      <br/>   -->
      <!-- <p>
         <label>Upload Bottle Photo:</label> 
         <input type="file" id="photo" name="photo" />
      </p>
      <br/> -->
       <input type="submit" name="submit" value="Submit Tasting" />
       <input type="hidden" value="" name="id" id="id">
    </fieldset>
  </aside>
  <footer>
    <p><a href="Project I_Matthew_Martin.html">Home</a> | <a href="#">Contact Us</a> </p>
    <p><em>Copyright &copy; 2016 My Bourbon Whiskey Collection</em></p>
  </footer>
</body>
</html>