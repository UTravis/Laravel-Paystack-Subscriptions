<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Subscribe</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-5">Monthly Subscription!!!</h5>
                        <p class="card-text">
                             <div class="text-center text-bold">₦1000/Month</div>
                            <form id="paymentForm" action="{{route('makePlan')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Enter Email*</label>
                                    <input type="text" id="email" name="email"  class="form-control" required>
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-primary btn-block mt-5" value="Subscribe">
                                </div>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>