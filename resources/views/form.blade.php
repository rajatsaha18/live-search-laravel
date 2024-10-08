<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>This is Form</h1>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">Form</div>
                        <div class="card-body">
                            <form action="" id="ajax-form" method="POST">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group  mt-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group  mt-3">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </form>

                            <div id="response-message"></div>
                            <script>
                                $(document).ready(function(){
                                    $('#ajax-form').on('submit',function(event){
                                        event.preventDefault(); //prevent the form from refreshing page

                                        $.ajax({
                                            url:"{{ route('ajax.submit') }}",
                                            method:"POST",
                                            data:$(this).serialize(),
                                            success:function(response){
                                                $('#response-message').html('<p>'+response.success+'</p>');
                                            },
                                            error:function(reponse){
                                                console.log(reponse);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
