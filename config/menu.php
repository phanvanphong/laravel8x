<?php

    return [
        [
            'label' => 'TỔNG QUAN',
            'route' => 'dashboard',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'DANH MỤC',
            'route' => 'category.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'category.index',
                ],
                [
                    'label' => 'Thêm mới',
                    'route' => 'category.create',
                ]
            ]
        ],
        [
            'label' => 'THƯƠNG HIỆU',
            'route' => 'brand.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'brand.index',
                ],
                [
                    'label' => 'Thêm mới',
                    'route' => 'brand.create',
                ]
            ]
        ],
        [
            'label' => 'SẢN PHẨM',
            'route' => 'product.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'product.index',
                ],
                [
                    'label' => 'Thêm mới',
                    'route' => 'product.create',
                ]
            ]
        ],
        [
            'label' => 'THÀNH VIÊN',
            'route' => 'user.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'user.index',
                ],
                [
                    'label' => 'Thêm mới',
                    'route' => 'user.create',
                ]
            ]
        ],
        [
            'label' => 'KHÁCH HÀNG',
            'route' => 'order.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'customer.index',
                ],
                [
                    'label' => 'Thêm mới',
                    'route' => 'customer.create',
                ]
            ]
        ],
        [
            'label' => 'ĐƠN HÀNG',
            'route' => 'order.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Liệt kê',
                    'route' => 'order.index',
                ]
            ]
        ],

    ]

?>