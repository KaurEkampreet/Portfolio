
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap & Pizza CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="styles/pizza.css">

    <title>Poppa's Pizza</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png"
          href="Images/Pizzaicon.png">

</head>
<body>

<div class="container" id="main">

    <div class="jumbotron">
        <h1 class="display-4">Poppa's Pizza</h1>
        <p class="lead">We make the world's best pizza!</p>
        <hr class="my-4">
        <p>Serving GRC students for over 2 decades.</p>
    </div>

    <img src="Images/pizzaguy.png" alt="Pizza Guy" class="float-right">

    <form id="pizza-form" action="confirmation.php" method="post">
        <fieldset class="form-group">
            <legend>Contact Info</legend>
            <div class="form-group">
                <label for="firstName">First name</label>
                <input type="text" class="form-control"
                       id="firstName" name="firstName">
                <span class="err" id="err-fname">
                Please enter a first name
            </span>
            </div>
            <div class="form-group">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control"
                       id="lastName" name="lastName">
                <span class="err" id="err-lname">
                Please enter a last name
            </span>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <legend>Pickup or Delivery</legend>
            <div class="form-check">
                <input class="form-check-input"
                       type="radio" name="method"
                       id="pickup" value="pickup">
                <label class="form-check-label" for="pickup">
                    Pickup
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"
                       type="radio" name="method"
                       id="delivery" value="delivery">
                <label class="form-check-label" for="delivery">
                    Delivery
                </label>
            </div>
            <span class="err" id="err-method">
            Please select pickup or delivery
        </span>

            <!-- Address -->
            <div class="form-group" id="address-block">
                <label for="address">Address</label>
                <textarea class="form-control"
                          id="address" name="address"
                          rows="3" cols="20"></textarea>
                <span class="err" id="err-address">
                Please enter an address
            </span>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <legend>Select Toppings</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"
                       value="pepperoni" id="pepperoni"
                       name="toppings[]">
                <label class="form-check-label" for="pepperoni">
                    Pepperoni
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"
                       value="mushrooms" id="mushrooms" name="toppings[]">
                <label class="form-check-label" for="mushrooms">
                    Mushrooms
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"
                       value="artichoke-hearts" id="artichoke-hearts" name="toppings[]">
                <label class="form-check-label" for="artichoke-hearts">
                    Artichoke Hearts
                </label>
            </div>
            <span class="err" id="err-toppings">
            Please select at least one topping
        </span>
        </fieldset>

        <fieldset class="form-group">
            <legend>Pizza Size</legend>
            <div class="form-group">
                <select class="form-control"
                        id="size" name="size">
                    <?php
                    $sizes = array(
                            "none"=>"select a size",
                            "small"=>"Small (8\")",
                            "medium"=>"Medium (12\")",
                            "large"=>"Large (18\")"
                    );

                    foreach($sizes as $key=>$value){
                        echo "<option value='$key'> $value</option>";
                    }
                    ?>

                </select>
            </div>
            <span class="err" id="err-size">Please enter a size</span>
        </fieldset>

        <button id="submit" type="submit" class="btn btn-primary">
            Submit your order
        </button>

    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/pizza.js"></script>
<script>
    //Show address when delivery is clicked
    $("#delivery").on("click", function(){
        $("#address-block").css("display", "block");
    });

    //Hide address when pickup is clicked
    $("#pickup").on("click", function(){
        $("#address-block").css("display", "none");
    });

</script>
</body>
</html>