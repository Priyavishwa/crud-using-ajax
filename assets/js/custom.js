//console.log() to print data
console.log('working');
$(document).ready(function(){
    $('.mysubmit').click(function(){
        //alert('ok');
        var name = $('.name').val();
        var email = $('.email').val();
        var password = $('.password').val();
        if(name == "" || email == "" || password == ""){
            $('.feedback').text('All fields are required.');

        }
        else{
            //sending our data in ajax format
            $.ajax({
                type:'POST',
                //siteurl+controllerName then methodName
                url:surl+"Crud/addUser",
                data:{
                    name:name,
                    email:email,
                    password:password
                },
                success:function($data){
                    var myvar = "";
                    var conv = JSON.parse($data);
                    myvar+='<tr>';
                        myvar+='<td>'+conv[0].sName+'</td>';
                        myvar+='<td>'+conv[0].sEmail+'</td>';
                        myvar+='<td>'+conv[0].sDate+'</td>';
                    myvar+='</tr>';
                    $('.mytable').append(myvar);    
                    console.log(conv);
                    //feedback here

                },
                error:function(){
                    //error here
                }
            })
            //alert('perform ajax here');

        }

       
    })
    $('.edit').click(function(){
       var text = $(this).data('text');
       var id = $(this).data('id');
       console.log(text+id);

       //sending data in ajax
       $.ajax({
           type:'post',
           url:surl+'crud/checkUser',
           data:{
               text:text,
               id:id

           },
           // Receiving our data in object form
           success:function($response){
               var dynfield = "";
               var obj = JSON.parse($response);
               //console.log(obj);
               dynfield+='<input type="text" class="dynName" value="'+obj[0].sName+'">';
               dynfield+='<input type="text" class="dynEmail" value="'+obj[0].sEmail+'">';
               dynfield+='<input type="text" class="dynPassword" value="'+obj[0].sPassword+'">';
               dynfield+='<button data-id="'+obj[0].sId+'" class="updatedynbutton">Update</button>';
               $('.dyncondiv').html(dynfield);

           },
           error:function(){
               console.log('print the error here');
           }

       })
    })

    
});