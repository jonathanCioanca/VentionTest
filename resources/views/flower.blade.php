<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vention Flower Test</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
           .page-wrapper{
                width:1200px;
                height: 200px;
           }
           .sales-row{
                margin-top: 10px
                width:100%;
                height: 200px
           }
           .flower-container{
                width:32%;
                height: 500px;
                display:inline-block;
                text-align: center;

           }
           .picture-container{
                width: 100%;
                height: 70%;
                position: relative;
           }
           
            .image {
                opacity: 1;
                display: block;
                max-width: 100%;
                max-height: 100%;
                transition: .5s ease;
                backface-visibility: hidden;
            }
            .picture-container:hover .image {
              opacity: 0.3;
            }
           
            .bottom-border{
                border-bottom:1px solid #D3D3D3;
                width: 80%;
                display:inline-block;
            }
            .text-container{
                width: 100%;
                height: 30%;
                text-align: center;
            }
            .title-text{
                width: 100%;
                padding-top:10px; 
                display: inline-block;
                font-weight: bold;
            }
            .price-text{
                width: 100%;
                display: inline-block;
            }

            .cart {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
            }
            .picture-container:hover .cart {
                opacity: 1;
            }
            .button {
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                padding: 16px 32px;
            }
            .button:hover {
                cursor: pointer;
            }
            .buy-button{
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                padding: 16px 32px;
                width: 70px;
            }
            .buy-button:hover{
                 cursor: pointer;
            }
            .circle{
                border-radius: 50%;
                width: 90px;
                height: 90px; 
                background-color: red;
                position:absolute;
                top: 0px;
                left: 0px;
            }
            .circle-text{
                padding-top: 35px;
                font-weight:bold;
                color:white;
                display: inline-block;
            }


        </style>
    </head>
    <body>
        <div class='page-wrapper'>
           <div class="buy-button" onClick='buy()'>Buy Now</div>

            <div class='sales-row'>
                @foreach($aFlowerData as $flower_id => $flower)
                    <div class='flower-container'>
                        <div class='picture-container'>
                            <img src="{{$flower['image']}}" alt="{{$flower['name']}}" class="image">
                            <div class="cart">
                                <div class="button" id="{{$flower_id}}" onClick='addToCart(this.id)'>Add to cart</div>
                            </div>
                        </div>
                        <div class='bottom-border'></div>
                        <div class='text-container'>
                            <div class='title-text'>
                                <span>{{$flower['name']}}</span>
                            </div>
                            <div class='price-text'>
                                <span>${{$flower['price']}}</span>
                            </div>
                            <div class='star-rating'>
                                @for ($i = 1; $i <= $flower['stars']; $i++)
                                    <img src="/assets/star.svg" alt="Star">
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    var cart = [];

    var flowerList = <?php echo json_encode($aFlowerData); ?>;

    function addToCart(id){
        var elem = document.getElementById(id);
        var pictureContainer = elem.closest(".picture-container");  

        if (elem.innerHTML =="Add to cart"){
            elem.innerHTML  = "Remove from cart";

            var circleDiv = document.createElement('div');
            circleDiv.setAttribute('class','circle');
            circleDiv.setAttribute('id',id+'circle');

            var circleTextDiv = document.createElement('div');
            circleTextDiv.setAttribute('class','circle-text');
            circleTextDiv.textContent = "In Cart";

            circleDiv.appendChild(circleTextDiv);
            pictureContainer.appendChild(circleDiv);

            cart.push(id);
        }
        else{
            elem.innerHTML  = "Add to cart";
            var elem = document.getElementById(id+'circle');
            elem.remove();
            for (var i = 0; i < cart.length; i++) {
                if (cart[i] === id) 
                {   
                   cart.splice(i,1);
                }
            }
        } 
    }

    function buy(){

        if(cart.length ==0){
            alert('There is nothing in your cart');
        }else{

            var shoppingList = [];

            $.each(flowerList, function (index) {
                for (var i = 0; i < cart.length; i++) {
                    if(index == cart[i]){
                        shoppingList.push(flowerList[index]);
                    }
                }
            });

            var object = JSON.stringify(shoppingList);

            $.ajax({
                url: '/new_purchase',
                type: 'GET',
                data: {data: object},
                success: function (ret) {

                    if(ret == 'True'){
                        alert('Thank you for your purchase');
                        location.reload();
                    }
                
                }
            });
        }
        
         
    }
</script>   
