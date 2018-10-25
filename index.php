<html>
    <head>
        <title>jQuery post form data using .ajax() method by codeofaninja.com</title>
         
    </head>
<body>
<input type="text" id="user_id" />
<input type="button" id="getUser" value="Get Details"/>
<div class="user-content" style="display: none;">
    <h4>User Details</h4>
    <p>Name: <span id="userName"></span></p>
    <p>Email: <span id="userEmail"></span></p>
    <p>Phone: <span id="userPhone"></span></p>
    <p>Register Date: <span id="userCreated"></span></p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
    $('#getUser').on('click',function(){
        var user_id = $('#user_id').val();
        $.ajax({
            type:'POST',
            url:'getData.php',
            dataType: "json",
            data:{user_id:user_id},
            success:function(data){
                if(data.status == 'ok'){
                    $('#userName').text(data.result.name);
                    $('#userEmail').text(data.result.email);
                    $('#userPhone').text(data.result.phone);
                    $('#userCreated').text(data.result.created);
                    $('.user-content').slideDown();
                }else{
                    $('.user-content').slideUp();
                    alert("User not found...");
                } 
            }
        });
    });
});
</script>

</body>
</html>