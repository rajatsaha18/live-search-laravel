<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Live Search</h1>
                    <input type="text" id="search" name="title" placeholder="Search...">

                    <ul id="results"></ul>

                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $("#search").on('keyup',function(){
                var query = $(this).val();
                //check input is clear?
                if(query === '')
                {
                    $("#results").html(''); // clear results if input is empty
                    return; // exit the function
                }

                $.ajax({
                    url:"{{ route('liveSearch') }}",
                    type:"GET",
                    data:{'query':query},
                    success:function(data){
                        $("#results").html(''); // ager result clear hobe ekhane
                        if(data.length > 0){
                            $.each(data, function(key, value){
                                $("#results").append('<li>' +value.title+ '</li>');
                            });
                        }else{
                            $("#results").append('<li>No data Found</li>');
                        }
                    }
                });
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
