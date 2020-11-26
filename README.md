# Documentation

![alt tag](https://github.com/andikakurnwn/Rest-Api-Laravel-8-POS-/blob/master/public/wordpress-laravel-8-home.jpg)

For request Image using url :
https://api.kodejalanan.com/storage/{path}/{name_image}
example : 
```
https://api.kodejalanan.com/storage/product/donat.jpg
```
## 1. Request Login, method POST :

https://api.kodejalanan.com/api/login
is request required email and password for login 
example :

Input
```json
{
    "email" : "customer@blog.com",
    "password" : "rootcustomer"
}
```
Output 
```json
{
    "status": "Success",
    "message": "Successfully to Login :)",
    "data": {
        "id": 5,
        "role_id": 3,
        "username": "CSTE202010010003",
        "image": "default.png",
        "name": "Andika Kurniawan",
        "telephone": null,
        "email": "andikakurnwn@kodejalanan.com",
        "email_verified_at": null,
        "address": null,
        "about": null,
        "created_at": "2020-10-01T13:21:15.000000Z",
        "updated_at": "2020-10-01T13:21:15.000000Z",
        "token": "string token"
    }
}
```


## 2. Request Register for Customer, method POST : 

https://api.kodejalanan.com/api/register
is request required name, email, password and c_password for register 
example :

input
```json
{
    "name" : "Andika Kurniawan",
    "email" : "andikakurnwn@kodejalanan.com",
    "password" : "123456789",
    "c_password" : "123456789"
}
```

output 
```json
{
    "status": "Success",
    "message": "Successfully Added new Customer :)",
    "data": {
        "username": "CSTE202010010003",
        "name": "Andika Kurniawan",
        "email": "andikakurnwn@kodejalanan.com",
        "updated_at": "2020-10-01T13:21:15.000000Z",
        "created_at": "2020-10-01T13:21:15.000000Z",
        "id": 5,
        "token": "string token"
    }
}
```

## 3. Request Profile User, Method GET : 

example : 

is request required token bearer for load data User :

```
https://api.kodejalanan.com/api/customer/profile
```

Output : 

```
{
    "status": "Success",
    "message": "Successfully to load User :)",
    "data": {
        "id": 5,
        "role_id": 3,
        "username": "CSTE202010011113",
        "image": "default.png",
        "name": "Andika Kurniawan",
        "telephone": null,
        "email": "andikakurnwn@kodejalanan.com",
        "email_verified_at": null,
        "address": null,
        "about": null,
        "created_at": "2020-10-01T13:21:15.000000Z",
        "updated_at": "2020-10-01T13:21:15.000000Z",
        "role": {
            "id": 3,
            "name": "Customer",
            "slug": "customer",
            "created_at": null,
            "updated_at": null
        }
    }
}
```

## 4. Request to Update Profile User, Method POST : 

is request required token bearer for update Profile :

example : 

```
https://api.kodejalanan.com/api/customer/profile-update
```

and Required data :

```json
{

    "name" : "Andika",
    "email" : "andikakurnwn@gmail.com",
    "image" : "blablabla",
    "telephone" : "081574088369",
    "address" : "Jalan panjang"

} 
```

## 5. Request to Update Password User, Method PUT :

is request required token bearer for update Password :

example : 

```
https://api.kodejalanan.com/api/customer/password-update
```

and Required data :

```json
{
    "old_password" : "123456",
    "password" : "987654",
    "c_password" : "987654"
}
```

## 6. Request List Product, Method GET :

is request don't required anything for get List Product
example :
```
https://api.kodejalanan.com/api/product
```

Output
```json
{
    "status": "Success",
    "message": "Successfully to load Products :)",
    "data": [
        {
            "id": 1,
            "user_id": 2,
            "name": "Ice Coffe Cappucino",
            "description": "Ice Coffe Cappucino yang kami miliki ini bukanlah Ice Coffe Cappucino kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau ..!!",
            "available_size": 1,
            "created_at": null,
            "updated_at": null,
            "product_images": [
                {
                    "id": 1,
                    "product_id": 1,
                    "name": "ice_coffe_cappucino.jpg",
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 2,
                    "product_id": 1,
                    "name": "ice_coffe_cappucino_2.jpg",
                    "created_at": null,
                    "updated_at": null
                }
            ],
            "size_variations": [
                {
                    "id": 1,
                    "product_id": 1,
                    "size": "Small",
                    "stock": 50,
                    "price": 10000,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 2,
                    "product_id": 1,
                    "size": "Medium",
                    "stock": 50,
                    "price": 16000,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 3,
                    "product_id": 1,
                    "size": "Big",
                    "stock": 50,
                    "price": 20000,
                    "created_at": null,
                    "updated_at": null
                }
            ]
        },
        {
            "id": 7,
            "user_id": 2,
            "name": "Roti Bakar",
            "description": "Roti Bakar yang kami miliki ini bukanlah Roti Bakar.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!",
            "available_size": 0,
            "created_at": null,
            "updated_at": null,
            "product_images": [
                {
                    "id": 9,
                    "product_id": 7,
                    "name": "roti_bakar.jpg",
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 10,
                    "product_id": 7,
                    "name": "roti_bakar_2.jpg",
                    "created_at": null,
                    "updated_at": null
                }
            ],
            "product_price": {
                "id": 1,
                "product_id": 7,
                "stock": 35,
                "price": 7000,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
```


## 7. Request Detail of Product, method GET :

https://api.kodejalanan.com/api/product/{id_product}
is request required product_id for load data from detail Product
example :

```
https://api.kodejalanan.com/api/product/1
```

Output
```json
{
    "status": "Success",
    "message": "Successfully to load Product :)",
    "data": {
        "id": 3,
        "user_id": 2,
        "name": "Japanese Ice Coffe",
        "description": "Japanese Ice Coffe yang kami miliki ini bukanlah Japanese Ice Coffe kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!",
        "available_size": 1,
        "created_at": null,
        "updated_at": null,
        "product_images": [
            {
                "id": 5,
                "product_id": 3,
                "name": "japanese_ice_coffe,jpg",
                "created_at": null,
                "updated_at": null
            }
        ],
        "size_variations": [
            {
                "id": 6,
                "product_id": 3,
                "size": "Small",
                "stock": 50,
                "price": 7000,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 7,
                "product_id": 3,
                "size": "Big",
                "stock": 50,
                "price": 13000,
                "created_at": null,
                "updated_at": null
            }
        ]
    }
}
```


## 8. Request List Product by Category, Method GET :

https://api.kodejalanan.com/api/category/{slug}
is request required slug for load data from detail Product
example :

```
https://api.kodejalanan.com/api/category/makanan
```

Output
```json
{
    "status": "Success",
    "message": "Successfully to load Products by category :)",
    "data": [
        {
            "id": 7,
            "user_id": 2,
            "name": "Roti Bakar",
            "description": "Roti Bakar yang kami miliki ini bukanlah Roti Bakar.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!",
            "available_size": 0,
            "created_at": null,
            "updated_at": null,
            "product_images": [
                {
                    "id": 9,
                    "product_id": 7,
                    "name": "roti_bakar.jpg",
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 10,
                    "product_id": 7,
                    "name": "roti_bakar_2.jpg",
                    "created_at": null,
                    "updated_at": null
                }
            ],
            "product_price": {
                "id": 1,
                "product_id": 7,
                "stock": 35,
                "price": 7000,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
```


## 9. Request List Cart of customer, method GET :

is request required Authorization token Customer for get List Cart of Customer 
example :

```
https://api.kodejalanan.com/api/customer/cart

```

output : 
```json
{
    "status": "Success",
    "message": "Successfully to load Carts :)",
    "data": {
        "0": {
            "id": 8,
            "user_id": 2,
            "name": "Donat",
            "description": "Donat yang kami miliki ini bukanlah Donat kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau ..!!",
            "available_size": 0,
            "created_at": null,
            "updated_at": null,
            "notes": null,
            "kuantitas": 10,
            "subtotal": 100000,
            "product_images": [
                {
                    "id": 11,
                    "product_id": 8,
                    "name": "donat.jpg",
                    "created_at": null,
                    "updated_at": null
                }
            ],
            "product_price": {
                "id": 2,
                "product_id": 8,
                "stock": 35,
                "price": 10000,
                "created_at": null,
                "updated_at": null
            },
            "categories": [
                {
                    "id": 1,
                    "name": "Makanan",
                    "description": "Ini adalah kategori tentang berbagai produk makanan kami",
                    "slug": "makanan",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "product_id": 8,
                        "category_id": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                }
            ]
        },
        "subtotal": 100000
    }
}
```

## 10. Request Add Product to Cart of Customer, method POST : 

https://api.kodejalanan.com/api/customer/cart
is request required product_id, notes ( nullable ) and kuantitas for Added Product to Cart 
example :

```json
{
    "product_id" : "1",
    "notes" : "Size : Small , For : Andika Kurniawan",
    "kuantitas" : "2"   
}
```

## 11. Request Delete Product from Cart of Customer, method DELETE :

https://api.kodejalanan.com/api/customer/cart/{cart_id}
is request required cart_id for deleted Product from Cart of Customer
example :

```
https://api.kodejalanan.com/api/customer/cart/1
```


## 12. Request CheckOut, method POST : 

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

## 13. Request Transaction, method POST :

https://api.kodejalanan.com/api/customer/transaction
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
    
    "discount" : "10000",
    "subtotal" : "50000"

} 

