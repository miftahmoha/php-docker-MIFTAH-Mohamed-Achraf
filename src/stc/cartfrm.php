<div class="cart-background">
    <div class="cart-img">
        <img class="cart-paint" <?php echo "src=$imageCart" ?> alt="">
    </div>
    <div class="cart-details">
        <description class="cart-text">
            <?php echo "Reference: $reference" ?>
        </description>
        <description class="cart-text">
            <?php echo "Price: $price" ?>
        </description>
        <description class="cart-text">
            <?php echo "Quantity: $quantity" ?>
        </description>
        <description class="cart-text">
            <?php 
            $totalPrice = (int)$quantity * (int)$price;
            echo "Total price: $totalPrice$" 
            ?>
        </description>
        <!-- <div class="adjust">
            <form action="./includes/order.inc.php" method="POST">
                <div class="regulate">
                    <input name="quantity" class="paint-input" type="text">
                    <button class="paint-set plus" type="button">+</button>
                    <button class="paint-set minus" type="button">-</button>
                </div>
                <button name="remove" type="submit" class="cart-button">Remove</button>
                <button name="update" type="submit" class="cart-button">Update</button>
            </form> -->
        </div>
    </div>
    </div>
</div>

