class CartItem{
    constructor(id, count){
        this.count = count;
        this.id = id;
    }
    id;
    count;
}

class ShoppingCart{
    cartItems = [];

    constructor(){
        if(window.localStorage.getItem('shoppingCart') != null){
            this.cartItems = JSON.parse(window.localStorage.getItem('shoppingCart'));
        }
    }

    Save(){
        localStorage.setItem('shoppingCart', JSON.stringify(this.cartItems));
    }

    Clear(){
        this.cartItems = [];
        this.Save();
    }

    Add(id, count){
        if(!this.isInCart(id)) {
            this.cartItems.push(new CartItem(id, count));
            this.Save();

            $('body').append(
                "<div class='alert alert-success addCartpopUp'>"+
                    "Sikeres kosárba rakás"+
                "</div>"
            )
            setTimeout(function() {
                $(".addCartpopUp").fadeOut("normal", function() {
                    $(this).remove();
                });
            }, 2000);
        }
    }

    Remove(id){
        this.cartItems.forEach((element) => {
            if(element.id == id){
                const index = this.cartItems.indexOf(element);
                if (index > -1) { // only splice array when item is found
                    this.cartItems.splice(index, 1); // 2nd parameter means remove one item only
                }
                return;
            }
        });

        this.Save();
    }

    Update(id, count){
        if(count == 0) {
            this.Remove(id);
            return;
        }
        else {
            if(this.isInCart(id)){
                this.cartItems.forEach((element) => {
                    if(element.id == id){
                        element.count = count;
                        return;
                    }
                });
            }else{
                this.Add(id, count);
                return;
            }
        }
        this.Save();
    }

    isInCart(id){
        let igyMarMukodjBammeg = false;

        this.cartItems.forEach((element) => {
            if(element.id === id){
                igyMarMukodjBammeg = true;
                return;
            }
        });

        return igyMarMukodjBammeg;
    }

    GetCount(){
        return this.cartItems.length;
    }
    GetTotal(){
        return this.cartItems.length;
    }

    GetFoodCount(id){
        let db = 0;

        this.cartItems.forEach((element) => {
            if(element.id === id){
                db = element.count
                return;
            }
        });

        return db;
    }

    GetDataFromServer(){
        let resp;
        $.ajax({
            type: "POST",
            url: '/api/shoppingCartData',
            async: false,
            data: {
                data: JSON.stringify(this.cartItems)
            },
            dataType: 'json',
            success: function(response){
                resp = response;
            }
          });
          return resp;
    }
}