```
## 14. Pending Transaction, method GET :

is request required Authorization token Customer for get Pending Transaction of Customer
example :

```
https://api.kodejalanan.com/api/customer/pending-transaction
```

Output
```json
{
    "status": "Success",
    "message": "Successfully to load Pending Transactions :)",
    "data": [
        {
            "id": 7,
            "no_transaction": "INV20201211003",
            "status": 0,
            "user_id": 5,
            "subtotal": 50000,
            "created_at": "2020-11-12T14:48:03.000000Z",
            "updated_at": "2020-11-12T14:48:03.000000Z",
            "transaction_details": [
                {
                    "id": 7,
                    "no_transaction": "INV20201211003",
                    "product_id": 8,
                    "notes": null,
                    "kuantitas": 5,
                    "discount": 0,
                    "subtotal": 50000,
                    "created_at": "2020-11-12T14:48:03.000000Z",
                    "updated_at": "2020-11-12T14:48:03.000000Z"
                }
            ]
        }
    ]
}
```

Note : if status = 0 it's customer no pay yet but if status = 1 customer pay

## 15. History Transaction, method GET :

is request required Authorization token Customer for get History Transaction of Customer
example :

```
https://api.kodejalanan.com/api/customer/history-transaction
```

Output
```json
{
    "status": "Success",
    "message": "Successfully to load Transactions :)",
    "data": [
        {
            "id": 7,
            "no_transaction": "INV20201211003",
            "status": 1,
            "user_id": 5,
            "subtotal": 50000,
            "created_at": "2020-11-12T14:48:03.000000Z",
            "updated_at": "2020-11-12T14:48:03.000000Z",
            "transaction_details": [
                {
                    "id": 7,
                    "no_transaction": "INV20201211003",
                    "product_id": 8,
                    "notes": null,
                    "kuantitas": 5,
                    "discount": 0,
                    "subtotal": 50000,
                    "created_at": "2020-11-12T14:48:03.000000Z",
                    "updated_at": "2020-11-12T14:48:03.000000Z"
                }
            ]
        }
    ]
}
```
Note : if status = 0 it's customer no pay yet but if status = 1 customer pay

