## Some Components for Building Fast API Rest

- JWT for token security
- FOSRest
- JMS Serializer
- Security Components
- User and Token management

## How to install

`composer install`

`mkdir -p config/jwt`

`openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096`

`openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout`

`symfony server:start`

That's all !

Improving in Progress ...