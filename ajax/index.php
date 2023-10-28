<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<div class="container mt-5">
<div class="row">
    <form action="" class="form-group" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" ><br>

        <label for="email">email</label>
        <input type="email" name="email" id="email" class="form-control" ><br>

        <label for="password">password</label>
        <input type="password" name="password" id="password" class="form-control" ><br>

        <input type="submit" value="submit" id="load" name="submit" class='btn btn-danger w-100'>

    </form>
</div>

</div>


    <div class="container d-flex mt-4 justify-content=">
        <h1>register</h1>
        <button class="btn btn-success "  id="load" >load</button>
</div>

<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody id="tab">
   
  
  </tbody>
</table>

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        let btn = $('#load');
        let tab = $('#tab');
        let name= $('#name');
        let email= $('#email');
        let password= $('#password');
        console.log(btn);
        
        function loaddata(){
            $.ajax({
                url: 'fetch.php',
                type:'POST',
                success: function(data){
                    tab.html(data)
                    console.log(data);
                }
            })
        }

        
        loaddata()
        btn.click(function(e) {
        e.preventDefault();
        $.ajax({
            url:'insert.php',
            type:"POST",
            data:{
                name:name.val(),
                email:email.val(),
                password:password.val()
            },
            success:function (result) {
                loaddata()
                console.log(result)                
            }
        })
    })
})
    </script>
</body>
</html>