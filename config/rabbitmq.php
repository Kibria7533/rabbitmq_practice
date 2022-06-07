<?php

return [
    'exchanges' => [
        'order' => [
            'name' => 'order.x',
            'type' => 'topic',
            'durable' => true,
            'autoDelete' => false,
            'alternateExchange' => [
                'name' => 'order.alternate.x',
                'type' => 'fanout',
                'durable' => true,
                'autoDelete' => false,
                'queue' => 'order.alternate.q',
                'queueDurable' => true,
                'queueAutoDelete' => false,
                'queueMode' => 'lazy',
            ],
            'dlx' => [
                'name' => 'order.dlx',
                'type' => 'topic',
                'durable' => true,
                'autoDelete' => false
            ],
            'queue' => [
                'orderMake' => [
                    'name' => 'order.q',
                    'binding' => 'order',
                    'durable' => true,
                    'autoDelete' => false,
                    'queueMode' => 'lazy',
                    'dlq' => [
                        'name' => 'order.dlq',
                        'x_message_ttl' => 50000,
                        'durable' => true,
                        'autoDelete' => false,
                        'queueMode' => 'lazy'
                    ],
                ]
            ],
        ],
        'stock' => [
            'name' => 'stockC.x',
            'type' => 'topic',
            'durable' => true,
            'autoDelete' => false,
            'alternateExchange' => [
                'name' => 'stock.alternate.x',
                'type' => 'fanout',
                'durable' => true,
                'autoDelete' => false,
                'queue' => 'stock.alternate.q',
                'queueDurable' => true,
                'queueAutoDelete' => false,
                'queueMode' => 'lazy',
            ],
            'dlx' => [
                'name' => 'stock.dlx',
                'type' => 'topic',
                'durable' => true,
                'autoDelete' => false
            ],
            'queue' => [
                'checkStock' => [
                    'name' => 'checkStock.q',
                    'binding' => 'checkStock',
                    'durable' => true,
                    'autoDelete' => false,
                    'queueMode' => 'lazy',
                    'dlq' => [
                        'name' => 'checkStock.dlq',
                        'x_message_ttl' => 50000,
                        'durable' => true,
                        'autoDelete' => false,
                        'queueMode' => 'lazy'
                    ],
                ]
            ],
        ]
    ],
    'consume' => 'checkStock.q'
];
