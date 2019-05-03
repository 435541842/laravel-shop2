<?php

return [
    'alipay' => [
        'app_id'         => '2016092700610223',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAw5nld5lQr2X76js4Yp5vzlx0YK3j62JyIA/+6aAvHdw5ivEPLmJpQk0hWiAKvC+O2tmhfVo0+utOJ5G+fB4vGwW/LhsC5H9bQVet6u9wQ5aXlMAONcSNJ2PA5faPC3bpLfArwfbQv5h/kpebb/uWjhYwVk/5orzqPe9bWRoGH3jAVS/sD7itRVcSfbq52NSHKppxusr7rmNXKBvwVxE855yuvJyIFvmEyEkLr7cFjl8G7tnDvI5VB7QAMEmWEp1PINA4e7Umdf0ut6olYLlKYS8Z79j5ReKxHAr5ig1B8vz51QA4dzVKzFPi09UN1/9qF3mrbFhnCteVqpBTy5HFxQIDAQAB',
        'private_key'    => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCfqwnqi8NEQQdU56a3kAbY1SRAp4gze1w1LnFowPzoFiXrmxFYVJSXZ7iuwLapI09ZKnvA0o9Mn++0NX9GX+vmQi1ns0u14jOwsOEtbr39NfOADQbgE8otwJ70xuRozkv8SydbLYdr6L9wE7Qlx97gnvPUS3sSCrmCMSVbr69dbRC9BcUiUo9ajgkkIG9h5jD2IBj6nmWEnvF2aV1inDYnS6et4bjzAFiYxNjbmxJ0YPJRHUSyquA7WdsJwbbaCbLXj6TMAHXPUJgXTTmIbyS9CLUYelQpfpmmjKJLDMC9WjMmgYvwX0JfM/K8I5oyenkcmna0njBeFMiXFqb2UKgLAgMBAAECggEASkQRCbJWceHZWimhhxILzUFeamBCXsfLPMVMZNAXEpBytOLcr3wv3TiWU1o52/QbjTrQcwC9PIPLx8N2XrJxFBnF6s0fswryxgWPx0USQ7ubdf0ZLJKn4J4OkYYNaZ5DA6elN6i2q3+Hw8a2bThJN6tXeHBfXyXz4VWgrcPKyqYbHqQo+2Q8E3m0kqUSJjuYAJitlkTdHs/Q2ad4+kC8ASuk8+bOy91et58MP0uDUtyJkcxp3g449m2BBUslMZqYbeGKdPkwrndbAgOjEj7+LYLD+IASENIwKllTGZczowExu90GKXf/aS8qhzEQI4jdzVg9/44F1Ptyps/pUpMfsQKBgQDNx9J1dePWuFSInlc+M1gIXZNTEyPC7QMXtYufoAkXncoOZP+Mz0Jw9RawdFpG328fooaQlmiKRZSTJ8bWLXQRtdAzAqd7uu8vVe0/LXAz4F0n0YL/yMo8I/vfpNylruH9uQDGTAMDYk9YM0XSASnNHswlpIiMz+QV8/QpG25WcwKBgQDGolVz6CZVeJjSAbQFrVGZBR14oAhMv9Pz8XR7dYys/swhjnSfFmVTL5HfwbYYVEFKcd7SMENAQyFWVm1Obmxgp8pgQVwWSrMCgU8BLyHF0T/IeS2cPczA59wJkEqd3SyLNs7dsKuvViBouxLhbInk0duxJcBi48xgfA/a5MxqCQKBgH9IXxRKhFA3GgqbLkmKBqS+BLd4+kDCy4vpvmBQ4+7Yqbd3n14ggO9PmeYxQfnekGSX6fYbIrSMT1cqXmHyIX4m4I380U3GFdZIpwPR/joISHatsAK41uaWN2BhIB3Xa2+99A2zzJVWRM/Afypjj9CRgSKzf8bhfCpcCCU5E2mjAoGBALMZpBtCc24VsxWIW53SzQRATHZ7NYCeZqpKSFEZiKJjjAOlwxm+w9XhypIKw/nj3osVaWf0BG9pGCIVA7H4dtgf8qYfyLyA1i+oEGhs6vLG3dARE0MRphE5/njRFbaJuqQ74wKZTfRmoApOw5Nmnl8nqgNsmq+P3rQQqOsh6f6hAoGACSNF7AdFefW97cmlHOD8AanZjWZkb2QeY7pKb2DRtMF2yUDm7SpHBnWawB7kQqqyYHClcJpGL0wfIcpug9nVZRr/eVR5TtnVu8OlWeYaoXTXnsnb8AXZbG08uLU3XLNjwRlnC3n3t4jJByhQWdXsrapeuPf3Gu1pcHU5jVMTUAo=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];