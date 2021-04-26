<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
            "params" => "",
        ],

    ],

    "download" => [
        "POST" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "download",
            "params" => "",
        ],
    ],
    "cart" => [
        "POST" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "cart",
            "params" => "",
        ],
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "cart",
            "params" => "",
        ],
    ],
    "registration" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "registration",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "registrationModel",
            "params" => "",
        ],
    ],
    "registrationForm" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "registrationForm",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "registrationForm",
            "params" => "",
        ],
    ],
    "authentication" => [
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "authentication",
            "params" => "",
        ],
    ],
    "logout" => [
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "logout",
            "params" => "",
        ],
    ],

        "adminCreateProduct" => [
            "GET" => [
                "controller" => "\\controllers\\AdminController",
                "action" => "adminCreateProduct",
                "params" => "",
            ],
            "POST" => [
                "controller" => "\\controllers\\AdminController",
                "action" => "adminCreateProduct",
                "params" => "",
            ],
        ],

            "createProduct" => [
        "GET" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "createProduct",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "createProduct",
            "params" => "",
        ],
    ],

    "createCategory" => [
        "GET" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "createCategory",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "createCategory",
            "params" => "",
        ],
    ],
    "addToCart" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "addToCart",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "addToCart",
            "params" => "",
        ],
    ],

    "removeFromCart" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "removeFromCart",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "removeFromCart",
            "params" => "",
        ],
    ],

    "downloadFiles" => [
        "GET" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "downloadFiles",
            "params" => "",
        ],
        "POST" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "downloadFiles",
            "params" => "",
        ],
    ],
    "admin" => [
        "GET" => [
            "controller" => "\\controllers\\AdminController",
            "action" => "admin",
            "params" => "",
        ],
    ],

    "order" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "order",
            "params" => "",
        ],
    ],

    "(.*)" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "error404",
            "params" => "",
        ],
    ],
];