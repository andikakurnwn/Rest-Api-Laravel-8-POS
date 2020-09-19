# 1. Request Login, method POST :

https://api.kodejalanan.com/api/login
is request required email and password for login 
example :

```json
{
    "email" : "customer@blog.com",
    "password" : "rootcustomer"
}
```

# 2. Request Register for Customer, method POST : 

https://api.kodejalanan.com/api/login
is request required name, email, password and c_password for register 
example :

```json
{
    "name" : "Andika Kurniawan",
    "email" : "andikakurnwn@kodejalanan.com",
    "password" : "123456789",
    "c_password" : "123456789"
}
```

# 3. Request List Product, Method GET :

https://api.kodejalanan.com/api/product

# 4. Request Detail of Product, method GET :

https://api.kodejalanan.com/api/product/{id_product}
is request required product_id for load data from detail Product
example :

https://api.kodejalanan.com/api/product/1

# 5. Request List Product by Category, Method GET :

https://api.kodejalanan.com/api/category/{slug}
is request required slug for load data from detail Product
example :

https://api.kodejalanan.com/api/category/makanan


# 6. Request Cart of customer, method GET :

https://api.kodejalanan.com/api/customer/cart

for the routes your mush authantication login with api token

# 7. Request Add Product to Cart of Customer, method POST : 

https://api.kodejalanan.com/api/customer/cart
is request required product_id, notes ( nullable ) and kuantitas for Added Product to Cart 
example :

```json
{
    "product" : "1",
    "notes" : "Size : Small , For : Andika Kurniawan",
    "kuantitas" : "2"   
}
```

# 8. Request Delete Product from Cart of Customer, method DELETE :

https://api.kodejalanan.com/api/customer/cart/{cart_id}
is request required cart_id for deleted Product from Cart of Customer
example :

https://api.kodejalanan.com/api/customer/cart/1

# 9. Request CheckOut, method POST : 

https://api.kodejalanan.com/api/customer/checkOut
is request required data of cart for checkOut Product of Customer
example :

```json
{
    "cart" : [
        {
            "id" : "3",
            "user_id" : "3",
            "product_id" : "8",
            "notes" : "",
            "kuantitas" : "5",
            "subtotal" : "50000"
        }
    ]

}
```

# 10. Request Transaction, method POST :

https://api.kodejalanan.com/api/customer/store
is request required data of cart for make transaction Product of Customer
example :

```json
{
    "cart" : [
        {
            "id" : "3",
            "user_id" : "3",
            "product_id" : "8",
            "notes" : "",
            "kuantitas" : "5",
            "subtotal" : "50000"
        }
    ],

    "subtota" : "50000"

} 

```
