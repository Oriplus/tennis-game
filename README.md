# Tennis  tournament

Se elige el ganador en un torneo de tenis masculino o femenino

Cada jugador tiene un nombre y un nivel de habilidad

En un enfrentamiento entre dos jugadores influyen el nivel de habilidad y la suerte para
decidir al ganador del mismo.

En el torneo masculino, se considera la fuerza y la velocidad de desplazamiento
como parámetros adicionales al momento de calcular al ganador.

En el torneo femenino, se considera el tiempo de reacción como un parámetro
adicional al momento de calcular al ganador.

Se aplica arquitectura por capas, patron de diseño strategy y factory

## Installation

```
docker-compose up -d --build
```

```
docker-compose exec php composer install
```

## Run Test

```
docker-compose exec php php ./vendor/bin/phpunit

```

## [Documentation](https://documenter.getpostman.com/view/17262387/2s8ZDczfDF)


[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/17262387-858c2885-8145-47fa-ace5-da4ae449e662?action=collection%2Ffork&collection-url=entityId%3D17262387-858c2885-8145-47fa-ace5-da4ae449e662%26entityType%3Dcollection%26workspaceId%3Dd8bbd7c2-c54d-48ad-8f1c-d79b98fb566b)

## License

[MIT](https://choosealicense.com/licenses/mit/)
